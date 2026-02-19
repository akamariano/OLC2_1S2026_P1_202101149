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

	/* ================= PROGRAM ================= */
	public function visitProgram($ctx) {
		// Guardar todas las funciones
		foreach ($ctx->functionDecl() as $func) {
			$name = $func->ID()->getText();
			$this->functions[$name] = $func;
		}

		if (!isset($this->functions["main"])) {
			throw new Exception("No existe función main.");
		}

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


	public function visitFunctionCall($ctx) {
    $name = $ctx->qualifiedName()->getText();

    // fmt.Println
    if ($name === "fmt.Println") {
        $values = [];
        if ($ctx->argList()) {
            foreach ($ctx->argList()->expression() as $expr) {
                $values[] = $this->visit($expr);
            }
        }
        $this->output[] = implode(" ", $values);
        return null;
    }

    // Evaluar argumentos reales
    $args = [];
    if ($ctx->argList()) {
        foreach ($ctx->argList()->expression() as $expr) {
            $args[] = $this->visit($expr);
        }
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
	public function visitBlock($ctx) {
		$this->enterScope();
		foreach ($ctx->statement() as $stmt) {
			$this->visit($stmt);
		}
		$this->exitScope();
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
	public function visitExpression($ctx) {
		if ($ctx->INT()) return (int)$ctx->INT()->getText();
		if ($ctx->FLOAT()) return (float)$ctx->FLOAT()->getText();
		if ($ctx->STRING()) return trim($ctx->STRING()->getText(), '"');
		if ($ctx->TRUE()) return true;
		if ($ctx->FALSE()) return false;
		if ($ctx->ID()) {
			return $this->getVar($ctx->ID()->getText());
		}

		if (count($ctx->expression()) === 2) {
			$left = $this->visit($ctx->expression(0));
			$right = $this->visit($ctx->expression(1));
			$op = $ctx->op->getText();
			switch ($op) {
				case '+': return $left + $right;
				case '-': return $left - $right;
				case '*': return $left * $right;
				case '/': return $left / $right;
				case '==': return $left == $right;
				case '!=': return $left != $right;
				case '<': return $left < $right;
				case '>': return $left > $right;
				case '<=': return $left <= $right;
				case '>=': return $left >= $right;
			}
		}

		return $this->visitChildren($ctx);
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

}