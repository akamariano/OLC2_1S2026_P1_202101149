<?php

require_once __DIR__ . '/SymbolTable.php';
require_once __DIR__ . '/FunctionSymbol.php';
require_once __DIR__ . '/VariableSymbol.php';

class SemanticVisitor extends GolampiBaseVisitor
{
    private SymbolTable $symbolTable;
    private array  $errors          = [];
    private int    $loopDepth       = 0;
    private int    $switchDepth     = 0;
    private ?array $currentFunction = null;
    private bool   $hasReturn       = false;

    public function __construct()
    {
        $this->symbolTable = new SymbolTable();
    }

    public function getSymbolTable(): SymbolTable { return $this->symbolTable; }
    public function getErrors(): array            { return $this->errors;      }
    public function hasErrors(): bool             { return count($this->errors) > 0; }

    // registra errores encontrados durante el análisis semántico
    private function addError(string $msg, $ctx, string $type = 'Semántico'): void
    {
        $line   = 0;
        $column = 0;
        try {
            if ($ctx && method_exists($ctx, 'getStart') && $ctx->getStart()) {
                $line   = $ctx->getStart()->getLine();
                $column = $ctx->getStart()->getCharPositionInLine() + 1;
            } elseif ($ctx && method_exists($ctx, 'getSymbol')) {
                $line   = $ctx->getSymbol()->getLine();
                $column = $ctx->getSymbol()->getCharPositionInLine() + 1;
            }
        } catch (\Throwable $e) {}

        $this->errors[] = [
            'type'        => $type,
            'description' => $msg,
            'line'        => $line,
            'column'      => $column,
        ];
    }

    // funciones auxiliares para manipular tipos de datos
    private function arrayTypeToString($ctx): string
    {
        $size = $ctx->INT()->getText();
        if ($ctx->arrayType()) {
            return "array[{$size}]" . $this->arrayTypeToString($ctx->arrayType());
        }
        return "array[{$size}]{$ctx->type()->getText()}";
    }

    private function typesCompatible(string $a, string $b): bool
    {
        if ($a === $b) return true;
        // normaliza tipos eliminando ptr: para comparar tipos base
        $aBase = strpos($a, 'ptr:') === 0 ? substr($a, 4) : $a;
        $bBase = strpos($b, 'ptr:') === 0 ? substr($b, 4) : $b;
        // verifica compatibilidad entre array[N]type y slice:type
        $aElem = preg_replace('/^array\[\d+\]/', '', $aBase);
        $bElem = strpos($bBase, 'slice:') === 0 ? substr($bBase, 6) : $bBase;
        if ($aElem === $bElem) return true;
        $aElem2 = strpos($aBase, 'slice:') === 0 ? substr($aBase, 6) : $aBase;
        $bElem2 = preg_replace('/^array\[\d+\]/', '', $bBase);
        return $aElem2 === $bElem2;
    }

    private function arrayElementType(string $t): string
    {
        if (strpos($t, 'slice:') === 0) return substr($t, 6);
        return preg_replace('/^array\[\d+\]/', '', $t);
    }

    private function ptrBaseType(string $t): string { return substr($t, 4); }

    // determina el tipo base de un parámetro según su declaración
    private function resolveParamType($paramCtx): string
    {
        $child1 = $paramCtx->getChild(1);
        if ($child1 !== null && $child1->getText() === '*') {
            if ($paramCtx->arrayType())  return 'ptr:' . $this->arrayTypeToString($paramCtx->arrayType());
            if ($paramCtx->sliceType())  return 'ptr:slice:' . $paramCtx->sliceType()->type()->getText();
            return 'ptr:' . $paramCtx->type()->getText();
        }
        if ($paramCtx->arrayType()) return $this->arrayTypeToString($paramCtx->arrayType());
        if ($paramCtx->sliceType()) return 'slice:' . $paramCtx->sliceType()->type()->getText();
        return $paramCtx->type()->getText();
    }

    private function resolveReturnTypeNode($ctx): string
    {
        $first = $ctx->getChild(0);
        if ($first !== null && $first->getText() === '*') {
            if ($ctx->arrayType()) return 'ptr:' . $this->arrayTypeToString($ctx->arrayType());
            if ($ctx->sliceType()) return 'ptr:slice:' . $ctx->sliceType()->type()->getText();
            return 'ptr:' . $ctx->type()->getText();
        }
        if ($ctx->arrayType()) return $this->arrayTypeToString($ctx->arrayType());
        if ($ctx->sliceType()) return 'slice:' . $ctx->sliceType()->type()->getText();
        if ($ctx->type())      return $ctx->type()->getText();
        return 'unknown';
    }

    private function extractReturnTypes($rtCtx): array
    {
        if (!$rtCtx) return [];
        if ($rtCtx->multiReturnType()) {
            return array_map([$this, 'resolveReturnTypeNode'], $rtCtx->multiReturnType());
        }
        return [$this->resolveReturnTypeNode($rtCtx)];
    }

    private function varDeclIsPointer($ctx): bool
    {
        $c = $ctx->getChild(2);
        return $c !== null && $c->getText() === '*';
    }

