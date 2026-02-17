<?php

require_once __DIR__ . '/SymbolTable.php';
require_once __DIR__ . '/FunctionSymbol.php';
require_once __DIR__ . '/VariableSymbol.php';

class SemanticVisitor extends GolampiBaseVisitor {

    private SymbolTable $symbolTable;
    private int $mainCount = 0;
    private array $output = [];

    public function __construct() {
        $this->symbolTable = new SymbolTable();
    }

    /* ========================
       MÉTODOS PÚBLICOS
       ======================== */

    public function getOutput(): array {
        return $this->output;
    }

    public function getSymbolTable() {
    return $this->symbolTable->toArray();
}


    /* ========================
       PROGRAM (2 PASADAS)
       ======================== */

    public function visitProgram($ctx) {
        // ---------- HOISTING ----------
    foreach ($ctx->functionDecl() as $funcCtx) {
        $this->registerFunction($funcCtx);
    }

        if ($this->mainCount === 0) {
            throw new Exception("Error Semántico: No existe función main.");
        }

        if ($this->mainCount > 1) {
            throw new Exception("Error Semántico: Solo puede existir una función main.");
        }

        // ---------- ANALIZAR CUERPOS ----------
        foreach ($ctx->functionDecl() as $funcCtx) {
            $this->analyzeFunctionBody($funcCtx);
        }

        return null;
    }

    /* ========================
       REGISTRO DE FUNCIONES
       ======================== */

    private function registerFunction($ctx) {

        $name = $ctx->ID()->getText();

        $params = [];
        if ($ctx->paramList()) {
            foreach ($ctx->paramList()->param() as $param) {
                $params[] = [
                    "name" => $param->ID()->getText(),
                    "type" => $param->type()->getText()
                ];
            }
        }

        $returnTypes = [];
        if ($ctx->returnType()) {
            $returnTypes[] = $ctx->returnType()->getText();
        }

        if ($name === "main") {
            $this->mainCount++;

            if (!empty($params)) {
                throw new Exception("Error Semántico: main no puede recibir parámetros.");
            }

            if (!empty($returnTypes)) {
                throw new Exception("Error Semántico: main no puede retornar valores.");
            }
        }

        $symbol = new FunctionSymbol($name, $params, $returnTypes, $ctx);
        $this->symbolTable->defineFunction($name, $symbol);
    }

    /* ========================
       ANALIZAR CUERPO
       ======================== */

    private function analyzeFunctionBody($ctx) {

        $this->symbolTable->enterScope();

        // Registrar parámetros como variables
        if ($ctx->paramList()) {
            foreach ($ctx->paramList()->param() as $param) {

                $variable = new VariableSymbol(
                    $param->ID()->getText(),
                    $param->type()->getText()
                );

                $this->symbolTable->defineVariable(
                    $param->ID()->getText(),
                    $variable
                );
            }
        }

        $this->visit($ctx->block());

        $this->symbolTable->exitScope();
    }

    /* ========================
       BLOCK
       ======================== */

    public function visitBlock($ctx) {
        foreach ($ctx->statement() as $stmt) {
            $this->visit($stmt);
        }
        return null;
    }

    public function visitStatement($ctx) {
        return $this->visitChildren($ctx);
    }

    /* ========================
       VAR DECL (var x int = 10;)
       ======================== */

    public function visitVarDecl($ctx)
    {
        $ids = $ctx->idList()->ID();
        $varType = $ctx->type()->getText();

        $expressions = [];
        if ($ctx->expList()) {
            $expressions = $ctx->expList()->expression();
        }

        if (!empty($expressions) && count($ids) !== count($expressions)) {
            throw new Exception("Error Semántico: Cantidad de variables y expresiones no coincide.");
        }

        foreach ($ids as $index => $idToken) {

            $varName = $idToken->getText();

            if ($this->symbolTable->resolveInCurrentScope($varName)) {
                throw new Exception("Error Semántico: Variable '$varName' ya declarada en este alcance.");
            }

            if (!empty($expressions)) {
                $exprType = $this->visit($expressions[$index]);

                if ($exprType !== $varType) {
                    throw new Exception(
                        "Error Semántico: No se puede asignar tipo '$exprType' a variable '$varName' de tipo '$varType'."
                    );
                }
            }

            $variable = new VariableSymbol($varName, $varType);
            $this->symbolTable->defineVariable($varName, $variable);
        }

        return null;
    }

