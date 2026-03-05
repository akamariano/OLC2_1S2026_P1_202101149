<?php

require_once __DIR__ . '/SymbolTable.php';
require_once __DIR__ . '/FunctionSymbol.php';
require_once __DIR__ . '/VariableSymbol.php';

class SemanticVisitor extends GolampiBaseVisitor
{
    private $symbolTable;
    private $loopDepth       = 0;
    private $switchDepth     = 0;
    private $currentFunction = null;
    private $hasReturn       = false;

    public function __construct()
    {
        $this->symbolTable = new SymbolTable();
    }

    public function getSymbolTable()
    {
        return $this->symbolTable;
    }

    // ================================================================
    // HELPERS: tipos canónicos
    // ================================================================

    private function arrayTypeToString($ctx): string
    {
        $size = $ctx->INT()->getText();
        if ($ctx->arrayType()) {
            return "array[{$size}]" . $this->arrayTypeToString($ctx->arrayType());
        }
        return "array[{$size}]{$ctx->type()->getText()}";
    }

    private function ptrTypeToString($ctx): string
    {
        if ($ctx->arrayType()) {
            return "ptr:" . $this->arrayTypeToString($ctx->arrayType());
        }
        return "ptr:" . $ctx->type()->getText();
    }

    private function arrayElementType(string $arrType): string
    {
        return preg_replace('/^array\[\d+\]/', '', $arrType);
    }

    private function ptrBaseType(string $ptrType): string
    {
        return substr($ptrType, 4);
    }

    /**
     * Detecta el tipo de un parámetro según la gramática:
     *   param : ID type | ID STAR type | ID STAR arrayType | ID arrayType
     * El ID está en posición 0; posición 1 puede ser STAR, arrayType o type.
     */
    private function resolveParamType($paramCtx): string
    {
        // Hijo 1 (después del ID)
        $child1 = $paramCtx->getChild(1);
        if ($child1 === null) return 'unknown';

        if ($child1->getText() === '*') {
            // Es puntero: hijo 2 es type o arrayType
            if ($paramCtx->arrayType()) {
                return 'ptr:' . $this->arrayTypeToString($paramCtx->arrayType());
            }
            return 'ptr:' . $paramCtx->type()->getText();
        }

        if ($paramCtx->arrayType()) {
            return $this->arrayTypeToString($paramCtx->arrayType());
        }

        return $paramCtx->type()->getText();
    }

    /**
     * Detecta si un varDecl es de tipo puntero (VAR ID STAR ...).
     * El árbol tiene: VAR(0) ID(1) STAR(2) type/arrayType(3)
     */
    private function varDeclIsPointer($ctx): bool
    {
        $child2 = $ctx->getChild(2);
        return $child2 !== null && $child2->getText() === '*';
    }

    private function resolveVarDeclPtrType($ctx): string
    {
        if ($ctx->arrayType()) {
            return 'ptr:' . $this->arrayTypeToString($ctx->arrayType());
        }
        return 'ptr:' . $ctx->type()->getText();
    }

    // ================================================================
    // PROGRAM
    // ================================================================
    public function visitProgram($ctx)
    {
        foreach ($ctx->functionDecl() as $func) {
            $this->registerFunctionSignature($func);
        }
        foreach ($ctx->functionDecl() as $func) {
            $this->visitFunctionBody($func);
        }
        return null;
    }

    // ================================================================
    // FUNCTIONS
    // ================================================================
    private function registerFunctionSignature($ctx)
    {
        $name        = $ctx->ID()->getText();
        $line        = $ctx->getStart()->getLine();
        $paramsArray = [];

        if ($ctx->paramList()) {
            foreach ($ctx->paramList()->param() as $param) {
                $paramName = $param->ID()->getText();
                $paramType = $this->resolveParamType($param);
                $paramsArray[] = ["name" => $paramName, "type" => $paramType];
            }
        }

        $returnTypes = $this->extractReturnTypes($ctx->returnType());

        if ($this->symbolTable->getFunction($name)) {
            throw new Exception("Función '$name' ya declarada.");
        }

        $this->symbolTable->defineFunction(
            $name,
            new FunctionSymbol($name, $paramsArray, $returnTypes, $line)
        );
    }

