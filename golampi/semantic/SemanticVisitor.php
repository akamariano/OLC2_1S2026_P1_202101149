<?php

require_once __DIR__ . '/SymbolTable.php';
require_once __DIR__ . '/FunctionSymbol.php';
require_once __DIR__ . '/VariableSymbol.php';

class SemanticVisitor extends GolampiBaseVisitor
{
    private $symbolTable;
    private $loopDepth = 0;
    private $switchDepth = 0;
    private $currentFunction = null;
    private $hasReturn = false;


    public function __construct()
    {
        $this->symbolTable = new SymbolTable();
    }

    public function getSymbolTable()
    {
        return $this->symbolTable;
    }

    // ---------------- PROGRAM ----------------
    public function visitProgram($ctx)
    {
        foreach ($ctx->functionDecl() as $func) {
            $this->visit($func);
        }
        return null;
    }

    // ---------------- FUNCTIONS ----------------
 public function visitFunctionDecl($ctx)
{
    $name = $ctx->ID()->getText();
    $line = $ctx->getStart()->getLine();
    $paramsArray = [];

    if ($ctx->paramList()) {
        foreach ($ctx->paramList()->param() as $param) {
            $paramName = $param->ID()->getText();
            $paramType = $param->type()->getText();
            $paramsArray[] = [
                "name" => $paramName,
                "type" => $paramType
            ];
        }
    }

    $returnTypes = [];

    if ($ctx->returnType()) {
        $types = $ctx->returnType()->type();

        if (is_array($types)) {
            foreach ($types as $typeCtx) {
                $returnTypes[] = $typeCtx->getText();
            }
        } else {
            $returnTypes[] = $types->getText();
        }
    }

    // Registrar firma
    $this->symbolTable->defineFunction(
        $name,
        new FunctionSymbol($name, $paramsArray, $returnTypes, $line)
    );

    //Guardar estado de función actual
    $this->currentFunction = [
        "name" => $name,
        "returnTypes" => $returnTypes
    ];

    $this->hasReturn = false;

    // Entrar a scope de función
    $this->symbolTable->enterScope();

    foreach ($paramsArray as $param) {
        $this->symbolTable->defineVariable(
            $param["name"],
            new VariableSymbol($param["name"], $param["type"])
        );
    }

    $this->visit($ctx->block());

    $this->symbolTable->exitScope();

    // VALIDAR RETURN OBLIGATORIO
    if (count($returnTypes) > 0 && !$this->hasReturn) {
        throw new Exception("Función '$name' debe retornar un valor tipo {$returnTypes[0]}.");
    }

    // Limpiar estado
    $this->currentFunction = null;

    return null;
}


public function visitFunctionCall($ctx)
{
    $name = $ctx->qualifiedName()->getText();

    // fmt.Println no devuelve nada
    if ($name === "fmt.Println") {
        return null;
    }

    $function = $this->symbolTable->getFunction($name);


    if (!$function) {
        throw new Exception("Función '$name' no declarada.");
    }

    $expectedParams = $function->getParams();
    $args = $ctx->argList() ? $ctx->argList()->expression() : [];

    if (count($expectedParams) !== count($args)) {
        throw new Exception("Cantidad incorrecta de parámetros en '$name'.");
    }

    foreach ($expectedParams as $i => $param) {
        $argType = $this->visit($args[$i]);
        if ($argType !== $param["type"]) {
            throw new Exception("Tipo incorrecto en parámetro '$name'.");
        }
    }

    $returnTypes = $function->getReturnTypes();

    if (count($returnTypes) > 0) {
        return $returnTypes[0];
    }

    return null;
}


    // ---------------- BLOCK ----------------
    public function visitBlock($ctx)
    {
        $this->symbolTable->enterScope();
        foreach ($ctx->statement() as $stmt) {
            $this->visit($stmt);
        }
        $this->symbolTable->exitScope();
        return null;
    }

    // ---------------- VARIABLE DECLARATION ----------------
    public function visitVarDecl($ctx)
    {
        $type = $ctx->type()->getText();
        foreach ($ctx->idList()->ID() as $idToken) {
            $name = $idToken->getText();
            if ($this->symbolTable->resolveInCurrentScope($name)) {
                throw new Exception("Variable '$name' ya declarada.");
            }
            $this->symbolTable->defineVariable(
                $name,
                new VariableSymbol($name, $type)
            );
        }
        return null;
    }

    public function visitVarShortDecl($ctx)
    {
        $ids = $ctx->idList()->ID();
        $exprs = $ctx->expList()->expression();

        foreach ($ids as $i => $idToken) {
            $name = $idToken->getText();
            $exprType = $this->visit($exprs[$i]);

            if ($this->symbolTable->resolveInCurrentScope($name)) {
                throw new Exception("Variable '$name' ya declarada.");
            }
            $this->symbolTable->defineVariable(
                $name,
                new VariableSymbol($name, $exprType)
            );
        }
        return null;
    }

