<?php

namespace Interpreter;

require_once __DIR__ . '/../grammar/GolampiBaseVisitor.php';

use Exception;

class BreakException    extends Exception {}
class ContinueException extends Exception {}

class ReturnException extends Exception {
    public $value;
    public function __construct($value) { $this->value = $value; }
}

class Executor extends \GolampiBaseVisitor {

    public  $scopes    = [];
    private $functions = [];
    private $output    = [];

    // Tabla de punteros: id_ptr → ['var' => nombre, 'scope_index' => i]
    // Usamos referencias PHP directas para simular punteros
    private $pointers  = [];

    public function __construct() {
        $this->enterScope();
    }

    public function getOutput(): string {
        return implode("\n", $this->output);
    }

    // ================================================================
    // PROGRAM
    // ================================================================
    public function visitProgram($ctx) {
        // 1. Registrar funciones (hoisting)
        foreach ($ctx->functionDecl() as $func) {
            $this->functions[$func->ID()->getText()] = $func;
        }
        // 2. Evaluar var/const globales en orden
        foreach ($ctx->children as $child) {
            $class = get_class($child);
            if (str_contains($class, 'VarDeclContext') ||
                str_contains($class, 'ConstDeclContext')) {
                $this->visit($child);
            }
        }
        if (!isset($this->functions["main"])) {
            throw new Exception("No existe función 'main'.");
        }
        $this->callFunction("main", []);
        return implode("\n", $this->output);
    }

    // ================================================================
    // FUNCTION CALL
    // ================================================================
    private function callFunction($name, $args) {
        if (!isset($this->functions[$name])) {
            throw new Exception("Función '$name' no definida.");
        }

        $func = $this->functions[$name];
        $this->enterScope();

        if ($func->paramList()) {
            foreach ($func->paramList()->param() as $index => $paramCtx) {
                $paramName = $paramCtx->ID()->getText();
                $this->setVar($paramName, $args[$index] ?? null);
            }
        }

        $returnValue = null;
        try {
            $this->visitBlockStatements($func->block());
        } catch (ReturnException $e) {
            $returnValue = $e->value;
        }

        $this->exitScope();
        return $returnValue;
    }

    public function visitFunctionCall($ctx) {
        $name = $ctx->qualifiedName()->getText();

        // ---- fmt.Println ----
        if ($name === 'fmt.Println') {
            $values = [];
            if ($ctx->argList()) {
                foreach ($ctx->argList()->argItem() as $item) {
                    if ($item->expression()) {
                        $v = $this->visit($item->expression());
                    } else {
                        // &ID — imprime la dirección (referencia)
                        $v = '&' . $item->ID()->getText();
                    }
                    if (is_bool($v)) $v = $v ? 'true' : 'false';
                    if (is_array($v)) $v = $this->arrayToString($v);
                    $values[] = $v;
                }
            }
            $this->output[] = implode(" ", $values);
            return null;
        }

        // ---- len ----
        if ($name === 'len') {
            $arg = $this->visit($ctx->argList()->argItem(0)->expression());
            if (is_string($arg)) return strlen($arg);
            if (is_array($arg))  return count($arg);
            throw new Exception("len() requiere string o arreglo.");
        }

        // ---- now ----
        if ($name === 'now') {
            return date('Y-m-d H:i:s');
        }

        // ---- substr ----
        if ($name === 'substr') {
            $items = $ctx->argList()->argItem();
            $s     = $this->visit($items[0]->expression());
            $start = $this->visit($items[1]->expression());
            $len   = $this->visit($items[2]->expression());
            if ($start < 0 || $start >= strlen($s)) {
                throw new Exception("substr(): índice inicial fuera de rango.");
            }
            return substr($s, $start, $len);
        }

        // ---- typeOf ----
        if ($name === 'typeOf') {
            $val = $this->visit($ctx->argList()->argItem(0)->expression());
            if (is_int($val))    return 'int';
            if (is_float($val))  return 'float';
            if (is_string($val)) return 'string';
            if (is_bool($val))   return 'bool';
            if (is_array($val))  return 'array';
            return 'nil';
        }

        // ---- Funciones de usuario ----
        $args = [];
        if ($ctx->argList()) {
            foreach ($ctx->argList()->argItem() as $item) {
                if (!$item->expression()) {
                    // &ID → pasar referencia como closure getter/setter
                    $varName = $item->ID()->getText();
                    $args[]  = ['__ref__' => $varName, '__executor__' => $this];
                } else {
                    $args[] = $this->visit($item->expression());
                }
            }
        }

        return $this->callFunction($name, $args);
    }