    /* ========================
       VAR SHORT DECL (x := 10;)
       ======================== */

    public function visitVarShortDecl($ctx)
    {
        $ids = $ctx->idList()->ID();
        $expressions = $ctx->expList()->expression();

        if (count($ids) !== count($expressions)) {
            throw new Exception("Error Semántico: Cantidad de variables y expresiones no coincide.");
        }

        $atLeastOneNew = false;

        foreach ($ids as $index => $idToken) {

            $varName = $idToken->getText();
            $exprType = $this->visit($expressions[$index]);

            $existing = $this->symbolTable->resolveInCurrentScope($varName);

            if ($existing === null) {

                $variable = new VariableSymbol($varName, $exprType);
                $this->symbolTable->defineVariable($varName, $variable);
                $atLeastOneNew = true;

            } else {

                if ($existing->getType() !== $exprType) {
                    throw new Exception(
                        "Error Semántico: No se puede reasignar tipo '$exprType' a variable '$varName'."
                    );
                }
            }
        }

        if (!$atLeastOneNew) {
            throw new Exception(
                "Error Semántico: En una declaración corta (:=), al menos una variable debe ser nueva."
            );
        }

        return null;
    }

    /* ========================
       ASSIGNMENT
       ======================== */

    public function visitAssignment($ctx)
    {
        $varName = $ctx->ID()->getText();

        $variable = $this->symbolTable->resolveVariable($varName);

        if ($variable === null) {
            throw new Exception("Error Semántico: Variable '$varName' no declarada.");
        }

        $varType = $variable->getType();
        $exprType = $this->visit($ctx->expression());

        if ($varType !== $exprType) {
            throw new Exception(
                "Error Semántico: No se puede asignar tipo '$exprType' a variable '$varName' de tipo '$varType'."
            );
        }

        return null;
    }

    /* ========================
       EXPRESSIONS
       ======================== */

    public function visitExpression($ctx)
    {
        // Literales
        if ($ctx->INT())   return "int";
        if ($ctx->FLOAT()) return "float";
        if ($ctx->STRING()) return "string";
        if ($ctx->TRUE()) return "bool";
        if ($ctx->FALSE()) return "bool";

        // Identificador
        if ($ctx->ID()) {

            $varName = $ctx->ID()->getText();
            $variable = $this->symbolTable->resolveVariable($varName);

            if ($variable === null) {
                throw new Exception("Error Semántico: Variable '$varName' no declarada.");
            }

            return $variable->getType();
        }

        // Paréntesis
        if ($ctx->getChildCount() === 3 && $ctx->getChild(0)->getText() === "(") {
            return $this->visit($ctx->expression(0));
        }

        // Operaciones binarias
        if ($ctx->op) {

            $leftType  = $this->visit($ctx->expression(0));
            $rightType = $this->visit($ctx->expression(1));
            $operator  = $ctx->op->getText();

            // Aritméticos
            if (in_array($operator, ['+', '-', '*', '/'])) {

                if (!in_array($leftType, ['int','float']) ||
                    !in_array($rightType, ['int','float'])) {

                    throw new Exception("Error Semántico: Operador '$operator' requiere operandos numéricos.");
                }

                return ($leftType === "float" || $rightType === "float")
                    ? "float"
                    : "int";
            }

            // Relacionales
            if (in_array($operator, ['==','!=','<','>','<=','>='])) {

                if ($leftType !== $rightType) {
                    throw new Exception(
                        "Error Semántico: Comparación entre tipos incompatibles '$leftType' y '$rightType'."
                    );
                }

                return "bool";
            }
        }

        throw new Exception("Error Semántico: Expresión no válida.");
    }
}