    private function resolveVarDeclPtrType($ctx): string
    {
        if ($ctx->arrayType()) return 'ptr:' . $this->arrayTypeToString($ctx->arrayType());
        return 'ptr:' . $ctx->type()->getText();
    }

    private function getPrimaryFromExpr($exprCtx)
    {
        try {
            return $exprCtx->logicalOr()
                ->logicalAnd(0)->equality(0)->comparison(0)
                ->term(0)->factor(0)->unary(0)->primary();
        } catch (\Throwable $e) { return null; }
    }

    // retorna el nombre del ámbito actual para la tabla de símbolos
    private function scopeName(): string
    {
        return $this->symbolTable->currentScopeName();
    }

    // procesa el programa completo en tres fases
    public function visitProgram($ctx)
    {
        // registra las firmas de todas las funciones para hoisting semántico
        foreach ($ctx->functionDecl() as $func) {
            $this->registerFunctionSignature($func);
        }
        // procesa variables y constantes a nivel global
        $this->symbolTable->enterScope('global');
        foreach ($ctx->children as $child) {
            $class = get_class($child);
            if (str_contains($class, 'VarDeclContext') ||
                str_contains($class, 'ConstDeclContext')) {
                $this->visit($child);
            }
        }
        // analiza el cuerpo y validaciones de cada función
        foreach ($ctx->functionDecl() as $func) {
            $this->visitFunctionBody($func);
        }
        $this->symbolTable->exitScope();
        return null;
    }

    // registra y valida la firma de una función declarada
    private function registerFunctionSignature($ctx): void
    {
        $name        = $ctx->ID()->getText();
        $line        = $ctx->getStart()->getLine();
        $col         = $ctx->getStart()->getCharPositionInLine() + 1;
        $paramsArray = [];

        if ($ctx->paramList()) {
            foreach ($ctx->paramList()->param() as $param) {
                $paramsArray[] = [
                    'name' => $param->ID()->getText(),
                    'type' => $this->resolveParamType($param),
                ];
            }
        }

        $returnTypes = $this->extractReturnTypes($ctx->returnType());

        if ($this->symbolTable->getFunction($name)) {
            $this->addError("Función '$name' ya declarada.", $ctx);
            return;
        }

        $this->symbolTable->defineFunction(
            $name,
            new FunctionSymbol($name, $paramsArray, $returnTypes, $line, $col)
        );
    }

    private function visitFunctionBody($ctx): void
    {
        $name     = $ctx->ID()->getText();
        $function = $this->symbolTable->getFunction($name);
        if (!$function) return;

        $paramsArray = $function->getParams();
        $returnTypes = $function->getReturnTypes();

        $this->currentFunction = ['name' => $name, 'returnTypes' => $returnTypes];
        $this->hasReturn       = false;

        $this->symbolTable->enterScope($name);

        foreach ($paramsArray as $param) {
            $line = $ctx->getStart()->getLine();
            $col  = $ctx->getStart()->getCharPositionInLine() + 1;
            $this->symbolTable->defineVariable(
                $param['name'],
                new VariableSymbol($param['name'], $param['type'], $line, $col, $name)
            );
        }

        foreach ($ctx->block()->statement() as $stmt) {
            $this->visit($stmt);
        }

        $this->symbolTable->exitScope();

        if (count($returnTypes) > 0 && !$this->hasReturn) {
            $this->addError(
                "Función '$name' debe retornar: " . implode(', ', $returnTypes) . ".",
                $ctx
            );
        }

        $this->currentFunction = null;
    }

    public function visitFunctionDecl($ctx) { return null; }

    // ----------------------------------------------------------------
    // FUNCTION CALL
    // ----------------------------------------------------------------
    public function visitFunctionCall($ctx)
    {
        $name = $ctx->qualifiedName()->getText();

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
            if (count($args) !== 1) {
                $this->addError("len() requiere 1 argumento.", $ctx);
                return 'int32';
            }
            $t = $this->visit($args[0]->expression());
            $tBase = strpos((string)$t, 'ptr:') === 0 ? substr($t, 4) : $t;
            if ($tBase !== 'string' && strpos((string)$tBase, 'array') !== 0 && strpos((string)$tBase, 'slice:') !== 0) {
                $this->addError("len() requiere string o arreglo, se obtuvo '$t'.", $ctx);
            }
            return 'int32';
        }

        if ($name === 'now') {
            return 'string';
        }

        if ($name === 'substr') {
            $args = $ctx->argList() ? $ctx->argList()->argItem() : [];
            if (count($args) !== 3) {
                $this->addError("substr() requiere 3 argumentos.", $ctx);
                return 'string';
            }
            $t0 = $this->visit($args[0]->expression());
            $t1 = $this->visit($args[1]->expression());
            $t2 = $this->visit($args[2]->expression());
            if ($t0 !== 'string') $this->addError("substr(): arg 1 debe ser string.", $ctx);
            if ($t1 !== 'int32')    $this->addError("substr(): arg 2 debe ser int.", $ctx);
            if ($t2 !== 'int32')    $this->addError("substr(): arg 3 debe ser int.", $ctx);
            return 'string';
        }