    private function extractReturnTypes($returnTypeCtx): array
    {
        if (!$returnTypeCtx) return [];

        // Múltiples retornos: (int, bool), (int, [5]int), etc.
        if ($returnTypeCtx->multiReturnType()) {
            $types = [];
            foreach ($returnTypeCtx->multiReturnType() as $mrt) {
                $types[] = $this->resolveReturnTypeNode($mrt);
            }
            return $types;
        }

        // Retorno simple
        return [$this->resolveReturnTypeNode($returnTypeCtx)];
    }

    /**
     * Dado un nodo returnType o multiReturnType, devuelve el string de tipo.
     * Detecta STAR inspeccionando el primer hijo del contexto.
     */
    private function resolveReturnTypeNode($ctx): string
    {
        // Primer hijo: si es STAR (*) es puntero
        $firstChild = $ctx->getChild(0);
        if ($firstChild !== null && $firstChild->getText() === '*') {
            // *type o *arrayType
            if ($ctx->arrayType()) {
                return 'ptr:' . $this->arrayTypeToString($ctx->arrayType());
            }
            return 'ptr:' . $ctx->type()->getText();
        }

        if ($ctx->arrayType()) return $this->arrayTypeToString($ctx->arrayType());
        if ($ctx->type())      return $ctx->type()->getText();

        return 'unknown';
    }

    private function visitFunctionBody($ctx)
    {
        $name        = $ctx->ID()->getText();
        $function    = $this->symbolTable->getFunction($name);
        $paramsArray = $function->getParams();
        $returnTypes = $function->getReturnTypes();

        $this->currentFunction = ["name" => $name, "returnTypes" => $returnTypes];
        $this->hasReturn       = false;

        $this->symbolTable->enterScope();

        foreach ($paramsArray as $param) {
            $this->symbolTable->defineVariable(
                $param["name"],
                new VariableSymbol($param["name"], $param["type"])
            );
        }

        foreach ($ctx->block()->statement() as $stmt) {
            $this->visit($stmt);
        }

        $this->symbolTable->exitScope();

        if (count($returnTypes) > 0 && !$this->hasReturn) {
            throw new Exception(
                "Función '$name' debe retornar: " . implode(", ", $returnTypes) . "."
            );
        }

        $this->currentFunction = null;
        return null;
    }

    public function visitFunctionDecl($ctx) { return null; }

