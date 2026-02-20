<?php

namespace Interpreter;

require_once __DIR__ . '/../grammar/GolampiBaseVisitor.php';

use Exception;

class BreakException extends Exception {}

class ContinueException extends Exception {}

class ReturnException extends Exception {
	public $value;

	public function __construct($value) {
		$this->value = $value;
	}
}

class Executor extends \GolampiBaseVisitor {
	private $scopes = [];
	private $functions = [];
	private $output = [];

	public function __construct() {
		$this->enterScope();
	}
	public function getOutput(): string
{
    return implode("\n", $this->output);
}
	/* ================= PROGRAM ================= */
	public function visitProgram($ctx) {

    // Guardar funciones
    foreach ($ctx->functionDecl() as $func) {
        $name = $func->ID()->getText();
        $this->functions[$name] = $func;
    }

    if (!isset($this->functions["main"])) {
        throw new Exception("No existe función main.");
    }

    // Ejecutar main
    $this->callFunction("main", []);

    return implode("\n", $this->output);
}



	/* ================= FUNCTION CALL ================= */
	private function callFunction($name, $args) {

    if (!isset($this->functions[$name])) {
        throw new Exception("Función '$name' no definida.");
    }

    $func = $this->functions[$name];

    $this->enterScope();

    // CREAR VARIABLES PARA PARÁMETROS
    if ($func->paramList()) {

        $params = $func->paramList()->param();

        foreach ($params as $index => $paramCtx) {

            $paramName = $paramCtx->ID()->getText();
            $paramValue = $args[$index] ?? null;

            $this->setVar($paramName, $paramValue);
        }
    }

    try {
        $this->visit($func->block());
    } catch (ReturnException $e) {
        $this->exitScope();
        return $e->value;
    }

    $this->exitScope();
    return null;
}


	public function visitFunctionCall($ctx)
{
    $name = $ctx->qualifiedName()->getText();

    // fmt.Println
    if ($name === "fmt.Println") {

    $values = [];

    if ($ctx->argList()) {
        foreach ($ctx->argList()->expression() as $expr) {
            $value = $this->visit($expr);

            if (is_bool($value)) {
                $value = $value ? "true" : "false";
            }

            $values[] = $value;
        }
    }

    $this->output[] = implode(" ", $values);

    return null;
}


    // funciones normales
    if ($ctx->argList()) {
        $args = array_map(fn($e) => $this->visit($e), $ctx->argList()->expression());
    } else {
        $args = [];
    }

    return $this->callFunction($name, $args);
}



	/* ================= SCOPES ================= */
	private function enterScope() {
		array_push($this->scopes, []);
	}

	private function exitScope() {
		array_pop($this->scopes);
	}

	private function setVar($name, $value) {
		$this->scopes[count($this->scopes)-1][$name] = $value;
	}

	private function getVar($name) {
		for ($i = count($this->scopes)-1; $i >= 0; $i--) {
			if (isset($this->scopes[$i][$name])) {
				return $this->scopes[$i][$name];
			}
		}
		throw new Exception("Variable '$name' no definida.");
	}

	/* ================= BLOCK ================= */
	public function visitBlock($ctx)
{
    foreach ($ctx->statement() as $stmt) {
        $this->visit($stmt);
    }

    return null; // ← CRÍTICO
}


	/* ================= VARIABLES ================= */
	public function visitVarShortDecl($ctx) {
		$ids = $ctx->idList()->ID();
		$exprs = $ctx->expList()->expression();
		foreach ($ids as $i => $idToken) {
			$name = $idToken->getText();
			$value = $this->visit($exprs[$i]);
			$this->setVar($name, $value);
		}
	}

	public function visitAssignment($ctx) {
		$name = $ctx->ID()->getText();
		$value = $this->visit($ctx->expression());
		for ($i = count($this->scopes)-1; $i >= 0; $i--) {
			if (isset($this->scopes[$i][$name])) {
				$this->scopes[$i][$name] = $value;
				return;
			}
		}
		throw new Exception("Variable '$name' no definida.");
	}

	/* ================= FOR ================= */
	public function visitForStmt($ctx) {
		$this->enterScope();
		if ($ctx->forInit()) {
			$this->visit($ctx->forInit());
		}
		while (true) {
			if ($ctx->expression()) {
				if (!$this->visit($ctx->expression())) {
					break;
				}
			}
			try {
				$this->visit($ctx->block());
			} catch (BreakException $e) {
				break;
			} catch (ContinueException $e) {}
			if ($ctx->forPost()) {
				$this->visit($ctx->forPost());
			}
		}
		$this->exitScope();
	}

