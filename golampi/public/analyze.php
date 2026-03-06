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

/* -------- REPORTS -------- */
require_once __DIR__ . '/../semantic/Reportgenerator.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;

/**
 * Acumula errores léxicos y sintácticos con línea, columna y token.
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
        // Determinar si es léxico o sintáctico
        $isLexer = ($offendingSymbol === null || get_class($recognizer) === 'GolampiLexer');
        $type    = $isLexer ? 'Léxico' : 'Sintáctico';

        $token = ($offendingSymbol !== null)
            ? $offendingSymbol->getText()
            : '?';

        // Descripción legible
        if ($isLexer) {
            $description = "Símbolo no reconocido: '$token'";
        } else {
            // Limpiar el mensaje técnico de ANTLR a algo legible
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

/* ======================================================
   MAIN
   ====================================================== */
$data = json_decode(file_get_contents("php://input"), true);
$code = $data["code"] ?? "";

$allErrors     = [];
$output        = '';
$symbolsReport = [];
$imgAst        = '';
$imgErrors     = '';
$imgSymbols    = '';

try {
    /* ---- LÉXICO + SINTÁCTICO ---- */
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

    // Acumular errores léxicos/sintácticos pero continuar si es posible
    if ($errorListener->hasErrors()) {
        $allErrors = array_merge($allErrors, $errorListener->getErrors());
    }

    /* ---- IMÁGENES DE REPORTE (siempre, incluso con errores parciales) ---- */
    try {
        $imgAst = ReportGenerator::astJpg($tree, $parser);
    } catch (\Throwable $e) {
        $imgAst = '';
    }

    /* ---- SEMÁNTICO (siempre corre, acumula errores) ---- */
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

    /* ---- EJECUCIÓN (solo si no hay errores) ---- */
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

/* ---- IMÁGENES DE TABLAS (después de tener datos completos) ---- */
try {
    $imgErrors  = ReportGenerator::errorsJpg($allErrors);
} catch (\Throwable $e) { $imgErrors = ''; }

try {
    $imgSymbols = ReportGenerator::symbolsJpg($symbolsReport);
} catch (\Throwable $e) { $imgSymbols = ''; }

/* ---- RESPUESTA ---- */
echo json_encode([
    'success'     => empty($allErrors),
    'output'      => $output,
    'errors'      => $allErrors,
    'symbols'     => $symbolsReport,
    'img_ast'     => $imgAst,
    'img_errors'  => $imgErrors,
    'img_symbols' => $imgSymbols,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);