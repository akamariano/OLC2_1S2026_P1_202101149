<?php

require_once __DIR__ . '/SymbolTable.php';
require_once __DIR__ . '/FunctionSymbol.php';
require_once __DIR__ . '/VariableSymbol.php';

class SemanticVisitor extends GolampiBaseVisitor
{
    private $symbolTable;
    private $loopDepth = 0;
    private $switchDepth = 0;

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

        // Tu constructor espera array
        $returnTypes = [];
        $this->symbolTable->defineFunction(
            $name,
            new FunctionSymbol($name, $paramsArray, $returnTypes, $line)
        );

        $this->symbolTable->enterScope();
        foreach ($paramsArray as $param) {
            $this->symbolTable->defineVariable(
                $param["name"],
                new VariableSymbol($param["name"], $param["type"])
            );
        }
        $this->visit($ctx->block());
        $this->symbolTable->exitScope();

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

    // Bloque IF
    $this->visit($ctx->block(0));

    // Bloque ELSE (si existe)
    if ($ctx->block(1)) {
        $this->visit($ctx->block(1));
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
        if ($ctx->expression()) {
            $this->visit($ctx->expression());
        }
        return null;
    }

    // ---------------- EXPRESSIONS ----------------
    public function visitExpression($ctx)
    {
        if ($ctx->INT()) {
            return "int";
        }

        if ($ctx->FLOAT()) {
            return "float";
        }

        if ($ctx->STRING()) {
            return "string";
        }

        if ($ctx->TRUE() || $ctx->FALSE()) {
            return "bool";
        }

        if ($ctx->ID()) {
            $symbol = $this->symbolTable->resolveVariable($ctx->ID()->getText());
            if (!$symbol) {
                throw new Exception("Variable no declarada.");
            }
            return $symbol->getType();
        }

        if (count($ctx->expression()) === 2) {
            $left = $this->visit($ctx->expression(0));
            $right = $this->visit($ctx->expression(1));
            $op = $ctx->op->getText();

            if ($op === "+" || $op === "-" || $op === "*" || $op === "/") {
                if ($left === $right && ($left === "int" || $left === "float")) {
                    return $left;
                }
                throw new Exception("Operación aritmética inválida.");
            }

            return "bool";
        }

        return $this->visitChildren($ctx);
    }
}