	public function visitForInit($ctx) {
		$name = $ctx->ID()->getText();
		$value = $this->visit($ctx->expression());
		$this->setVar($name, $value);
	}

	public function visitForPost($ctx) {
		$name = $ctx->ID()->getText();
		if ($ctx->getChildCount() === 2) {
			if ($ctx->getChild(1)->getText() === '++') {
				$this->setVar($name, $this->getVar($name) + 1);
			} else {
				$this->setVar($name, $this->getVar($name) - 1);
			}
		} else {
			$value = $this->visit($ctx->expression());
			$this->setVar($name, $value);
		}
	}

	/* ================= SWITCH ================= */
	public function visitSwitchStmt($ctx) {
		$switchValue = $this->visit($ctx->expression());
		foreach ($ctx->caseClause() as $caseClause) {
			foreach ($caseClause->expList()->expression() as $expr) {
				if ($switchValue == $this->visit($expr)) {
					try {
						foreach ($caseClause->statement() as $stmt) {
							$this->visit($stmt);
						}
					} catch (BreakException $e) {}
					return null;
				}
			}
		}
		if ($ctx->defaultClause()) {
			try {
				foreach ($ctx->defaultClause()->statement() as $stmt) {
					$this->visit($stmt);
				}
			} catch (BreakException $e) {}
		}
	}

	/* ================= BREAK / CONTINUE ================= */
	public function visitBreakStmt($ctx) {
		throw new BreakException();
	}

	public function visitContinueStmt($ctx) {
		throw new ContinueException();
	}

	/* ================= EXPRESSIONS ================= */
public function visitExpression($ctx)
{
    return $this->visit($ctx->logicalOr());
}
public function visitLogicalOr($ctx)
{
    $operands = $ctx->logicalAnd();
    $count = count($operands);

    $result = $this->visit($operands[0]);

    // Si NO hay operador ||
    if ($count === 1) {
        return $result;
    }

    if (!is_bool($result)) {
        throw new Exception("Operador || requiere operandos bool");
    }

    for ($i = 1; $i < $count; $i++) {

        if ($result === true) {
            return true;
        }

        $right = $this->visit($operands[$i]);

        if (!is_bool($right)) {
            throw new Exception("Operador || requiere operandos bool");
        }

        $result = $right;
    }

    return $result;
}


public function visitLogicalAnd($ctx)
{
    $operands = $ctx->equality();
    $count = count($operands);

    $result = $this->visit($operands[0]);

    // Si NO hay operador &&
    if ($count === 1) {
        return $result;
    }

    // Si hay && entonces validar bool
    if (!is_bool($result)) {
        throw new Exception("Operador && requiere operandos bool");
    }

    for ($i = 1; $i < $count; $i++) {

        if ($result === false) {
            return false; // cortocircuito
        }

        $right = $this->visit($operands[$i]);

        if (!is_bool($right)) {
            throw new Exception("Operador && requiere operandos bool");
        }

        $result = $right;
    }

    return $result;
}


public function visitEquality($ctx)
{
    $value = $this->visit($ctx->comparison(0));

    for ($i = 1; $i < count($ctx->comparison()); $i++) {
        $right = $this->visit($ctx->comparison($i));

        $op = $ctx->getChild(($i * 2) - 1)->getText();

        if ($op === '==') {
            $value = $value == $right;
        } else {
            $value = $value != $right;
        }
    }

    return $value;
}
public function visitComparison($ctx)
{
    $value = $this->visit($ctx->term(0));

    for ($i = 1; $i < count($ctx->term()); $i++) {

        $right = $this->visit($ctx->term($i));
        $op = $ctx->getChild(($i * 2) - 1)->getText();

        // Promoción int → float
        if (is_int($value) && is_float($right)) {
            $value = (float)$value;
        }
        if (is_float($value) && is_int($right)) {
            $right = (float)$right;
        }

        switch ($op) {
            case '>':  $value = $value > $right; break;
            case '>=': $value = $value >= $right; break;
            case '<':  $value = $value < $right; break;
            case '<=': $value = $value <= $right; break;
        }
    }

    return $value;
}

public function visitTerm($ctx)
{
    $value = $this->visit($ctx->factor(0));

    for ($i = 1; $i < count($ctx->factor()); $i++) {
        $right = $this->visit($ctx->factor($i));
        $op = $ctx->getChild(($i * 2) - 1)->getText();

        if ($op === '+') {

            // STRING + STRING
            if (is_string($value) && is_string($right)) {
                $value = $value . $right;
            }
            // NUMERIC + NUMERIC (int + float automático)
            elseif (is_numeric($value) && is_numeric($right)) {
                $value = $value + $right;
            }
            else {
                throw new Exception("Operación '+' inválida.");
            }

        } else { // '-'

            if (is_numeric($value) && is_numeric($right)) {
                $value = $value - $right;
            } else {
                throw new Exception("Operación '-' inválida.");
            }
        }
    }

    return $value;
}
public function visitFactor($ctx)
{
    $value = $this->visit($ctx->unary(0));

    for ($i = 1; $i < count($ctx->unary()); $i++) {
        $right = $this->visit($ctx->unary($i));
        $op = $ctx->getChild(($i * 2) - 1)->getText();

        if (!is_numeric($value) || !is_numeric($right)) {
            throw new Exception("Operación aritmética inválida.");
        }

        switch ($op) {
            case '*': $value = $value * $right; break;
            case '/': $value = $value / $right; break;
            case '%':
						if (!is_int($value) || !is_int($right)) {
							throw new Exception("Operador '%' requiere enteros.");
						}
						$value = $value % $right;
						break;
							}
    }

    return $value;
}

public function visitUnary($ctx)
{
    if ($ctx->primary()) {
        return $this->visit($ctx->primary());
    }

    $value = $this->visit($ctx->unary());

    $op = $ctx->getChild(0)->getText();

    if ($op === '!') {
    if (!is_bool($value)) {
        throw new Exception("Operador '!' requiere bool.");
    }
    return !$value;
}

if ($op === '-') {
    if (!is_numeric($value)) {
        throw new Exception("Operador '-' requiere número.");
    }
    return -$value;
}


    return $value;
}
public function visitPrimary($ctx)
{
    if ($ctx->getToken(\GolampiParser::INT, 0))
        return (int)$ctx->getText();

    if ($ctx->getToken(\GolampiParser::FLOAT, 0))
        return (float)$ctx->getText();

    if ($ctx->getToken(\GolampiParser::STRING, 0))
        return trim($ctx->getText(), '"');

    if ($ctx->getToken(\GolampiParser::TRUE, 0))
        return true;

    if ($ctx->getToken(\GolampiParser::FALSE, 0))
        return false;

    if ($ctx->ID())
        return $this->getVar($ctx->ID()->getText());

    if ($ctx->functionCall())
        return $this->visit($ctx->functionCall());

    if ($ctx->expression())
        return $this->visit($ctx->expression());

    return null;
}