    // ================================================================
    // SCOPES
    // ================================================================
    private function enterScope() { array_push($this->scopes, []); }
    private function exitScope()  { array_pop($this->scopes); }

    private function setVar($name, $value) {
        $this->scopes[count($this->scopes) - 1][$name] = $value;
    }

    public function updateVar($name, $value) {
        for ($i = count($this->scopes) - 1; $i >= 0; $i--) {
            if (array_key_exists($name, $this->scopes[$i])) {
                $this->scopes[$i][$name] = $value;
                return;
            }
        }
        throw new Exception("Variable '$name' no definida.");
    }

    public function getVar($name) {
        for ($i = count($this->scopes) - 1; $i >= 0; $i--) {
            if (array_key_exists($name, $this->scopes[$i])) {
                return $this->scopes[$i][$name];
            }
        }
        throw new Exception("Variable '$name' no definida.");
    }

    // ================================================================
    // BLOCK
    // ================================================================
    public function visitBlock($ctx) {
        $this->enterScope();
        try {
            $this->visitBlockStatements($ctx);
        } finally {
            $this->exitScope();
        }
        return null;
    }

    private function visitBlockStatements($blockCtx) {
        foreach ($blockCtx->statement() as $stmt) {
            $this->visit($stmt);
        }
    }

    private function visitBlockInLoop($blockCtx) {
        $this->enterScope();
        try {
            $this->visitBlockStatements($blockCtx);
        } finally {
            $this->exitScope();
        }
    }

    // ================================================================
    // VARIABLES
    // ================================================================
    public function visitVarDecl($ctx) {
        // VAR ID arrayType ('=' arrayLiteral)?
        // VAR ID arrayType  '=' expression       ← función que retorna arreglo
        if ($ctx->arrayType()) {
            $name = $ctx->ID()->getText();
            if ($ctx->arrayLiteral()) {
                // var a [3]int = [3]int{1,2,3}
                $val = $this->visitArrayLiteral($ctx->arrayLiteral());
            } elseif ($ctx->expression()) {
                // var sorted [5]int = ordenar(datos)
                $val = $this->visit($ctx->expression());
            } else {
                // var a [3]int  → valores por defecto
                $val = $this->makeDefaultArray($ctx->arrayType());
            }
            $this->setVar($name, $val);
            return null;
        }

        // VAR ID STAR type/arrayType  (puntero)
        // Detectamos STAR como tercer hijo: VAR(0) ID(1) STAR(2) ...
        $child2 = $ctx->getChild(2);
        if ($child2 !== null && $child2->getText() === '*') {
            $this->setVar($ctx->ID()->getText(), null);
            return null;
        }

        // VAR ID type ('=' expression)?
        $type = $ctx->type()->getText();
        $name = $ctx->ID()->getText();

        if ($ctx->expression()) {
            $val = $this->visit($ctx->expression());
        } else {
            $val = $this->defaultValue($type);
        }

        $this->setVar($name, $val);
    }

    public function visitVarShortDecl($ctx) {
        // ID ':=' arrayLiteral
        if ($ctx->arrayLiteral()) {
            $name = $ctx->ID()->getText();
            $this->setVar($name, $this->visitArrayLiteral($ctx->arrayLiteral()));
            return null;
        }

        // idList ':=' expList
        $ids = $ctx->idList()->ID();

        $exprs = $ctx->expList()->expression();

        // Múltiples retornos: x, ok := func()
        if (count($exprs) === 1 && count($ids) > 1) {
            $result = $this->visit($exprs[0]);
            // Se espera un array con los múltiples retornos
            if (is_array($result) && isset($result['__multi_return__'])) {
                $values = $result['values'];
                foreach ($ids as $i => $idToken) {
                    $this->setVar($idToken->getText(), $values[$i] ?? null);
                }
                return null;
            }
        }

        foreach ($ids as $i => $idToken) {
            $this->setVar($idToken->getText(), $this->visit($exprs[$i]));
        }
    }

