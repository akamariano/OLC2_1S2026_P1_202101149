<?php

require_once __DIR__ . '/SymbolTable.php';
require_once __DIR__ . '/FunctionSymbol.php';
require_once __DIR__ . '/VariableSymbol.php';

class SemanticVisitor extends GolampiBaseVisitor {

    private SymbolTable $symbolTable;
    private int $mainCount = 0;
    private array $output = [];

    private ?FunctionSymbol $currentFunction = null;
    private int $loopDepth = 0;

    public function __construct() {
        $this->symbolTable = new SymbolTable();
    }

    /* ======================== */
    /* MÉTODOS PÚBLICOS         */
    /* ======================== */

    public function getOutput(): array {
        return $this->output;
    }

    public function getSymbolTable() {
        return $this->symbolTable->toArray();
    }

    /* ======================== */
    /* PROGRAM (2 PASADAS)      */
    /* ======================== */

    public function visitProgram($ctx) {

        foreach ($ctx->functionDecl() as $funcCtx) {
            $this->registerFunction($funcCtx);
        }

        if ($this->mainCount === 0) {
            throw new Exception("Error Semántico: No existe función main.");
        }

        if ($this->mainCount > 1) {
            throw new Exception("Error Semántico: Solo puede existir una función main.");
        }

        foreach ($ctx->functionDecl() as $funcCtx) {
            $this->analyzeFunctionBody($funcCtx);
        }

        return null;
    }

    /* ======================== */
    /* REGISTRO DE FUNCIONES    */
    /* ======================== */

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

    /* ======================== */
    /* ANALIZAR CUERPO          */
    /* ======================== */

    private function analyzeFunctionBody($ctx) {

        $name = $ctx->ID()->getText();
        $this->currentFunction = $this->symbolTable->getFunction($name);

        

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

        
        $this->currentFunction = null;
    }

    /* ======================== */
    /* BLOCK                    */
    /* ======================== */

    public function visitBlock($ctx)
{
    $this->symbolTable->enterScope();

    // Si estamos en una función y este es el primer bloque,
    // debemos registrar los parámetros aquí
    if ($this->currentFunction !== null) {

        $params = $this->currentFunction->getParams();

        foreach ($params as $param) {

            if ($this->symbolTable->resolveInCurrentScope($param["name"]) === null) {

                $this->symbolTable->defineVariable(
                    $param["name"],
                    new VariableSymbol(
                        $param["name"],
                        $param["type"]
                    )
                );
            }
        }
    }

    foreach ($ctx->statement() as $stmt) {
        $this->visit($stmt);
    }

    $this->symbolTable->exitScope();

    return null;
}


    public function visitStatement($ctx) {
        return $this->visitChildren($ctx);
    }

    /* ======================== */
    /* RETURN                   */
    /* ======================== */

    public function visitReturnStmt($ctx)
    {
        if ($this->currentFunction === null) {
            throw new Exception("Error Semántico: return fuera de función.");
        }

        $expectedReturns = $this->currentFunction->getReturnTypes();

        $expressions = $ctx->expList()
            ? $ctx->expList()->expression()
            : [];

        if (count($expectedReturns) !== count($expressions)) {
            throw new Exception("Error Semántico: Cantidad de valores retornados incorrecta.");
        }

        foreach ($expressions as $i => $expr) {

            $exprType = $this->visit($expr);

            if ($exprType !== $expectedReturns[$i]) {
                throw new Exception(
                    "Error Semántico: Tipo de retorno incorrecto. Se esperaba '{$expectedReturns[$i]}' y se obtuvo '$exprType'."
                );
            }
        }

        return null;
    }

    /* ======================== */
    /* IF                       */
    /* ======================== */

    public function visitIfStatement($ctx)
{
    $condType = $this->visit($ctx->expression());

    if ($condType !== "bool") {
        throw new Exception("Error Semántico: Condición de if debe ser bool.");
    }

    $this->visit($ctx->block());

    return null;
}


    /* ======================== */
    /* FOR                      */
    /* ======================== */

    public function visitForStatement($ctx)
{
    $this->loopDepth++;

    if ($ctx->expression()) {
        $condType = $this->visit($ctx->expression());
        if ($condType !== "bool") {
            throw new Exception("Error Semántico: Condición de for debe ser bool.");
        }
    }

    $this->visit($ctx->block());

    $this->loopDepth--;

    return null;
}


    public function visitBreakStmt($ctx)
    {
        if ($this->loopDepth === 0) {
            throw new Exception("Error Semántico: break fuera de un ciclo.");
        }
        return null;
    }

