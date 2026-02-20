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
require_once __DIR__ . '/../semantic/SemanticVisitor.php';

/* -------- INTERPRETER -------- */
require_once __DIR__ . '/../interpreter/Executor.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;

$data = json_decode(file_get_contents("php://input"), true);
$code = $data["code"] ?? "";

try {

    /* =============================
       PARSER
    ============================== */

    $input = InputStream::fromString($code);
    $lexer = new GolampiLexer($input);
    $tokens = new CommonTokenStream($lexer);
    $parser = new GolampiParser($tokens);

    $tree = $parser->program();

    if ($parser->getNumberOfSyntaxErrors() > 0) {
        throw new Exception("Errores sintácticos detectados.");
    }

    /* =============================
       SEMANTIC
    ============================== */

    $semantic = new SemanticVisitor();
    $semantic->visit($tree);

    /* =============================
       EXECUTION
    ============================== */

    $executor = new \Interpreter\Executor();
    $executor->visit($tree);
    $runtimeOutput = $executor->getOutput();


    /* =============================
       RESPONSE
    ============================== */
error_log("ENTRÓ A visitLogicalAnd desde analyze.php");



    echo json_encode([
    "success" => true,
    "output" => $runtimeOutput === "" ? "Sin salida" : $runtimeOutput,
    "symbols" => $semantic->getSymbolTable()->toArray()
], JSON_PRETTY_PRINT);


} catch (Throwable $e) {

    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}