    public function visitConstDecl($ctx) {
        $name  = $ctx->ID()->getText();
        $value = $this->visit($ctx->expression());
        $this->setVar($name, $value);
    }

    // ================================================================
    // ARRAY HELPERS
    // ================================================================

    /**
     * Crea un arreglo con valores por defecto a partir de arrayType ctx.
     * Soporta multidimensional.
     */
    private function makeDefaultArray($arrayTypeCtx): array {
        $size = (int)$arrayTypeCtx->INT()->getText();
        $arr  = [];

        if ($arrayTypeCtx->arrayType()) {
            // Multidimensional
            for ($i = 0; $i < $size; $i++) {
                $arr[$i] = $this->makeDefaultArray($arrayTypeCtx->arrayType());
            }
        } else {
            $type = $arrayTypeCtx->type()->getText();
            for ($i = 0; $i < $size; $i++) {
                $arr[$i] = $this->defaultValue($type);
            }
        }

        return $arr;
    }

    private function defaultValue(string $type) {
        switch ($type) {
            case 'int':    return 0;
            case 'float':  return 0.0;
            case 'string': return '';
            case 'bool':   return false;
            case 'rune':   return 0;
            default:       return null;
        }
    }

    public function visitArrayLiteral($ctx): array {
        $size = (int)$ctx->INT()->getText();
        $arr  = [];

        if ($ctx->type()) {
            // [N]type{e1, e2, ...}
            if ($ctx->arrayElements()) {
                foreach ($ctx->arrayElements()->expression() as $expr) {
                    $arr[] = $this->visit($expr);
                }
            } else {
                $type = $ctx->type()->getText();
                for ($i = 0; $i < $size; $i++) $arr[$i] = $this->defaultValue($type);
            }
        } else {
            // [N][M]type{{...},{...}}
            if ($ctx->arrayRowElements()) {
                foreach ($ctx->arrayRowElements()->arrayElements() as $row) {
                    $rowArr = [];
                    foreach ($row->expression() as $expr) {
                        $rowArr[] = $this->visit($expr);
                    }
                    $arr[] = $rowArr;
                }
            } else {
                // sin inicializar → usar makeDefaultArray de la dimensión interna
                for ($i = 0; $i < $size; $i++) $arr[$i] = [];
            }
        }

        return $arr;
    }

    private function arrayToString(array $arr): string {
        $parts = [];
        foreach ($arr as $v) {
            $parts[] = is_array($v) ? '[' . $this->arrayToString($v) . ']' : (string)$v;
        }
        return implode(' ', $parts);
    }

    // ================================================================
    // ARRAY ACCESS  a[i] / a[i][j]
    // ================================================================
    public function visitArrayAccess($ctx) {
        $name = $ctx->ID()->getText();
        $arr  = $this->getVar($name);

        // Si es una referencia (__ref__), obtener el arreglo real del caller
        if (is_array($arr) && isset($arr['__ref__'])) {
            $arr = $arr['__executor__']->getVar($arr['__ref__']);
        }

        foreach ($ctx->expression() as $idxExpr) {
            $idx = $this->visit($idxExpr);
            if (!isset($arr[$idx])) {
                throw new Exception("Índice $idx fuera de rango en '$name'.");
            }
            $arr = $arr[$idx];
        }

        return $arr;
    }

    // ================================================================
    // PTR ASSIGN   *n = expr
    // ================================================================
    public function visitPtrAssign($ctx) {
        $name  = $ctx->ID()->getText();
        $value = $this->visit($ctx->expression());
        $op    = $ctx->assignOp()->getText();

        // Obtener el valor referenciado (es un array __ref__)
        $ref = $this->getVar($name);

        // Si es una referencia pasada como argumento
        if (is_array($ref) && isset($ref['__ref__'])) {
            $targetName     = $ref['__ref__'];
            $targetExecutor = $ref['__executor__'];
            $current        = $targetExecutor->getVar($targetName);
            switch ($op) {
                case '=':  $targetExecutor->updateVar($targetName, $value); break;
                case '+=': $targetExecutor->updateVar($targetName, $current + $value); break;
                case '-=': $targetExecutor->updateVar($targetName, $current - $value); break;
                case '*=': $targetExecutor->updateVar($targetName, $current * $value); break;
                case '/=':
                    if ($value == 0) throw new \Exception("División por cero.");
                    $targetExecutor->updateVar($targetName, $current / $value);
                    break;
            }
            return null;
        }

        // Puntero local (variable en mismo scope)
        throw new \Exception("Puntero '$name' no inicializado.");
    }