    // ----------------------------------------------------------------
    // FUNCTION CALL
    // ----------------------------------------------------------------
    public function visitFunctionCall($ctx)
    {
        $name = $ctx->qualifiedName()->getText();

        // ---- Embebidas ----
        if ($name === 'fmt.Println') {
            if ($ctx->argList()) {
                foreach ($ctx->argList()->argItem() as $item) {
                    if ($item->expression()) $this->visit($item->expression());
                }
            }
            return null;
        }

        if ($name === 'len') {
            $args = $ctx->argList() ? $ctx->argList()->argItem() : [];
            if (count($args) !== 1) throw new Exception("len() requiere 1 argumento.");
            $t = $this->visit($args[0]->expression());
            if ($t !== 'string' && strpos($t, 'array') !== 0) {
                throw new Exception("len() requiere string o arreglo, se obtuvo '$t'.");
            }
            return 'int';
        }

        if ($name === 'now') {
            $args = $ctx->argList() ? $ctx->argList()->argItem() : [];
            if (count($args) !== 0) throw new Exception("now() no recibe argumentos.");
            return 'string';
        }

        if ($name === 'substr') {
            $args = $ctx->argList() ? $ctx->argList()->argItem() : [];
            if (count($args) !== 3) throw new Exception("substr() requiere 3 argumentos.");
            $t0 = $this->visit($args[0]->expression());
            $t1 = $this->visit($args[1]->expression());
            $t2 = $this->visit($args[2]->expression());
            if ($t0 !== 'string') throw new Exception("substr(): argumento 1 debe ser string.");
            if ($t1 !== 'int')    throw new Exception("substr(): argumento 2 debe ser int.");
            if ($t2 !== 'int')    throw new Exception("substr(): argumento 3 debe ser int.");
            return 'string';
        }

        if ($name === 'typeOf') {
            $args = $ctx->argList() ? $ctx->argList()->argItem() : [];
            if (count($args) !== 1) throw new Exception("typeOf() requiere 1 argumento.");
            $this->visit($args[0]->expression());
            return 'string';
        }

        // ---- Funciones de usuario ----
        $function = $this->symbolTable->getFunction($name);
        if (!$function) throw new Exception("Función '$name' no declarada.");

        $expectedParams = $function->getParams();
        $args = $ctx->argList() ? $ctx->argList()->argItem() : [];

        if (count($expectedParams) !== count($args)) {
            throw new Exception(
                "Función '$name' espera " . count($expectedParams) .
                " parámetro(s), se recibieron " . count($args) . "."
            );
        }

        foreach ($expectedParams as $i => $param) {
            $argItem = $args[$i];
            if (!$argItem->expression()) {
                // &ID → puntero
                $argVarName = $argItem->ID()->getText();
                $argSymbol  = $this->symbolTable->resolveVariable($argVarName);
                if (!$argSymbol) throw new Exception("Variable '$argVarName' no declarada.");
                $argType = "ptr:" . $argSymbol->getType();
            } else {
                $argType = $this->visit($argItem->expression());
            }

            if ($argType !== $param["type"]) {
                throw new Exception(
                    "Parámetro '{$param["name"]}' de '$name': se esperaba {$param["type"]}, se obtuvo $argType."
                );
            }
        }

        $returnTypes = $function->getReturnTypes();
        return count($returnTypes) > 0 ? $returnTypes[0] : null;
    }

    // ================================================================
    // BLOCK
    // ================================================================
    public function visitBlock($ctx)
    {
        $this->symbolTable->enterScope();
        foreach ($ctx->statement() as $stmt) $this->visit($stmt);
        $this->symbolTable->exitScope();
        return null;
    }

    // ================================================================
    // VARIABLE DECLARATIONS
    // ================================================================
    public function visitVarDecl($ctx)
    {
        if ($ctx->arrayType()) {
            $name    = $ctx->ID()->getText();
            $arrType = $this->arrayTypeToString($ctx->arrayType());

            if ($ctx->arrayLiteral()) {
                // var a [3]int = [3]int{1,2,3}
                $litType = $this->visitArrayLiteral($ctx->arrayLiteral());
                if ($litType !== $arrType) {
                    throw new Exception("Literal de arreglo '$litType' no coincide con '$arrType'.");
                }
            } elseif ($ctx->expression()) {
                // var sorted [5]int = ordenar(datos)
                $exprType = $this->visit($ctx->expression());
                if ($exprType !== $arrType) {
                    throw new Exception(
                        "Tipo incompatible en var '$name': se esperaba '$arrType', se obtuvo '$exprType'."
                    );
                }
            }

            if ($this->symbolTable->resolveInCurrentScope($name)) {
                throw new Exception("Variable '$name' ya declarada.");
            }
            $this->symbolTable->defineVariable($name, new VariableSymbol($name, $arrType));
            return null;
        }

        // VAR ID STAR type  o  VAR ID STAR arrayType
        // Detectamos STAR como tercer hijo del ctx (VAR=0, ID=1, STAR=2)
        if ($this->varDeclIsPointer($ctx)) {
            $name    = $ctx->ID()->getText();
            $ptrType = $this->resolveVarDeclPtrType($ctx);
            if ($this->symbolTable->resolveInCurrentScope($name)) {
                throw new Exception("Variable '$name' ya declarada.");
            }
            $this->symbolTable->defineVariable($name, new VariableSymbol($name, $ptrType));
            return null;
        }

        // VAR ID type ('=' expression)?
        $type = $ctx->type()->getText();
        $name = $ctx->ID()->getText();

        if ($ctx->expression()) {
            $exprType = $this->visit($ctx->expression());
            if ($exprType !== $type) {
                throw new Exception("Tipo incompatible en var '$name': se esperaba '$type', se obtuvo '$exprType'.");
            }
        }

        if ($this->symbolTable->resolveInCurrentScope($name)) {
            throw new Exception("Variable '$name' ya declarada.");
        }
        $this->symbolTable->defineVariable($name, new VariableSymbol($name, $type));

        return null;
    }

