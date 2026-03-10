<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../vendor/autoload.php';

// incluir clases del analizador léxico y sintáctico (ANTLR)
require_once __DIR__ . '/../grammar/GolampiLexer.php';
require_once __DIR__ . '/../grammar/GolampiParser.php';
require_once __DIR__ . '/../grammar/GolampiVisitor.php';
require_once __DIR__ . '/../grammar/GolampiBaseVisitor.php';
require_once __DIR__ . '/../grammar/GolampiListener.php';
require_once __DIR__ . '/../grammar/GolampiBaseListener.php';

// incluir clases para el análisis semántico
require_once __DIR__ . '/../semantic/SymbolTable.php';
require_once __DIR__ . '/../semantic/VariableSymbol.php';
require_once __DIR__ . '/../semantic/FunctionSymbol.php';
require_once __DIR__ . '/../semantic/SemanticVisitor.php';

// incluir la clase ejecutora (intérprete)
require_once __DIR__ . '/../interpreter/Executor.php';

// incluir generador de reportes
require_once __DIR__ . '/../semantic/Reportgenerator.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;

/**
 * clase que recopila errores del analizador léxico y sintáctico
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
        // determinar si el error es léxico o sintáctico
        $isLexer = ($offendingSymbol === null || get_class($recognizer) === 'GolampiLexer');
        $type    = $isLexer ? 'Léxico' : 'Sintáctico';

        $token = ($offendingSymbol !== null)
            ? $offendingSymbol->getText()
            : '?';

        // crear un mensaje de error que sea fácil de entender
        if ($isLexer) {
            $description = "Símbolo no reconocido: '$token'";
        } else {
            // simplificar el mensaje técnico de ANTLR
            $description = $this->humanize($msg, $token);
        }

        $this->errors[] = [
            'type'        => $type,
            'description' => $description,
            'line'        => $line,
            'column'      => $charPositionInLine + 1,
        ];
    }

    private function humanize(string $msg, string $token): string
    {
        if (str_contains($msg, 'missing')) {
            preg_match("/missing (.+?) at/", $msg, $m);
            $what = $m[1] ?? '?';
            return "Construcción incompleta: falta $what cerca de '$token'";
        }
        if (str_contains($msg, 'mismatched input')) {
            preg_match("/expecting (.+)/", $msg, $m);
            $expected = $m[1] ?? '?';
            return "Token inesperado '$token', se esperaba: $expected";
        }
        if (str_contains($msg, 'extraneous input')) {
            return "Token sobrante '$token'";
        }
        if (str_contains($msg, 'no viable alternative')) {
            return "Construcción no reconocida cerca de '$token'";
        }
        return $msg;
    }

    public function hasErrors(): bool  { return count($this->errors) > 0; }
    public function getErrors(): array { return $this->errors; }
}

// punto de entrada del analizador - recibe el código a analizar
$data = json_decode(file_get_contents("php://input"), true);
$code = $data["code"] ?? "";

$allErrors     = [];
$output        = '';
$symbolsReport = [];
$imgAst        = '';
$imgErrors     = '';
$imgSymbols    = '';

try {
    // validar que el código sea correcto usando el analizador léxico y sintáctico
    $input  = InputStream::fromString($code);
    $lexer  = new GolampiLexer($input);
    $tokens = new CommonTokenStream($lexer);
    $parser = new GolampiParser($tokens);

    $lexer->removeErrorListeners();
    $parser->removeErrorListeners();

    $errorListener = new GolampiErrorListener();
    $lexer->addErrorListener($errorListener);
    $parser->addErrorListener($errorListener);

    $tree = $parser->program();

    // acumular errores pero intentar continuar con el análisis
    if ($errorListener->hasErrors()) {
        $allErrors = array_merge($allErrors, $errorListener->getErrors());
    }

    // generar imágenes del AST incluso si hay algunos errores
    try {
        $imgAst = ReportGenerator::astJpg($tree, $parser);
    } catch (\Throwable $e) {
        $imgAst = '';
    }

    // realizar el análisis semántico (siempre)
    $semantic = new SemanticVisitor();
    try {
        $semantic->visit($tree);
    } catch (\Throwable $e) {
        // Error inesperado en el visitor — reportar como semántico
        $allErrors[] = [
            'type'        => 'Semántico',
            'description' => $e->getMessage(),
            'line'        => 0,
            'column'      => 0,
        ];
    }
    $allErrors     = array_merge($allErrors, $semantic->getErrors());
    $symbolsReport = $semantic->getSymbolTable()->toArray();

    // ejecutar el programa solo si no hay errores
    if (empty($allErrors)) {
        $executor = new \Interpreter\Executor();
        $executor->visit($tree);
        $output = $executor->getOutput();
    }

} catch (\Throwable $e) {
    $allErrors[] = [
        'type'        => 'Interno',
        'description' => $e->getMessage(),
        'line'        => 0,
        'column'      => 0,
    ];
}

// generar imágenes de las tablas de errores y símbolos
try {
    $imgErrors  = ReportGenerator::errorsJpg($allErrors);
} catch (\Throwable $e) { $imgErrors = ''; }

try {
    $imgSymbols = ReportGenerator::symbolsJpg($symbolsReport);
} catch (\Throwable $e) { $imgSymbols = ''; }

// enviar la respuesta en formato JSON
echo json_encode([
    'success'     => empty($allErrors),
    'output'      => $output,
    'errors'      => $allErrors,
    'symbols'     => $symbolsReport,
    'img_ast'     => $imgAst,
    'img_errors'  => $imgErrors,
    'img_symbols' => $imgSymbols,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