    // ================================================================
    // ARRAY ASSIGN  a[i] = expr / a[i][j] = expr
    // ================================================================
    public function visitArrayAssign($ctx) {
        $name     = $ctx->ID()->getText();
        $allExprs = $ctx->expression();
        $idxExprs = array_slice($allExprs, 0, count($allExprs) - 1);
        $value    = $this->visit($allExprs[count($allExprs) - 1]);
        $op       = $ctx->assignOp()->getText();

        // Si la variable es un __ref__ (puntero a arreglo), redirigir al executor/scope del caller
        $rawVal = $this->getVar($name);
        if (is_array($rawVal) && isset($rawVal['__ref__'])) {
            $targetExecutor = $rawVal['__executor__'];
            $targetName     = $rawVal['__ref__'];
            // Buscar el scope donde vive el arreglo en el executor del caller
            $scopeIdx = -1;
            for ($i = count($targetExecutor->scopes) - 1; $i >= 0; $i--) {
                if (array_key_exists($targetName, $targetExecutor->scopes[$i])) {
                    $scopeIdx = $i;
                    break;
                }
            }
            if ($scopeIdx === -1) throw new Exception("Variable '$targetName' no definida.");
            $ref = &$targetExecutor->scopes[$scopeIdx][$targetName];
        } else {
            // Variable local: buscar en scopes propios
            $scopeIdx = -1;
            for ($i = count($this->scopes) - 1; $i >= 0; $i--) {
                if (array_key_exists($name, $this->scopes[$i])) {
                    $scopeIdx = $i;
                    break;
                }
            }
            if ($scopeIdx === -1) throw new Exception("Variable '$name' no definida.");
            $ref = &$this->scopes[$scopeIdx][$name];
        }

        $indices = [];
        foreach ($idxExprs as $idxExpr) {
            $indices[] = $this->visit($idxExpr);
        }

        // Navegar hasta el penúltimo nivel
        for ($k = 0; $k < count($indices) - 1; $k++) {
            $ref = &$ref[$indices[$k]];
        }

        $lastIdx = $indices[count($indices) - 1];

        switch ($op) {
            case '=':  $ref[$lastIdx] = $value; break;
            case '+=': $ref[$lastIdx] += $value; break;
            case '-=': $ref[$lastIdx] -= $value; break;
            case '*=': $ref[$lastIdx] *= $value; break;
            case '/=':
                if ($value == 0) throw new Exception("División por cero.");
                $ref[$lastIdx] /= $value;
                break;
        }

        return null;
    }

    // ================================================================
    // ASSIGNMENT
    // ================================================================
    public function visitAssignment($ctx) {
        $name  = $ctx->ID()->getText();
        $value = $this->visit($ctx->expression());
        $op    = $ctx->assignOp()->getText();

        // Si la variable es un puntero y se asigna con *, tratarlo especial
        switch ($op) {
            case '=':  $this->updateVar($name, $value); break;
            case '+=':
                $cur = $this->getVar($name);
                $this->updateVar($name, is_string($cur) ? $cur . $value : $cur + $value);
                break;
            case '-=': $this->updateVar($name, $this->getVar($name) - $value); break;
            case '*=': $this->updateVar($name, $this->getVar($name) * $value); break;
            case '/=':
                if ($value == 0) throw new Exception("División por cero.");
                $this->updateVar($name, $this->getVar($name) / $value);
                break;
        }
    }

    // ================================================================
    // IF
    // ================================================================
    public function visitIfStmt($ctx) {
        $condition = $this->visit($ctx->expression());
        if ($condition) {
            return $this->visit($ctx->block(0));
        }
        if ($ctx->ELSE()) {
            if ($ctx->ifStmt()) return $this->visit($ctx->ifStmt());
            if (count($ctx->block()) > 1) return $this->visit($ctx->block(1));
        }
        return null;
    }