    // ---------------- ASSIGNMENT ----------------
    public function visitAssignment($ctx)
    {
        $name = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($name);

        if (!$symbol) {
            throw new Exception("Variable '$name' no declarada.");
        }

        $exprType = $this->visit($ctx->expression());

        if ($symbol->getType() !== $exprType) {
            throw new Exception("Tipos incompatibles en asignación.");
        }

        return null;
    }

    // ---------------- IF ----------------
  public function visitIfStmt($ctx)
{
    $condType = $this->visit($ctx->expression());

    if ($condType !== "bool") {
        throw new Exception("Condición de if debe ser bool.");
    }

    // IF
    $this->visit($ctx->block(0));

    // ELSE
    if ($ctx->ELSE()) {

        if ($ctx->ifStmt()) {
            // else if
            $this->visit($ctx->ifStmt());
        } 
        else {
            // else final
            $this->visit($ctx->block(1));
        }
    }

    return null;
}



    // ---------------- FOR ----------------
    public function visitForStmt($ctx)
    {
        $this->loopDepth++;
        $this->symbolTable->enterScope();

        if ($ctx->forInit()) {
            $this->visit($ctx->forInit());
            $condType = $this->visit($ctx->expression());
            if ($condType !== "bool") {
                throw new Exception("Condición de for debe ser bool.");
            }
            if ($ctx->forPost()) {
                $this->visit($ctx->forPost());
            }
        } else if ($ctx->expression()) {
            $condType = $this->visit($ctx->expression());
            if ($condType !== "bool") {
                throw new Exception("Condición de for debe ser bool.");
            }
        }

        $this->visit($ctx->block());
        $this->symbolTable->exitScope();
        $this->loopDepth--;

        return null;
    }

    public function visitForInit($ctx)
    {
        $id = $ctx->ID()->getText();
        $exprType = $this->visit($ctx->expression());

        if ($ctx->getChild(1)->getText() === ':=') {
            if ($this->symbolTable->resolveInCurrentScope($id)) {
                throw new Exception("Variable '$id' ya declarada en este ámbito.");
            }
            $this->symbolTable->defineVariable(
                $id,
                new VariableSymbol($id, $exprType)
            );
        } else {
            $symbol = $this->symbolTable->resolveVariable($id);
            if (!$symbol) {
                throw new Exception("Variable '$id' no declarada.");
            }
            if ($symbol->getType() !== $exprType) {
                throw new Exception("Tipos incompatibles en asignación.");
            }
        }

        return null;
    }

    public function visitForPost($ctx)
    {
        $id = $ctx->ID()->getText();
        $symbol = $this->symbolTable->resolveVariable($id);

        if (!$symbol) {
            throw new Exception("Variable '$id' no declarada.");
        }

        if ($ctx->expression()) {
            $exprType = $this->visit($ctx->expression());
            if ($symbol->getType() !== $exprType) {
                throw new Exception("Tipos incompatibles en forPost.");
            }
        }

        return null;
    }

    // ---------------- SWITCH ----------------
    public function visitSwitchStmt($ctx)
    {
        $this->switchDepth++;
        $switchType = $this->visit($ctx->expression());

        foreach ($ctx->caseClause() as $case) {
            foreach ($case->expList()->expression() as $expr) {
                $caseType = $this->visit($expr);
                if ($caseType !== $switchType) {
                    throw new Exception("Tipo incompatible en case.");
                }
            }
            $this->symbolTable->enterScope();
            foreach ($case->statement() as $stmt) {
                $this->visit($stmt);
            }
            $this->symbolTable->exitScope();
        }

        if ($ctx->defaultClause()) {
            $this->symbolTable->enterScope();
            foreach ($ctx->defaultClause()->statement() as $stmt) {
                $this->visit($stmt);
            }
            $this->symbolTable->exitScope();
        }

        $this->switchDepth--;
        return null;
    }

    // ---------------- BREAK / CONTINUE ----------------
    public function visitBreakStmt($ctx)
    {
        if ($this->loopDepth === 0 && $this->switchDepth === 0) {
            throw new Exception("break fuera de loop o switch.");
        }
        return null;
    }

    public function visitContinueStmt($ctx)
    {
        if ($this->loopDepth === 0) {
            throw new Exception("continue fuera de loop.");
        }
        return null;
    }

