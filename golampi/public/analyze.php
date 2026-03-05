<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../vendor/autoload.php';

/* -------- GRAMMAR -------- */
require_once __DIR__ . '/../grammar/GolampiLexer.php';
require_once __DIR__ . '/../grammar/GolampiParser.php';
require_once __DIR__ . '/../grammar/GolampiVisitor.php';
require_once __DIR__ . '/../grammar/GolampiBaseVisitor.php';
require_once __DIR__ . '/../grammar/GolampiListener.php';
require_once __DIR__ . '/../grammar/GolampiBaseListener.php';

/* -------- SEMANTIC -------- */
require_once __DIR__ . '/../semantic/SymbolTable.php';
require_once __DIR__ . '/../semantic/VariableSymbol.php';
require_once __DIR__ . '/../semantic/FunctionSymbol.php';
require_once __DIR__ . '/../semantic/SemanticVisitor.php';

/* -------- INTERPRETER -------- */
require_once __DIR__ . '/../interpreter/Executor.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;

/**
 * ErrorListener que captura línea, columna y token exacto de cada error.
 */
class GolampiErrorListener extends BaseErrorListener
{
    private array $errors = [];

    public function syntaxError(
        $recognizer,
        $offendingSymbol,
        int $line,
        int $charPositionInLine,
        string $msg,
        $e
    ): void {
        $token = ($offendingSymbol !== null) ? "'{$offendingSymbol->getText()}'" : "desconocido";
        $this->errors[] = "Línea $line, col $charPositionInLine: $msg  →  token: $token";
    }

    public function hasErrors(): bool  { return count($this->errors) > 0; }
    public function getErrors(): array { return $this->errors; }
}

/* ======================================================
   MAIN
   ====================================================== */
$data = json_decode(file_get_contents("php://input"), true);
$code = $data["code"] ?? "";

try {
    /* ---- LÉXICO + SINTÁCTICO ---- */
    $input  = InputStream::fromString($code);
    $lexer  = new GolampiLexer($input);
    $tokens = new CommonTokenStream($lexer);
    $parser = new GolampiParser($tokens);

    // Reemplazar listeners por defecto con el nuestro
    $lexer->removeErrorListeners();
    $parser->removeErrorListeners();

    $errorListener = new GolampiErrorListener();
    $lexer->addErrorListener($errorListener);
    $parser->addErrorListener($errorListener);

    $tree = $parser->program();

    if ($errorListener->hasErrors()) {
        $detalles = implode("\n", $errorListener->getErrors());
        throw new Exception("Errores sintácticos detectados:\n" . $detalles);
    }

    /* ---- SEMÁNTICO ---- */
    $semantic = new SemanticVisitor();
    $semantic->visit($tree);

    /* ---- EJECUCIÓN ---- */
    $executor = new \Interpreter\Executor();
    $executor->visit($tree);
    $runtimeOutput = $executor->getOutput();

    /* ---- RESPUESTA ---- */
    echo json_encode([
        "success" => true,
        "output"  => $runtimeOutput === "" ? "Sin salida" : $runtimeOutput,
        "symbols" => $semantic->getSymbolTable()->toArray()
    ], JSON_PRETTY_PRINT);

} catch (Throwable $e) {
    echo json_encode([
        "success" => false,
        "error"   => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}