        if ($name === 'typeOf') {
            $args = $ctx->argList() ? $ctx->argList()->argItem() : [];
            if (count($args) !== 1) {
                $this->addError("typeOf() requiere 1 argumento.", $ctx);
            } else {
                $this->visit($args[0]->expression());
            }
            return 'string';
        }

        $function = $this->symbolTable->getFunction($name);
        if (!$function) {
            $this->addError("Función '$name' no declarada.", $ctx);
            return null;
        }

        $expectedParams = $function->getParams();
        $args = $ctx->argList() ? $ctx->argList()->argItem() : [];

        if (count($expectedParams) !== count($args)) {
            $this->addError(
                "Función '$name' espera " . count($expectedParams) .
                " parámetro(s), se recibieron " . count($args) . ".",
                $ctx
            );
        } else {
            foreach ($expectedParams as $i => $param) {
                $argItem = $args[$i];
                if (!$argItem->expression()) {
                    $varName = $argItem->ID()->getText();
                    $sym     = $this->symbolTable->resolveVariable($varName);
                    if (!$sym) {
                        $this->addError("Variable '$varName' no declarada.", $argItem);
                        continue;
                    }
                    $argType = 'ptr:' . $sym->getType();
                } else {
                    $argType = $this->visit($argItem->expression());
                }
                if ($argType !== $param['type']) {
                    // Compatibilidad: ptr:array[N]T ↔ ptr:slice:T y array[N]T ↔ slice:T
                    $compatible = $this->typesCompatible($argType, $param['type']);
                    if (!$compatible) {
                        $this->addError(
                            "Parámetro '{$param['name']}' de '$name': se esperaba {$param['type']}, se obtuvo $argType.",
                            $argItem
                        );
                    }
                }
            }
        }