    // ---------------- RETURN ----------------
   public function visitReturnStmt($ctx)
{
    if ($this->currentFunction === null) {
        throw new Exception("return fuera de función.");
    }

    $expectedTypes = $this->currentFunction["returnTypes"];

    // Función sin retorno declarado
    if (count($expectedTypes) === 0) {

        if ($ctx->expression()) {
            throw new Exception("Función '{$this->currentFunction["name"]}' no debe retornar valor.");
        }

        $this->hasReturn = true;
        return null;
    }

    // Función con retorno obligatorio
    if (!$ctx->expression()) {
        throw new Exception("Función '{$this->currentFunction["name"]}' debe retornar tipo {$expectedTypes[0]}.");
    }

    $exprType = $this->visit($ctx->expression());

    if ($exprType !== $expectedTypes[0]) {
        throw new Exception("Tipo incorrecto en return. Se esperaba {$expectedTypes[0]} y se obtuvo $exprType.");
    }

    $this->hasReturn = true;

    return null;
}



    // ---------------- EXPRESSIONS ----------------

public function visitExpression($ctx)
{
    return $this->visit($ctx->logicalOr());
}

// OR  ||
public function visitLogicalOr($ctx)
{
    $type = $this->visit($ctx->logicalAnd(0));

    for ($i = 1; $i < count($ctx->logicalAnd()); $i++) {
        $right = $this->visit($ctx->logicalAnd($i));

        if ($type !== "bool" || $right !== "bool") {
            throw new Exception("Operador || requiere operandos bool.");
        }

        $type = "bool";
    }

    return $type;
}

// AND  &&
public function visitLogicalAnd($ctx)
{
    $type = $this->visit($ctx->equality(0));

    for ($i = 1; $i < count($ctx->equality()); $i++) {
        $right = $this->visit($ctx->equality($i));

        if ($type !== "bool" || $right !== "bool") {
            throw new Exception("Operador && requiere operandos bool.");
        }

        $type = "bool";
    }

    return $type;
}

// ==  !=
public function visitEquality($ctx)
{
    $type = $this->visit($ctx->comparison(0));

    for ($i = 1; $i < count($ctx->comparison()); $i++) {
        $right = $this->visit($ctx->comparison($i));

        if ($type !== $right) {
            throw new Exception("Comparación inválida entre tipos diferentes.");
        }

        $type = "bool";
    }

    return $type;
}

// >  >=  <  <=
public function visitComparison($ctx)
{
    $type = $this->visit($ctx->term(0));

    for ($i = 1; $i < count($ctx->term()); $i++) {
        $right = $this->visit($ctx->term($i));

        if ($type !== $right || !in_array($type, ["int", "float"])) {
            throw new Exception("Operador relacional requiere int o float.");
        }

        $type = "bool";
    }

    return $type;
}

// +  -
public function visitTerm($ctx)
{
    $type = $this->visit($ctx->factor(0));

    for ($i = 1; $i < count($ctx->factor()); $i++) {
        $right = $this->visit($ctx->factor($i));

        if ($type !== $right || !in_array($type, ["int", "float"])) {
            throw new Exception("Operador + o - requiere int o float.");
        }

        $type = $type;
    }

    return $type;
}

// *  /  %
public function visitFactor($ctx)
{
    $type = $this->visit($ctx->unary(0));

    for ($i = 1; $i < count($ctx->unary()); $i++) {
        $right = $this->visit($ctx->unary($i));

        if ($type !== $right || !in_array($type, ["int", "float"])) {
            throw new Exception("Operador *, / o % requiere int o float.");
        }

        $type = $type;
    }

    return $type;
}

// !  -
public function visitUnary($ctx)
{
    if ($ctx->primary()) {
        return $this->visit($ctx->primary());
    }

    $type = $this->visit($ctx->unary());

    if ($ctx->getChild(0)->getText() === "!") {
        if ($type !== "bool") {
            throw new Exception("Operador ! requiere bool.");
        }
        return "bool";
    }

    if ($ctx->getChild(0)->getText() === "-") {
        if (!in_array($type, ["int", "float"])) {
            throw new Exception("Operador - requiere int o float.");
        }
        return $type;
    }

    return $type;
}

// Literales, ID y llamadas
public function visitPrimary($ctx)
{
    if ($ctx->getToken(GolampiParser::INT, 0)) return "int";
    if ($ctx->getToken(GolampiParser::FLOAT, 0)) return "float";
    if ($ctx->getToken(GolampiParser::STRING, 0)) return "string";
    if ($ctx->getToken(GolampiParser::TRUE, 0) || 
        $ctx->getToken(GolampiParser::FALSE, 0)) return "bool";
    if ($ctx->getToken(GolampiParser::NIL, 0)) return "nil";

    if ($ctx->ID()) {
        $symbol = $this->symbolTable->resolveVariable($ctx->ID()->getText());
        if (!$symbol) {
            throw new Exception("Variable '{$ctx->ID()->getText()}' no declarada.");
        }
        return $symbol->getType();
    }

    if ($ctx->functionCall()) {
        return $this->visit($ctx->functionCall());
    }

    if ($ctx->expression()) {
        return $this->visit($ctx->expression());
    }

    return null;
}


}