    public function visitVarShortDecl($ctx)
    {
        // Gramática tiene dos alternativas:
        //   idList ':=' expList       → ctx->idList() existe
        //   ID ':=' arrayLiteral     → ctx->ID() directo, sin idList

        // a := [3]int{1,2,3}
        if ($ctx->arrayLiteral()) {
            $name    = $ctx->ID()->getText();
            $arrType = $this->visitArrayLiteral($ctx->arrayLiteral());
            if ($this->symbolTable->resolveInCurrentScope($name)) {
                throw new Exception("Variable '$name' ya declarada.");
            }
            $this->symbolTable->defineVariable($name, new VariableSymbol($name, $arrType));
            return null;
        }

        // idList ':=' expList
        $ids = $ctx->idList()->ID();

        $exprs = $ctx->expList()->expression();

        // Múltiples retornos: x, ok := func()
        if (count($exprs) === 1 && count($ids) > 1) {
            $primary = $this->getPrimaryFromExpr($exprs[0]);
            if ($primary && $primary->functionCall()) {
                $funcName    = $primary->functionCall()->qualifiedName()->getText();
                $function    = $this->symbolTable->getFunction($funcName);
                if (!$function) throw new Exception("Función '$funcName' no declarada.");
                $returnTypes = $function->getReturnTypes();
                if (count($returnTypes) !== count($ids)) {
                    throw new Exception(
                        "La función '$funcName' retorna " . count($returnTypes) .
                        " valores, se asignan a " . count($ids) . " variables."
                    );
                }
                $this->visit($exprs[0]);
                foreach ($ids as $i => $idToken) {
                    $name = $idToken->getText();
                    if ($this->symbolTable->resolveInCurrentScope($name)) {
                        throw new Exception("Variable '$name' ya declarada.");
                    }
                    $this->symbolTable->defineVariable(
                        $name, new VariableSymbol($name, $returnTypes[$i])
                    );
                }
                return null;
            }
        }

        if (count($ids) !== count($exprs)) {
            throw new Exception("Número de variables e inicializadores no coincide.");
        }

        foreach ($ids as $i => $idToken) {
            $name     = $idToken->getText();
            $exprType = $this->visit($exprs[$i]);
            if ($this->symbolTable->resolveInCurrentScope($name)) {
                throw new Exception("Variable '$name' ya declarada.");
            }
            $this->symbolTable->defineVariable($name, new VariableSymbol($name, $exprType));
        }

        return null;
    }