    // ================================================================
    // FOR
    // ================================================================
    public function visitForStmt($ctx) {
        $this->enterScope();

        if ($ctx->forInit()) {
            $this->visit($ctx->forInit());
            while (true) {
                if ($ctx->expression() && !$this->visit($ctx->expression())) break;
                try { $this->visitBlockInLoop($ctx->block()); }
                catch (BreakException $e)    { break; }
                catch (ContinueException $e) { /* continuar */ }
                if ($ctx->forPost()) $this->visit($ctx->forPost());
            }
        } elseif ($ctx->expression()) {
            while (true) {
                if (!$this->visit($ctx->expression())) break;
                try { $this->visitBlockInLoop($ctx->block()); }
                catch (BreakException $e)    { break; }
                catch (ContinueException $e) { }
            }
        } else {
            while (true) {
                try { $this->visitBlockInLoop($ctx->block()); }
                catch (BreakException $e)    { break; }
                catch (ContinueException $e) { }
            }
        }

        $this->exitScope();
    }

    public function visitForInit($ctx) {
        $name  = $ctx->ID()->getText();
        $value = $this->visit($ctx->expression());
        $op    = $ctx->getChild(1)->getText();
        if ($op === ':=') $this->setVar($name, $value);
        else              $this->updateVar($name, $value);
    }

    public function visitForPost($ctx) {
        $name = $ctx->ID()->getText();
        if ($ctx->getChildCount() === 2) {
            $op = $ctx->getChild(1)->getText();
            $this->updateVar($name, $this->getVar($name) + ($op === '++' ? 1 : -1));
        } else {
            $this->updateVar($name, $this->visit($ctx->expression()));
        }
    }

    // ================================================================
    // SWITCH
    // ================================================================
    public function visitSwitchStmt($ctx) {
        $switchValue = $this->visit($ctx->expression());

        foreach ($ctx->caseClause() as $caseClause) {
            foreach ($caseClause->expList()->expression() as $expr) {
                if ($switchValue == $this->visit($expr)) {
                    $this->enterScope();
                    try {
                        foreach ($caseClause->statement() as $stmt) $this->visit($stmt);
                    } catch (BreakException $e) {
                    } finally {
                        $this->exitScope();
                    }
                    return null;
                }
            }
        }

        if ($ctx->defaultClause()) {
            $this->enterScope();
            try {
                foreach ($ctx->defaultClause()->statement() as $stmt) $this->visit($stmt);
            } catch (BreakException $e) {
            } finally {
                $this->exitScope();
            }
        }

        return null;
    }

    // ================================================================
    // BREAK / CONTINUE / RETURN
    // ================================================================
    public function visitBreakStmt($ctx)    { throw new BreakException(); }
    public function visitContinueStmt($ctx) { throw new ContinueException(); }

    public function visitIncDecStmt($ctx) {
        $name = $ctx->ID()->getText();
        $op   = $ctx->getChild(1)->getText();
        $cur  = $this->getVar($name);
        $this->updateVar($name, $op === '++' ? $cur + 1 : $cur - 1);
    }

    public function visitReturnStmt($ctx) {
        if (!$ctx->expList()) {
            throw new ReturnException(null);
        }

        $exprs = $ctx->expList()->expression();

        if (count($exprs) === 1) {
            throw new ReturnException($this->visit($exprs[0]));
        }

        // Múltiples retornos
        $values = [];
        foreach ($exprs as $expr) {
            $values[] = $this->visit($expr);
        }
        throw new ReturnException(['__multi_return__' => true, 'values' => $values]);
    }

    // ================================================================
    // STATEMENT
    // ================================================================
    public function visitStatement($ctx) {
        if ($ctx->expression()) {
            $this->visit($ctx->expression());
            return null;
        }
        return $this->visitChildren($ctx);
    }

    // ================================================================
    // EXPRESSIONS
    // ================================================================
    public function visitExpression($ctx) { return $this->visit($ctx->logicalOr()); }

