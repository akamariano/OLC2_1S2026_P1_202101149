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

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;

$data = json_decode(file_get_contents("php://input"), true);
$code = $data["code"] ?? "";

try {

    // rear input
    $input = InputStream::fromString($code);

    // Crear lexer
    $lexer = new GolampiLexer($input);

    // Crear token stream
    $tokens = new CommonTokenStream($lexer);

    //  Crear parser
    $parser = new GolampiParser($tokens);

    // Obtener árbol
    $tree = $parser->program();

    // Verificar errores sintácticos
    if ($parser->getNumberOfSyntaxErrors() > 0) {
        throw new Exception("Errores sintácticos detectados.");
    }

    //  Ejecutar análisis semántico
    $visitor = new SemanticVisitor();
    $visitor->visit($tree);

    //  Respuesta exitosa
    echo json_encode([
        "success" => true,
        "output" => $visitor->getOutput(),
        "symbols" => $visitor->getSymbolTable()
    ]);

} catch (Throwable $e) {

    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