    private function getPrimaryFromExpr($exprCtx)
    {
        try {
            $lo  = $exprCtx->logicalOr();
            $la  = $lo->logicalAnd(0);
            $eq  = $la->equality(0);
            $cmp = $eq->comparison(0);
            $t   = $cmp->term(0);
            $f   = $t->factor(0);
            $u   = $f->unary(0);
            return $u->primary();
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function visitConstDecl($ctx)
    {
        $name     = $ctx->ID()->getText();
        $type     = $ctx->type()->getText();
        $exprType = $this->visit($ctx->expression());
        if ($exprType !== $type) {
            throw new Exception("Tipo incompatible en const '$name': se esperaba '$type', se obtuvo '$exprType'.");
        }
        if ($this->symbolTable->resolveInCurrentScope($name)) {
            throw new Exception("Constante '$name' ya declarada.");
        }
        $this->symbolTable->defineVariable($name, new VariableSymbol($name, $type));
        return null;
    }

    // ================================================================
    // ARRAY LITERAL
    // ================================================================
    public function visitArrayLiteral($ctx): string
    {
        $size = (int)$ctx->INT()->getText();

        if ($ctx->type()) {
            $elemType = $ctx->type()->getText();
            $arrType  = "array[{$size}]{$elemType}";
            if ($ctx->arrayElements()) {
                $elems = $ctx->arrayElements()->expression();
                if (count($elems) !== $size) {
                    throw new Exception("Literal de arreglo: se esperaban $size elementos, se obtuvieron " . count($elems) . ".");
                }
                foreach ($elems as $expr) {
                    $t = $this->visit($expr);
                    if ($t !== $elemType) throw new Exception("Elemento tipo '$t' no coincide con '$elemType'.");
                }
            }
            return $arrType;
        }

        $innerType = $this->arrayTypeToString($ctx->arrayType());
        $arrType   = "array[{$size}]{$innerType}";

        if ($ctx->arrayRowElements()) {
            $rows          = $ctx->arrayRowElements()->arrayElements();
            $innerElemType = $this->arrayElementType($innerType);
            if (count($rows) !== $size) {
                throw new Exception("Arreglo 2D: se esperaban $size filas, se obtuvieron " . count($rows) . ".");
            }
            foreach ($rows as $row) {
                foreach ($row->expression() as $expr) {
                    $t = $this->visit($expr);
                    if ($t !== $innerElemType) {
                        throw new Exception("Elemento tipo '$t' no coincide con '$innerElemType'.");
                    }
                }
            }
        }

        return $arrType;
    }

    // ================================================================
    // ARRAY ACCESS  a[i] / a[i][j]
    // ================================================================
    public function visitArrayAccess($ctx): string
    {
        $name   = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($name);
        if (!$symbol) throw new Exception("Variable '$name' no declarada.");

        $type = $symbol->getType();

        foreach ($ctx->expression() as $idxExpr) {
            $idxType = $this->visit($idxExpr);
            if ($idxType !== 'int') throw new Exception("Índice de arreglo debe ser int, se obtuvo '$idxType'.");
            if (strpos($type, 'array') !== 0) throw new Exception("'$name' no es un arreglo.");
            $type = $this->arrayElementType($type);
        }

        return $type;
    }

    // ================================================================
    // PTR ASSIGN   *n = expr
    // ================================================================
    public function visitPtrAssign($ctx)
    {
        $name   = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($name);

        if (!$symbol) {
            throw new Exception("Variable '$name' no declarada.");
        }

        $varType = $symbol->getType();

        if (strpos($varType, 'ptr:') !== 0) {
            throw new Exception("'$name' no es un puntero, no se puede desreferenciar.");
        }

        $baseType  = $this->ptrBaseType($varType);
        $exprType  = $this->visit($ctx->expression());
        $op        = $ctx->assignOp()->getText();

        if ($op === '=') {
            if ($baseType !== $exprType) {
                throw new Exception(
                    "Tipo incompatible en asignación por puntero: se esperaba '$baseType', se obtuvo '$exprType'."
                );
            }
        } else {
            if (!in_array($baseType, ['int', 'float'])) {
                throw new Exception("Operador '$op' sobre puntero requiere int o float.");
            }
            if ($baseType !== $exprType) {
                throw new Exception("Tipos incompatibles en '$op' sobre puntero.");
            }
        }

        return null;
    }

    // ================================================================
    // ARRAY ASSIGN  a[i] = expr
    // ================================================================
    public function visitArrayAssign($ctx)
    {
        $name   = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($name);
        if (!$symbol) throw new Exception("Variable '$name' no declarada.");

        $type       = $symbol->getType();
        $allExprs   = $ctx->expression();
        $idxExprs   = array_slice($allExprs, 0, count($allExprs) - 1);
        $valueExpr  = $allExprs[count($allExprs) - 1];

        foreach ($idxExprs as $idxExpr) {
            $idxType = $this->visit($idxExpr);
            if ($idxType !== 'int') throw new Exception("Índice debe ser int.");
            if (strpos($type, 'array') !== 0) throw new Exception("'$name' no es un arreglo.");
            $type = $this->arrayElementType($type);
        }

        $valueType = $this->visit($valueExpr);
        $op        = $ctx->assignOp()->getText();

        if ($op === '=') {
            if ($type !== $valueType) {
                throw new Exception("Tipo incompatible: se esperaba '$type', se obtuvo '$valueType'.");
            }
        } else {
            if (!in_array($type, ['int', 'float'])) {
                throw new Exception("Operador '$op' sobre arreglo requiere int o float.");
            }
            if ($type !== $valueType) throw new Exception("Tipos incompatibles en '$op'.");
        }

        return null;
    }

    // ================================================================
    // ASSIGNMENT
    // ================================================================
    public function visitAssignment($ctx)
    {
        $name   = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($name);
        if (!$symbol) throw new Exception("Variable '$name' no declarada.");

        $varType  = $symbol->getType();
        $exprType = $this->visit($ctx->expression());
        $op       = $ctx->assignOp()->getText();

        if ($op === '=') {
            if ($varType !== $exprType) {
                throw new Exception("Tipos incompatibles en '=': se esperaba '$varType', se obtuvo '$exprType'.");
            }
        } elseif ($op === '+=') {
            if (!in_array($varType, ['int', 'float', 'string'])) {
                throw new Exception("'+=' solo válido para int, float o string.");
            }
            if ($varType !== $exprType) {
                throw new Exception("Tipos incompatibles en '+='.");
            }
        } else {
            if (!in_array($varType, ['int', 'float'])) {
                throw new Exception("'$op' solo válido para int o float.");
            }
            if ($varType !== $exprType) {
                throw new Exception("Tipos incompatibles en '$op'.");
            }
        }

        return null;
    }

    // ================================================================
    // IF / FOR / SWITCH / BREAK / CONTINUE
    // ================================================================
    public function visitIfStmt($ctx)
    {
        $condType = $this->visit($ctx->expression());
        if ($condType !== 'bool') throw new Exception("Condición de if debe ser bool.");
        $this->visit($ctx->block(0));
        if ($ctx->ELSE()) {
            if ($ctx->ifStmt()) $this->visit($ctx->ifStmt());
            else                $this->visit($ctx->block(1));
        }
        return null;
    }

    public function visitForStmt($ctx)
    {
        $this->loopDepth++;
        $this->symbolTable->enterScope();

        if ($ctx->forInit()) {
            $this->visit($ctx->forInit());
            $condType = $this->visit($ctx->expression());
            if ($condType !== 'bool') throw new Exception("Condición de for debe ser bool.");
            if ($ctx->forPost()) $this->visit($ctx->forPost());
        } elseif ($ctx->expression()) {
            $condType = $this->visit($ctx->expression());
            if ($condType !== 'bool') throw new Exception("Condición de for debe ser bool.");
        }

        $this->visit($ctx->block());
        $this->symbolTable->exitScope();
        $this->loopDepth--;
        return null;
    }

    public function visitForInit($ctx)
    {
        $id       = $ctx->ID()->getText();
        $exprType = $this->visit($ctx->expression());
        $op       = $ctx->getChild(1)->getText();

        if ($op === ':=') {
            if ($this->symbolTable->resolveInCurrentScope($id)) {
                throw new Exception("Variable '$id' ya declarada.");
            }
            $this->symbolTable->defineVariable($id, new VariableSymbol($id, $exprType));
        } else {
            $symbol = $this->symbolTable->resolveVariable($id);
            if (!$symbol) throw new Exception("Variable '$id' no declarada.");
            if ($symbol->getType() !== $exprType) throw new Exception("Tipos incompatibles en forInit.");
        }
        return null;
    }

    public function visitForPost($ctx)
    {
        $id     = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($id);
        if (!$symbol) throw new Exception("Variable '$id' no declarada.");
        if ($ctx->getChildCount() === 2) {
            if (!in_array($symbol->getType(), ['int', 'float'])) {
                throw new Exception("++/-- requiere int o float.");
            }
        } else {
            $exprType = $this->visit($ctx->expression());
            if ($symbol->getType() !== $exprType) throw new Exception("Tipos incompatibles en forPost.");
        }
        return null;
    }

    public function visitSwitchStmt($ctx)
    {
        $this->switchDepth++;
        $switchType = $this->visit($ctx->expression());
        foreach ($ctx->caseClause() as $case) {
            foreach ($case->expList()->expression() as $expr) {
                $caseType = $this->visit($expr);
                if ($caseType !== $switchType) throw new Exception("Tipo incompatible en case.");
            }
            $this->symbolTable->enterScope();
            foreach ($case->statement() as $stmt) $this->visit($stmt);
            $this->symbolTable->exitScope();
        }
        if ($ctx->defaultClause()) {
            $this->symbolTable->enterScope();
            foreach ($ctx->defaultClause()->statement() as $stmt) $this->visit($stmt);
            $this->symbolTable->exitScope();
        }
        $this->switchDepth--;
        return null;
    }

    public function visitBreakStmt($ctx)
    {
        if ($this->loopDepth === 0 && $this->switchDepth === 0) {
            throw new Exception("'break' fuera de loop o switch.");
        }
        return null;
    }

    public function visitContinueStmt($ctx)
    {
        if ($this->loopDepth === 0) throw new Exception("'continue' fuera de loop.");
        return null;
    }

    // ================================================================
    // RETURN (múltiples valores)
    // ================================================================
    public function visitReturnStmt($ctx)
    {
        if ($this->currentFunction === null) throw new Exception("'return' fuera de función.");

        $expectedTypes = $this->currentFunction["returnTypes"];
        $funcName      = $this->currentFunction["name"];

        if (count($expectedTypes) === 0) {
            if ($ctx->expList()) throw new Exception("Función '$funcName' no debe retornar valor.");
            $this->hasReturn = true;
            return null;
        }

        if (!$ctx->expList()) {
            throw new Exception("Función '$funcName' debe retornar: " . implode(", ", $expectedTypes) . ".");
        }

        $exprs = $ctx->expList()->expression();

        if (count($exprs) !== count($expectedTypes)) {
            throw new Exception(
                "Función '$funcName': se esperan " . count($expectedTypes) .
                " valor(es) de retorno, se encontraron " . count($exprs) . "."
            );
        }

        foreach ($exprs as $i => $expr) {
            $exprType = $this->visit($expr);
            if ($exprType !== $expectedTypes[$i]) {
                throw new Exception(
                    "Return '$funcName' valor " . ($i + 1) .
                    ": se esperaba {$expectedTypes[$i]}, se obtuvo $exprType."
                );
            }
        }

        $this->hasReturn = true;
        return null;
    }

    // ================================================================
    // EXPRESSIONS
    // ================================================================
    public function visitExpression($ctx) { return $this->visit($ctx->logicalOr()); }

    public function visitLogicalOr($ctx)
    {
        $type = $this->visit($ctx->logicalAnd(0));
        for ($i = 1; $i < count($ctx->logicalAnd()); $i++) {
            if ($type !== 'bool') throw new Exception("'||' requiere bool.");
            $right = $this->visit($ctx->logicalAnd($i));
            if ($right !== 'bool') throw new Exception("'||' requiere bool.");
            $type = 'bool';
        }
        return $type;
    }

    public function visitLogicalAnd($ctx)
    {
        $type = $this->visit($ctx->equality(0));
        for ($i = 1; $i < count($ctx->equality()); $i++) {
            if ($type !== 'bool') throw new Exception("'&&' requiere bool.");
            $right = $this->visit($ctx->equality($i));
            if ($right !== 'bool') throw new Exception("'&&' requiere bool.");
            $type = 'bool';
        }
        return $type;
    }

    public function visitEquality($ctx)
    {
        $type = $this->visit($ctx->comparison(0));
        for ($i = 1; $i < count($ctx->comparison()); $i++) {
            $right = $this->visit($ctx->comparison($i));
            if ($type !== $right) throw new Exception("Comparación entre tipos distintos: '$type' y '$right'.");
            $type = 'bool';
        }
        return $type;
    }

    public function visitComparison($ctx)
    {
        $type = $this->visit($ctx->term(0));
        for ($i = 1; $i < count($ctx->term()); $i++) {
            $right = $this->visit($ctx->term($i));
            if ($type !== $right) throw new Exception("Relacional entre tipos distintos.");
            if (!in_array($type, ['int', 'float'])) throw new Exception("Relacionales requieren int o float.");
            $type = 'bool';
        }
        return $type;
    }

    public function visitTerm($ctx)
    {
        $type = $this->visit($ctx->factor(0));
        for ($i = 1; $i < count($ctx->factor()); $i++) {
            $right = $this->visit($ctx->factor($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            if ($op === '+') {
                if ($type === 'string' && $right === 'string') { /* ok */ }
                elseif (in_array($type, ['int','float']) && $type === $right) { /* ok */ }
                elseif (in_array($type, ['int','float']) && in_array($right, ['int','float'])) { $type = 'float'; }
                else throw new Exception("'+' no válido entre '$type' y '$right'.");
            } else {
                if (!in_array($type, ['int','float']) || !in_array($right, ['int','float'])) {
                    throw new Exception("'-' requiere int o float.");
                }
                if ($type !== $right) $type = 'float';
            }
        }
        return $type;
    }

    public function visitFactor($ctx)
    {
        $type = $this->visit($ctx->unary(0));
        for ($i = 1; $i < count($ctx->unary()); $i++) {
            $right = $this->visit($ctx->unary($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            if ($op === '%') {
                if ($type !== 'int' || $right !== 'int') throw new Exception("'%' requiere int.");
            } else {
                if (!in_array($type, ['int','float']) || !in_array($right, ['int','float'])) {
                    throw new Exception("'$op' requiere int o float.");
                }
                if ($type !== $right) $type = 'float';
            }
        }
        return $type;
    }

    public function visitUnary($ctx)
    {
        if ($ctx->primary()) return $this->visit($ctx->primary());

        $type = $this->visit($ctx->unary());
        $op   = $ctx->getChild(0)->getText();

        if ($op === '!') {
            if ($type !== 'bool') throw new Exception("'!' requiere bool.");
            return 'bool';
        }
        if ($op === '-') {
            if (!in_array($type, ['int','float'])) throw new Exception("'-' unario requiere int o float.");
            return $type;
        }
        if ($op === '*') {
            if (strpos($type, 'ptr:') !== 0) throw new Exception("'*' requiere puntero, se obtuvo '$type'.");
            return $this->ptrBaseType($type);
        }
        return $type;
    }

    public function visitPrimary($ctx)
    {
        if ($ctx->getToken(GolampiParser::INT, 0))    return 'int';
        if ($ctx->getToken(GolampiParser::FLOAT, 0))  return 'float';
        if ($ctx->getToken(GolampiParser::STRING, 0)) return 'string';
        if ($ctx->getToken(GolampiParser::RUNE, 0))   return 'rune';
        if ($ctx->getToken(GolampiParser::TRUE, 0) ||
            $ctx->getToken(GolampiParser::FALSE, 0))  return 'bool';
        if ($ctx->getToken(GolampiParser::NIL, 0))    return 'nil';

        if ($ctx->arrayAccess()) return $this->visitArrayAccess($ctx->arrayAccess());

        if ($ctx->ID()) {
            $varName = $ctx->ID()->getText();
            $symbol  = $this->symbolTable->resolveVariable($varName);
            if (!$symbol) throw new Exception("Variable '$varName' no declarada.");
            return $symbol->getType();
        }

        if ($ctx->functionCall()) return $this->visit($ctx->functionCall());
        if ($ctx->expression())   return $this->visit($ctx->expression());

        return null;
    }

    public function visitStatement($ctx)
    {
        return $this->visitChildren($ctx);
    }
}