    public function visitVarDecl($ctx)
{
    $ids = $ctx->idList()->ID();

    foreach ($ids as $i => $idToken) {
        $name = $idToken->getText();

        // Si tiene valor asignado
        if ($ctx->expList()) {
            $value = $this->visit($ctx->expList()->expression($i));
        } else {
            // Valor por defecto según tipo
            $type = $ctx->type()->getText();
            switch ($type) {
                case "int": $value = 0; break;
                case "float": $value = 0.0; break;
                case "string": $value = ""; break;
                case "bool": $value = false; break;
                default: $value = null;
            }
        }

        $this->setVar($name, $value);
    }
}
/* ================= IF ================= */
public function visitIfStmt($ctx)
{
    $condition = $this->visit($ctx->expression());

    if ($condition) {
        // Ejecutar bloque del IF
        return $this->visit($ctx->block(0));
    }

    // Si hay ELSE
    if ($ctx->ELSE()) {

        // else if
        if ($ctx->ifStmt()) {
            return $this->visit($ctx->ifStmt());
        }

        // else final
        if (count($ctx->block()) > 1) {
            return $this->visit($ctx->block(1));
        }
    }

    return null;
}
/* ================= RETURN ================= */
public function visitReturnStmt($ctx)
{
    $value = null;

    if ($ctx->expression()) {
        $value = $this->visit($ctx->expression());
    }

    throw new ReturnException($value);
}

/* ================= STATEMENT ================= */
public function visitStatement($ctx)
{
    // Si es una expresión sola (como flag && esValido(10))
    if ($ctx->expression()) {
        $this->visit($ctx->expression());
        return null; //no retornar el valor
    }

    return $this->visitChildren($ctx);
}

}