    public function visitContinueStmt($ctx)
    {
        if ($this->loopDepth === 0) {
            throw new Exception("Error Semántico: continue fuera de un ciclo.");
        }
        return null;
    }

    /* ======================== */
    /* LLAMADAS A FUNCIÓN       */
    /* ======================== */

    private function validateFunctionCall($ctx)
    {
        $funcName = $ctx->ID()->getText();

        if ($funcName === "main") {
            throw new Exception("Error Semántico: main no puede ser llamada explícitamente.");
        }

        $function = $this->symbolTable->getFunction($funcName);

        if ($function === null) {
            throw new Exception("Error Semántico: Función '$funcName' no declarada.");
        }

        $paramsExpected = $function->getParams();
        $paramsGiven = $ctx->expList()
            ? $ctx->expList()->expression()
            : [];

        if (count($paramsExpected) !== count($paramsGiven)) {
            throw new Exception("Error Semántico: Cantidad incorrecta de parámetros en llamada a '$funcName'.");
        }

        foreach ($paramsGiven as $i => $expr) {
            $givenType = $this->visit($expr);
            if ($givenType !== $paramsExpected[$i]["type"]) {
                throw new Exception(
                    "Error Semántico: Tipo incorrecto en parámetro {$i} de '$funcName'."
                );
            }
        }

        $returns = $function->getReturnTypes();

        if (count($returns) === 1) {
            return $returns[0];
        }

        return $returns;
    }

    /* ======================== */
    /* EXPRESSIONS              */
    /* ======================== */
public function visitExpression($ctx)
{
    // Literales
    if ($ctx->INT())   return "int";
    if ($ctx->FLOAT()) return "float";
    if ($ctx->STRING()) return "string";
    if ($ctx->TRUE()) return "bool";
    if ($ctx->FALSE()) return "bool";

    if ($ctx->functionCall()) {
    return $this->validateFunctionCall($ctx->functionCall());
}


    // Identificador simple
    if ($ctx->getChildCount() === 1 && $ctx->ID()) {

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
public function visitVarDecl($ctx)
{
    $ids = $ctx->idList()->ID();
    $declaredType = $ctx->type()->getText();

    $expressions = $ctx->expList()
        ? $ctx->expList()->expression()
        : [];

    if (!empty($expressions) && count($ids) !== count($expressions)) {
        throw new Exception(
            "Error Semántico: Cantidad de variables y expresiones no coincide."
        );
    }

    // Validar expresiones antes de definir
    foreach ($expressions as $i => $expr) {

        $exprType = $this->visit($expr);

        if ($exprType !== $declaredType) {
            throw new Exception(
                "Error Semántico: No se puede asignar '$exprType' a variable de tipo '$declaredType'."
            );
        }
    }

    // Registrar variables en el scope actual
    foreach ($ids as $idToken) {

        $name = $idToken->getText();

        if ($this->symbolTable->resolveInCurrentScope($name) !== null) {
            throw new Exception(
                "Error Semántico: Variable '$name' ya declarada en este scope."
            );
        }

        $this->symbolTable->defineVariable(
            $name,
            new VariableSymbol($name, $declaredType)
        );
    }

    return null;
}
public function visitVarShortDecl($ctx)
{
    $ids = $ctx->idList()->ID();
    $expressions = $ctx->expList()->expression();

    if (count($ids) !== count($expressions)) {
        throw new Exception(
            "Error Semántico: Cantidad de variables y expresiones no coincide en ':='."
        );
    }

    $atLeastOneNew = false;

    foreach ($ids as $i => $idToken) {

        $name = $idToken->getText();
        $exprType = $this->visit($expressions[$i]);

        $existing = $this->symbolTable->resolveInCurrentScope($name);

        if ($existing === null) {

            $this->symbolTable->defineVariable(
                $name,
                new VariableSymbol($name, $exprType)
            );

            $atLeastOneNew = true;

        } else {

            if ($existing->getType() !== $exprType) {
                throw new Exception(
                    "Error Semántico: Tipo incompatible en ':=' para '$name'."
                );
            }
        }
    }

    if (!$atLeastOneNew) {
        throw new Exception(
            "Error Semántico: En ':=' al menos una variable debe ser nueva."
        );
    }

    return null;
}
public function visitAssignment($ctx)
{
    $name = $ctx->ID()->getText();
    $variable = $this->symbolTable->resolveVariable($name);

    if ($variable === null) {
        throw new Exception("Error Semántico: Variable '$name' no declarada.");
    }

    $exprType = $this->visit($ctx->expression());

    if ($variable->getType() !== $exprType) {
        throw new Exception(
            "Error Semántico: No se puede asignar '$exprType' a variable de tipo '{$variable->getType()}'."
        );
    }

    return null;
}

}