    public function visitLogicalOr($ctx) {
        $operands = $ctx->logicalAnd();
        $result   = $this->visit($operands[0]);
        for ($i = 1; $i < count($operands); $i++) {
            if ($result === true) return true;
            $result = $this->visit($operands[$i]);
        }
        return $result;
    }

    public function visitLogicalAnd($ctx) {
        $operands = $ctx->equality();
        $result   = $this->visit($operands[0]);
        for ($i = 1; $i < count($operands); $i++) {
            if ($result === false) return false;
            $result = $this->visit($operands[$i]);
        }
        return $result;
    }

    public function visitEquality($ctx) {
        $value = $this->visit($ctx->comparison(0));
        for ($i = 1; $i < count($ctx->comparison()); $i++) {
            $right = $this->visit($ctx->comparison($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            $value = ($op === '==') ? ($value == $right) : ($value != $right);
        }
        return $value;
    }

    public function visitComparison($ctx) {
        $value = $this->visit($ctx->term(0));
        for ($i = 1; $i < count($ctx->term()); $i++) {
            $right = $this->visit($ctx->term($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            if (is_int($value) && is_float($right)) $value = (float)$value;
            if (is_float($value) && is_int($right))  $right = (float)$right;
            switch ($op) {
                case '>':  $value = $value >  $right; break;
                case '>=': $value = $value >= $right; break;
                case '<':  $value = $value <  $right; break;
                case '<=': $value = $value <= $right; break;
            }
        }
        return $value;
    }

    public function visitTerm($ctx) {
        $value = $this->visit($ctx->factor(0));
        for ($i = 1; $i < count($ctx->factor()); $i++) {
            $right = $this->visit($ctx->factor($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            if ($op === '+') {
                $value = (is_string($value) && is_string($right)) ? $value . $right : $value + $right;
            } else {
                $value = $value - $right;
            }
        }
        return $value;
    }

    public function visitFactor($ctx) {
        $value = $this->visit($ctx->unary(0));
        for ($i = 1; $i < count($ctx->unary()); $i++) {
            $right = $this->visit($ctx->unary($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            switch ($op) {
                case '*': $value = $value * $right; break;
                case '/':
                    if ($right == 0) throw new Exception("División por cero.");
                    // División entera si ambos operandos son enteros
                    $value = (is_int($value) && is_int($right))
                        ? intdiv($value, $right)
                        : $value / $right;
                    break;
                case '%':
                    if ($right == 0) throw new Exception("Módulo por cero.");
                    $value = $value % $right;
                    break;
            }
        }
        return $value;
    }

    public function visitUnary($ctx) {
        if ($ctx->primary()) return $this->visit($ctx->primary());

        $value = $this->visit($ctx->unary());
        $op    = $ctx->getChild(0)->getText();

        if ($op === '!') return !$value;
        if ($op === '-') return -$value;
        if ($op === '*') {
            // Desreferenciación: *p → obtener valor apuntado
            if (is_array($value) && isset($value['__ref__'])) {
                return $value['__executor__']->getVar($value['__ref__']);
            }
            throw new Exception("Desreferenciación inválida.");
        }
        return $value;
    }

    public function visitPrimary($ctx) {
        if ($ctx->getToken(\GolampiParser::INT, 0))    return (int)$ctx->getText();
        if ($ctx->getToken(\GolampiParser::FLOAT, 0))  return (float)$ctx->getText();
        if ($ctx->getToken(\GolampiParser::STRING, 0)) return trim($ctx->getText(), '"');
        if ($ctx->getToken(\GolampiParser::RUNE, 0)) {
            $raw = $ctx->getText();
            $ch  = trim($raw, "'");
            return ord($ch);
        }
        if ($ctx->getToken(\GolampiParser::TRUE, 0))   return true;
        if ($ctx->getToken(\GolampiParser::FALSE, 0))  return false;
        if ($ctx->getToken(\GolampiParser::NIL, 0))    return null;

        if ($ctx->arrayAccess()) return $this->visitArrayAccess($ctx->arrayAccess());
        if ($ctx->ID())          return $this->getVar($ctx->ID()->getText());
        if ($ctx->functionCall()) return $this->visit($ctx->functionCall());
        if ($ctx->expression())  return $this->visit($ctx->expression());

        return null;
    }
}