        $returnTypes = $function->getReturnTypes();
        return count($returnTypes) > 0 ? $returnTypes[0] : null;
    }

    // procesar bloques de código (crean nuevos ámbitos)
    public function visitBlock($ctx)
    {
        $parentScope = $this->scopeName();
        $this->symbolTable->enterScope($parentScope . ':bloque');
        foreach ($ctx->statement() as $stmt) $this->visit($stmt);
        $this->symbolTable->exitScope();
        return null;
    }

    // procesar declaraciones de variables
    public function visitVarDecl($ctx)
    {
        $line  = $ctx->getStart()->getLine();
        $col   = $ctx->getStart()->getCharPositionInLine() + 1;
        $scope = $this->scopeName();

        // VAR idList type '=' expList  (var a, b int32 = 1, 2)
        if ($ctx->idList()) {
            $type  = $ctx->type()->getText();
            $ids   = $ctx->idList()->ID();
            $exprs = $ctx->expList()->expression();
            foreach ($ids as $i => $idNode) {
                $name = $idNode->getText();
                if (isset($exprs[$i])) {
                    $exprType = $this->visit($exprs[$i]);
                    if ($exprType !== null && $exprType !== $type) {
                        $this->addError(
                            "Incompatibilidad de tipos en '$name': se esperaba '$type', se obtuvo '$exprType'.",
                            $ctx
                        );
                    }
                }
                if ($this->symbolTable->resolveInCurrentScope($name)) {
                    $this->addError("Identificador '$name' ya ha sido declarado en este ámbito.", $ctx);
                    continue;
                }
                $this->symbolTable->defineVariable($name, new VariableSymbol($name, $type, $line, $col, $scope));
            }
            return null;
        }

        if ($ctx->arrayType()) {
            $name    = $ctx->ID()->getText();
            $arrType = $this->arrayTypeToString($ctx->arrayType());

            if ($ctx->arrayLiteral()) {
                $litType = $this->visitArrayLiteral($ctx->arrayLiteral());
                if ($litType !== $arrType) {
                    $this->addError("Literal '$litType' no coincide con '$arrType'.", $ctx);
                }
            } elseif ($ctx->expression()) {
                $exprType = $this->visit($ctx->expression());
                if ($exprType !== $arrType) {
                    $this->addError(
                        "Tipo incompatible en '$name': se esperaba '$arrType', se obtuvo '$exprType'.",
                        $ctx
                    );
                }
            }

            if ($this->symbolTable->resolveInCurrentScope($name)) {
                $this->addError("Identificador '$name' ya ha sido declarado en este ámbito.", $ctx);
                return null;
            }
            $this->symbolTable->defineVariable($name, new VariableSymbol($name, $arrType, $line, $col, $scope));
            return null;
        }

        if ($this->varDeclIsPointer($ctx)) {
            $name    = $ctx->ID()->getText();
            $ptrType = $this->resolveVarDeclPtrType($ctx);
            if ($this->symbolTable->resolveInCurrentScope($name)) {
                $this->addError("Identificador '$name' ya ha sido declarado en este ámbito.", $ctx);
                return null;
            }
            $this->symbolTable->defineVariable($name, new VariableSymbol($name, $ptrType, $line, $col, $scope));
            return null;
        }

        // VAR ID type ('=' expression)?
        $type = $ctx->type()->getText();
        $name = $ctx->ID()->getText();

        if ($ctx->expression()) {
            $exprType = $this->visit($ctx->expression());
            if ($exprType !== null && $exprType !== $type) {
                $this->addError(
                    "Incompatibilidad de tipos en '$name': se esperaba '$type', se obtuvo '$exprType'.",
                    $ctx
                );
            }
        }

        if ($this->symbolTable->resolveInCurrentScope($name)) {
            $this->addError("Identificador '$name' ya ha sido declarado en este ámbito.", $ctx);
            return null;
        }
        $this->symbolTable->defineVariable($name, new VariableSymbol($name, $type, $line, $col, $scope));
        return null;
    }

    public function visitVarShortDecl($ctx)
    {
        $line  = $ctx->getStart()->getLine();
        $col   = $ctx->getStart()->getCharPositionInLine() + 1;
        $scope = $this->scopeName();

        if ($ctx->arrayLiteral()) {
            $name    = $ctx->ID()->getText();
            $arrType = $this->visitArrayLiteral($ctx->arrayLiteral());
            if ($this->symbolTable->resolveInCurrentScope($name)) {
                $this->addError("Identificador '$name' ya ha sido declarado en este ámbito.", $ctx);
                return null;
            }
            $this->symbolTable->defineVariable($name, new VariableSymbol($name, $arrType, $line, $col, $scope));
            return null;
        }

        $ids   = $ctx->idList()->ID();
        $exprs = $ctx->expList()->expression();

        // Múltiples retornos: x, ok := func()
        if (count($exprs) === 1 && count($ids) > 1) {
            $primary = $this->getPrimaryFromExpr($exprs[0]);
            if ($primary && $primary->functionCall()) {
                $funcName    = $primary->functionCall()->qualifiedName()->getText();
                $function    = $this->symbolTable->getFunction($funcName);
                if (!$function) {
                    $this->addError("Función '$funcName' no declarada.", $ctx);
                    return null;
                }
                $returnTypes = $function->getReturnTypes();
                if (count($returnTypes) !== count($ids)) {
                    $this->addError(
                        "La función '$funcName' retorna " . count($returnTypes) .
                        " valor(es), se asignan a " . count($ids) . " variables.",
                        $ctx
                    );
                    return null;
                }
                $this->visit($exprs[0]);
                foreach ($ids as $i => $idToken) {
                    $n = $idToken->getText();
                    if ($this->symbolTable->resolveInCurrentScope($n)) {
                        $this->addError("Identificador '$n' ya ha sido declarado en este ámbito.", $ctx);
                        continue;
                    }
                    $this->symbolTable->defineVariable(
                        $n, new VariableSymbol($n, $returnTypes[$i], $line, $col, $scope)
                    );
                }
                return null;
            }
        }

        if (count($ids) !== count($exprs)) {
            $this->addError("Número de variables e inicializadores no coincide.", $ctx);
            return null;
        }

        foreach ($ids as $i => $idToken) {
            $n        = $idToken->getText();
            $exprType = $this->visit($exprs[$i]);
            // Si la expresión tuvo error semántico, exprType es null → usar 'unknown'
            $resolvedType = $exprType ?? 'unknown';
            if ($this->symbolTable->resolveInCurrentScope($n)) {
                $this->addError("Identificador '$n' ya ha sido declarado en este ámbito.", $ctx);
                continue;
            }
            $this->symbolTable->defineVariable(
                $n, new VariableSymbol($n, $resolvedType, $line, $col, $scope)
            );
        }
        return null;
    }

    public function visitConstDecl($ctx)
    {
        $line  = $ctx->getStart()->getLine();
        $col   = $ctx->getStart()->getCharPositionInLine() + 1;
        $scope = $this->scopeName();
        $name  = $ctx->ID()->getText();
        $type  = $ctx->type()->getText();

        $exprType = $this->visit($ctx->expression());
        if ($exprType !== null && $exprType !== $type) {
            $this->addError(
                "Incompatibilidad de tipos en const '$name': se esperaba '$type', se obtuvo '$exprType'.",
                $ctx
            );
        }
        if ($this->symbolTable->resolveInCurrentScope($name)) {
            $this->addError("Identificador '$name' ya ha sido declarado en este ámbito.", $ctx);
            return null;
        }
        $this->symbolTable->defineVariable($name, new VariableSymbol($name, $type, $line, $col, $scope, null, true));
        return null;
    }

    // procesa literales de arreglos y valida tipos de elementos
    public function visitArrayLiteral($ctx): ?string
    {
        // maneja slice sin tamaño explícito con inferencia de tamaño
        if ($ctx->INT() === null) {
            $elemType = $ctx->type()->getText();
            $elems    = $ctx->arrayElements() ? $ctx->arrayElements()->expression() : [];
            $size     = count($elems);
            foreach ($elems as $expr) {
                $t = $this->visit($expr);
                if ($t !== null && $t !== $elemType) {
                    $this->addError(
                        "Elemento tipo '$t' no coincide con '$elemType' en literal de arreglo.",
                        $expr
                    );
                }
            }
            return "array[{$size}]{$elemType}";
        }

        $size = (int)$ctx->INT()->getText();

        if ($ctx->type()) {
            $elemType = $ctx->type()->getText();
            $arrType  = "array[{$size}]{$elemType}";
            if ($ctx->arrayElements()) {
                $elems = $ctx->arrayElements()->expression();
                if (count($elems) !== $size) {
                    $this->addError(
                        "Literal de arreglo: se esperaban $size elementos, se obtuvieron " . count($elems) . ".",
                        $ctx
                    );
                } else {
                    foreach ($elems as $expr) {
                        $t = $this->visit($expr);
                        if ($t !== null && $t !== $elemType) {
                            $this->addError(
                                "Elemento tipo '$t' no coincide con '$elemType' en literal de arreglo.",
                                $expr
                            );
                        }
                    }
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
                $this->addError(
                    "Arreglo 2D: se esperaban $size filas, se obtuvieron " . count($rows) . ".",
                    $ctx
                );
            } else {
                foreach ($rows as $row) {
                    foreach ($row->expression() as $expr) {
                        $t = $this->visit($expr);
                        if ($t !== null && $t !== $innerElemType) {
                            $this->addError(
                                "Elemento tipo '$t' no coincide con '$innerElemType'.",
                                $expr
                            );
                        }
                    }
                }
            }
        }
        return $arrType;
    }

    public function visitArrayAccess($ctx): ?string
    {
        $name   = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($name);
        if (!$symbol) {
            $this->addError("Uso de variable no declarada: '$name'.", $ctx);
            return null;
        }
        $type = $symbol->getType();
        // desreferencia punteros a arreglos o slices
        if (strpos($type, 'ptr:') === 0) {
            $type = substr($type, 4);
        }
        // Normalizar slice:elemType a array[N]elemType para el chequeo (usamos 'array' prefix)
        $isSlice = strpos($type, 'slice:') === 0;
        foreach ($ctx->expression() as $idxExpr) {
            $idxType = $this->visit($idxExpr);
            if ($idxType !== null && $idxType !== 'int32') {
                $this->addError("Índice de arreglo debe ser int, se obtuvo '$idxType'.", $idxExpr);
            }
            if (!$isSlice && strpos((string)$type, 'array') !== 0) {
                $this->addError("'$name' no es un arreglo.", $ctx);
                return null;
            }
            // Para slice solo retornamos el tipo elemento
            if ($isSlice) {
                return substr($type, 6); // quitar 'slice:'
            }
            $type = $this->arrayElementType($type);
        }
        return $type;
    }

    public function visitArrayAssign($ctx)
    {
        $name   = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($name);
        if (!$symbol) {
            $this->addError("Uso de variable no declarada: '$name'.", $ctx);
            return null;
        }
        $type      = $symbol->getType();
        // desreferencia punteros a arreglos o slices
        if (strpos($type, 'ptr:') === 0) {
            $type = substr($type, 4);
        }
        $isSlice   = strpos($type, 'slice:') === 0;
        $allExprs  = $ctx->expression();
        $idxExprs  = array_slice($allExprs, 0, count($allExprs) - 1);
        $valueExpr = $allExprs[count($allExprs) - 1];

        foreach ($idxExprs as $idxExpr) {
            $idxType = $this->visit($idxExpr);
            if ($idxType !== null && $idxType !== 'int32') {
                $this->addError("Índice debe ser int, se obtuvo '$idxType'.", $idxExpr);
            }
            if (!$isSlice && strpos((string)$type, 'array') !== 0) {
                $this->addError("'$name' no es un arreglo (demasiados índices).", $ctx);
                return null;
            }
            $type = $this->arrayElementType($type);
        }

        $valueType = $this->visit($valueExpr);
        $op        = $ctx->assignOp()->getText();

        if ($op === '=') {
            if ($valueType !== null && $type !== $valueType) {
                $this->addError(
                    "Incompatibilidad de tipos: se esperaba '$type', se obtuvo '$valueType'.",
                    $ctx
                );
            }
        } else {
            if (!in_array($type, ['int32', 'float32'])) {
                $this->addError("Operador '$op' sobre arreglo requiere int o float.", $ctx);
            } elseif ($valueType !== null && $type !== $valueType) {
                $this->addError("Incompatibilidad de tipos en '$op'.", $ctx);
            }
        }
        return null;
    }

    public function visitPtrAssign($ctx)
    {
        $name   = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($name);
        if (!$symbol) {
            $this->addError("Uso de variable no declarada: '$name'.", $ctx);
            return null;
        }
        $varType = $symbol->getType();
        if (strpos($varType, 'ptr:') !== 0) {
            $this->addError("'$name' no es un puntero.", $ctx);
            return null;
        }
        $baseType  = $this->ptrBaseType($varType);
        $exprType  = $this->visit($ctx->expression());
        $op        = $ctx->assignOp()->getText();

        if ($exprType !== null && $baseType !== $exprType) {
            $this->addError(
                "Incompatibilidad de tipos en asignación por puntero '*$name': se esperaba '$baseType', se obtuvo '$exprType'.",
                $ctx
            );
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
        if (!$symbol) {
            $this->addError("Uso de variable no declarada: '$name'.", $ctx);
            return null;
        }
        // valida que no se asigne a una constante
        if ($symbol->isConst()) {
            $this->addError("No se puede modificar la constante '$name'.", $ctx);
            return null;
        }
        $varType  = $symbol->getType();
        // punteros se tratan como su tipo base para asignación directa
        $effectiveType = strpos($varType, 'ptr:') === 0 ? substr($varType, 4) : $varType;
        $exprType = $this->visit($ctx->expression());
        $op       = $ctx->assignOp()->getText();

        if ($op === '=') {
            if ($exprType !== null && $effectiveType !== $exprType) {
                $this->addError(
                    "Incompatibilidad de tipos en asignación a '$name': se esperaba '$varType', se obtuvo '$exprType'.",
                    $ctx
                );
            }
        } elseif ($op === '+=') {
            if (!in_array($effectiveType, ['int32', 'float32', 'string'])) {
                $this->addError("Operador '+=' no válido para tipo '$varType'.", $ctx);
            } elseif ($exprType !== null && $effectiveType !== $exprType) {
                $this->addError("Incompatibilidad de tipos en '+=' sobre '$name'.", $ctx);
            }
        } else {
            if (!in_array($effectiveType, ['int32', 'float32'])) {
                $this->addError("Operador '$op' solo válido para int o float.", $ctx);
            } elseif ($exprType !== null && $effectiveType !== $exprType) {
                $this->addError("Incompatibilidad de tipos en '$op' sobre '$name'.", $ctx);
            }
        }
        return null;
    }

    // procesa sentencias de control (if, for, switch, break, continue)
    public function visitIfStmt($ctx)
    {
        $condType = $this->visit($ctx->expression());
        if ($condType !== null && $condType !== 'bool') {
            $this->addError("La condición del if debe ser bool, se obtuvo '$condType'.", $ctx->expression());
        }
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
        $scopeName = $this->scopeName();
        $this->symbolTable->enterScope($scopeName . ':for');

        if ($ctx->forInit()) {
            $this->visit($ctx->forInit());
            $condType = $this->visit($ctx->expression());
            if ($condType !== null && $condType !== 'bool') {
                $this->addError("Condición del for debe ser bool, se obtuvo '$condType'.", $ctx->expression());
            }
            if ($ctx->forPost()) $this->visit($ctx->forPost());
        } elseif ($ctx->expression()) {
            $condType = $this->visit($ctx->expression());
            if ($condType !== null && $condType !== 'bool') {
                $this->addError("Condición del for debe ser bool, se obtuvo '$condType'.", $ctx->expression());
            }
        }

        $this->visit($ctx->block());
        $this->symbolTable->exitScope();
        $this->loopDepth--;
        return null;
    }

    public function visitForInit($ctx)
    {
        $line  = $ctx->getStart()->getLine();
        $col   = $ctx->getStart()->getCharPositionInLine() + 1;
        $scope = $this->scopeName();
        $id    = $ctx->ID()->getText();
        $exprType = $this->visit($ctx->expression());
        $op    = $ctx->getChild(1)->getText();

        if ($op === ':=') {
            if ($this->symbolTable->resolveInCurrentScope($id)) {
                $this->addError("Identificador '$id' ya declarado en este ámbito.", $ctx);
                return null;
            }
            $this->symbolTable->defineVariable(
                $id, new VariableSymbol($id, $exprType ?? 'int32', $line, $col, $scope)
            );
        } else {
            $sym = $this->symbolTable->resolveVariable($id);
            if (!$sym) {
                $this->addError("Uso de variable no declarada: '$id'.", $ctx);
            } elseif ($exprType !== null && $sym->getType() !== $exprType) {
                $this->addError("Incompatibilidad de tipos en forInit.", $ctx);
            }
        }
        return null;
    }

    public function visitForPost($ctx)
    {
        $id  = $ctx->ID()->getText();
        $sym = $this->symbolTable->resolveVariable($id);
        if (!$sym) {
            $this->addError("Uso de variable no declarada: '$id'.", $ctx);
            return null;
        }
        if ($ctx->getChildCount() === 2) {
            if (!in_array($sym->getType(), ['int32', 'float32'])) {
                $this->addError("++/-- requiere int o float, '$id' es {$sym->getType()}.", $ctx);
            }
        } else {
            $exprType = $this->visit($ctx->expression());
            if ($exprType !== null && $sym->getType() !== $exprType) {
                $this->addError("Incompatibilidad de tipos en forPost.", $ctx);
            }
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
                if ($caseType !== null && $switchType !== null && $caseType !== $switchType) {
                    $this->addError("Tipo incompatible en case: '$caseType' vs '$switchType'.", $expr);
                }
            }
            $this->symbolTable->enterScope($this->scopeName() . ':case');
            foreach ($case->statement() as $stmt) $this->visit($stmt);
            $this->symbolTable->exitScope();
        }
        if ($ctx->defaultClause()) {
            $this->symbolTable->enterScope($this->scopeName() . ':default');
            foreach ($ctx->defaultClause()->statement() as $stmt) $this->visit($stmt);
            $this->symbolTable->exitScope();
        }
        $this->switchDepth--;
        return null;
    }

    public function visitBreakStmt($ctx)
    {
        if ($this->loopDepth === 0 && $this->switchDepth === 0) {
            $this->addError("'break' fuera de loop o switch.", $ctx);
        }
        return null;
    }

    public function visitContinueStmt($ctx)
    {
        if ($this->loopDepth === 0) {
            $this->addError("'continue' fuera de loop.", $ctx);
        }
        return null;
    }

    public function visitIncDecStmt($ctx)
    {
        $name   = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($name);
        if (!$symbol) {
            $this->addError("Uso de variable no declarada: '$name'.", $ctx);
            return null;
        }
        if (!in_array($symbol->getType(), ['int32', 'float32', 'rune'])) {
            $op = $ctx->getChild(1)->getText();
            $this->addError("Operador '$op' requiere int, float o rune, se obtuvo '{$symbol->getType()}'.", $ctx);
        }
        return null;
    }

    // valida que los returns sean correctos según la firma de la función
    public function visitReturnStmt($ctx)
    {
        if ($this->currentFunction === null) {
            $this->addError("'return' fuera de una función.", $ctx);
            return null;
        }
        $expectedTypes = $this->currentFunction['returnTypes'];
        $funcName      = $this->currentFunction['name'];

        if (count($expectedTypes) === 0) {
            if ($ctx->expList()) {
                $this->addError("Función '$funcName' no debe retornar valor.", $ctx);
            }
            $this->hasReturn = true;
            return null;
        }

        if (!$ctx->expList()) {
            $this->addError(
                "Función '$funcName' debe retornar: " . implode(', ', $expectedTypes) . ".",
                $ctx
            );
            return null;
        }

        $exprs = $ctx->expList()->expression();
        if (count($exprs) !== count($expectedTypes)) {
            $this->addError(
                "Función '$funcName': se esperan " . count($expectedTypes) .
                " valor(es) de retorno, se encontraron " . count($exprs) . ".",
                $ctx
            );
            $this->hasReturn = true;
            return null;
        }

        foreach ($exprs as $i => $expr) {
            $exprType = $this->visit($expr);
            if ($exprType !== null && $exprType !== $expectedTypes[$i]) {
                $this->addError(
                    "Return de '$funcName' valor " . ($i + 1) .
                    ": se esperaba {$expectedTypes[$i]}, se obtuvo $exprType.",
                    $expr
                );
            }
        }
        $this->hasReturn = true;
        return null;
    }

    // procesa expresiones aritméticas, lógicas y comparaciones
    public function visitExpression($ctx) { return $this->visit($ctx->logicalOr()); }

    // valida operaciones lógicas OR con análisis de tipos
    public function visitLogicalOr($ctx)
    {
        $type = $this->visit($ctx->logicalAnd(0));
        for ($i = 1; $i < count($ctx->logicalAnd()); $i++) {
            $right = $this->visit($ctx->logicalAnd($i));
            if ($type !== null && $type !== 'bool') {
                $this->addError("Operación '||' inválida entre '$type' y '$right'.", $ctx);
            }
            $type = 'bool';
        }
        return $type;
    }

    // valida operaciones lógicas AND con análisis de tipos
    public function visitLogicalAnd($ctx)
    {
        $type = $this->visit($ctx->equality(0));
        for ($i = 1; $i < count($ctx->equality()); $i++) {
            $right = $this->visit($ctx->equality($i));
            if ($type !== null && $type !== 'bool') {
                $this->addError("Operación '&&' inválida entre '$type' y '$right'.", $ctx);
            }
            $type = 'bool';
        }
        return $type;
    }

    // valida comparaciones de igualdad (==, !=)
    public function visitEquality($ctx)
    {
        $type = $this->visit($ctx->comparison(0));
        for ($i = 1; $i < count($ctx->comparison()); $i++) {
            $right = $this->visit($ctx->comparison($i));
            if ($type !== null && $right !== null && $type !== $right) {
                $this->addError("Comparación inválida entre tipos '$type' y '$right'.", $ctx);
            }
            $type = 'bool';
        }
        return $type;
    }

    // valida operaciones relacionales (<, >, <=, >=) entre tipos
    public function visitComparison($ctx)
    {
        // tipos numéricos válidos: int32, float32, rune (alias de int32)
        $numeric = ['int32', 'float32', 'rune'];

        $type = $this->visit($ctx->term(0));
        for ($i = 1; $i < count($ctx->term()); $i++) {
            $right = $this->visit($ctx->term($i));
            if ($type !== null && $right !== null) {
                // normaliza rune a int32 para compatibilidad en comparaciones
                $effL = $type  === 'rune' ? 'int32' : $type;
                $effR = $right === 'rune' ? 'int32' : $right;

                if ($type === 'string' && $right === 'string') {
                    // comparación de cadenas es válida
                } elseif (in_array($type, $numeric) && in_array($right, $numeric)) {
                    if ($effL !== $effR) {
                        $this->addError("Operación relacional entre tipos distintos '$type' y '$right'.", $ctx);
                    }
                    // int32, float32, rune son válidos
                } else {
                    $this->addError("Operadores relacionales no válidos entre '$type' y '$right'.", $ctx);
                }
            }
            $type = 'bool';
        }
        return $type;
    }

    // valida operaciones aritméticas de suma y resta
    public function visitTerm($ctx)
    {
        // tipos numéricos válidos: int32, float32, rune
        $numeric = ['int32', 'float32', 'rune'];

        $type = $this->visit($ctx->factor(0));
        if (strpos((string)$type, 'ptr:') === 0) $type = substr($type, 4);
        for ($i = 1; $i < count($ctx->factor()); $i++) {
            $right = $this->visit($ctx->factor($i));
            if (strpos((string)$right, 'ptr:') === 0) $right = substr($right, 4);
            $op = $ctx->getChild(($i * 2) - 1)->getText();
            if ($type !== null && $right !== null) {
                if ($op === '+') {
                    if ($type === 'string' && $right === 'string') {
                        // concatenación de cadenas
                    } elseif (in_array($type, $numeric) && in_array($right, $numeric)) {
                        // suma numérica con promoción de tipos si es necesario
                        if ($type === 'float32' || $right === 'float32') {
                            $type = 'float32';
                        } else {
                            $type = 'int32';
                        }
                    } else {
                        $this->addError("Operación '+' inválida entre '$type' y '$right'.", $ctx);
                    }
                } else {
                    // resta: solo para tipos numéricos
                    if (!in_array($type, $numeric) || !in_array($right, $numeric)) {
                        $this->addError("Operación '-' inválida entre '$type' y '$right'.", $ctx);
                    } elseif ($type === 'float32' || $right === 'float32') {
                        $type = 'float32';
                    } else {
                        $type = 'int32';
                    }
                }
            }
        }
        return $type;
    }

    // valida operaciones aritméticas de multiplicación, división y módulo
    public function visitFactor($ctx)
    {
        // tipos numéricos válidos: int32, float32, rune
        $numeric = ['int32', 'float32', 'rune'];

        $type = $this->visit($ctx->unary(0));
        if (strpos((string)$type, 'ptr:') === 0) $type = substr($type, 4);
        for ($i = 1; $i < count($ctx->unary()); $i++) {
            $right = $this->visit($ctx->unary($i));
            if (strpos((string)$right, 'ptr:') === 0) $right = substr($right, 4);
            $op = $ctx->getChild(($i * 2) - 1)->getText();
            if ($type !== null && $right !== null) {
                if ($op === '%') {
                    // módulo solo para enteros
                    $ok = (in_array($type, ['int32','rune']) && in_array($right, ['int32','rune']));
                    if (!$ok) {
                        $this->addError("Operación '%' inválida entre '$type' y '$right': se requiere int o rune.", $ctx);
                    } else {
                        $type = 'int32';
                    }
                } elseif ($op === '*') {
                    // multiplicación incluyendo repetición de cadena (int*string)
                    if (($type === 'int32' && $right === 'string') ||
                        ($type === 'string' && $right === 'int32')) {
                        $type = 'string';
                    } elseif (in_array($type, $numeric) && in_array($right, $numeric)) {
                        if ($type === 'float32' || $right === 'float32') {
                            $type = 'float32';
                        } else {
                            $type = 'int32';
                        }
                    } else {
                        $this->addError("Operación '*' inválida entre '$type' y '$right'.", $ctx);
                    }
                } else {
                    // división con promoción de tipos si uno es float
                    if (!in_array($type, $numeric) || !in_array($right, $numeric)) {
                        $this->addError("Operación '$op' inválida entre '$type' y '$right'.", $ctx);
                    } elseif ($type === 'float32' || $right === 'float32') {
                        $type = 'float32';
                    } else {
                        $type = 'int32';
                    }
                }
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
            if ($type !== null && $type !== 'bool') {
                $this->addError("Operador '!' requiere bool, se obtuvo '$type'.", $ctx);
            }
            return 'bool';
        }
        if ($op === '-') {
            if ($type !== null && !in_array($type, ['int32', 'float32'])) {
                $this->addError("Operador '-' unario requiere int o float, se obtuvo '$type'.", $ctx);
            }
            return $type;
        }
        if ($op === '*') {
            if ($type !== null && strpos((string)$type, 'ptr:') !== 0) {
                $this->addError("Desreferenciación inválida: '$type' no es puntero.", $ctx);
                return null;
            }
            return $type ? $this->ptrBaseType($type) : null;
        }
        return $type;
    }

    public function visitPrimary($ctx)
    {
        if ($ctx->getToken(GolampiParser::INT, 0))    return 'int32';
        if ($ctx->getToken(GolampiParser::FLOAT, 0))  return 'float32';
        if ($ctx->getToken(GolampiParser::STRING, 0)) return 'string';
        if ($ctx->getToken(GolampiParser::RUNE, 0))   return 'rune';
        if ($ctx->getToken(GolampiParser::TRUE, 0) ||
            $ctx->getToken(GolampiParser::FALSE, 0))  return 'bool';
        if ($ctx->getToken(GolampiParser::NIL, 0))    return 'nil';

        if ($ctx->arrayAccess()) return $this->visitArrayAccess($ctx->arrayAccess());

        if ($ctx->ID()) {
            $varName = $ctx->ID()->getText();
            $symbol  = $this->symbolTable->resolveVariable($varName);
            if (!$symbol) {
                $this->addError("Uso de variable no declarada: '$varName'.", $ctx);
                return null;
            }
            return $symbol->getType();
        }

        if ($ctx->functionCall()) return $this->visit($ctx->functionCall());
        if ($ctx->expression())   return $this->visit($ctx->expression());
        return null;
    }

    public function visitStatement($ctx) { return $this->visitChildren($ctx); }
}