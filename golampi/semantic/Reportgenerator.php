<?php

use Antlr\Antlr4\Runtime\Tree\TerminalNode;
use Antlr\Antlr4\Runtime\Tree\ErrorNode;

// Genera imágenes JPG en base64 con Graphviz para el AST, tabla de errores y tabla de símbolos.
class ReportGenerator
{
    private const DOT_BIN = '/usr/bin/dot';

    // recorre el árbol ANTLR, genera un grafo dirigido y devuelve base64 JPG
    public static function astJpg($tree, $parser): string
    {
        $gen = new self();
        $dot = $gen->buildAstDot($tree, $parser->getRuleNames());
        return self::dotToJpg($dot);
    }

    // tabla de errores como imagen JPG
    public static function errorsJpg(array $errors): string
    {
        $dot = self::buildTableDot(
            title:   'Reporte de Errores',
            headers: ['#', 'Tipo', 'Descripción', 'Línea', 'Col'],
            rows:    array_map(fn($e, $i) => [
                (string)($i + 1),
                $e['type'],
                self::wrap($e['description'], 55),
                (string)($e['line']   > 0 ? $e['line']   : '—'),
                (string)($e['column'] > 0 ? $e['column'] : '—'),
            ], $errors, array_keys($errors)),
            color:   '#dc2626',
            empty:   'Sin errores detectados ✓'
        );
        return self::dotToJpg($dot);
    }

    // tabla de símbolos como imagen JPG
    public static function symbolsJpg(array $symbols): string
    {
        $rows = [];

        // Funciones
        foreach (($symbols['functions'] ?? []) as $f) {
            $ret    = count($f['returnTypes']) > 0 ? implode(', ', $f['returnTypes']) : '—';
            $params = count($f['params']) > 0
                ? implode(', ', array_map(fn($p) => "{$p['name']}:{$p['type']}", $f['params']))
                : '—';
            $rows[] = [
                $f['name'],
                'función',
                'global',
                self::wrap("({$params}) → {$ret}", 40),
                (string)$f['line'],
                (string)$f['column'],
            ];
        }

        // Variables
        foreach (($symbols['variables'] ?? []) as $v) {
            $val = self::formatValue($v['value'] ?? null, $v['type'] ?? '');
            $rows[] = [
                $v['name'],
                self::shortType($v['type'] ?? ''),
                self::wrap($v['scope'] ?? 'global', 30),
                self::wrap($val, 25),
                (string)($v['line']   ?? '—'),
                (string)($v['column'] ?? '—'),
            ];
        }

        $dot = self::buildTableDot(
            title:   'Tabla de Símbolos',
            headers: ['Identificador', 'Tipo', 'Ámbito', 'Valor', 'Ln', 'Col'],
            rows:    $rows,
            color:   '#16a34a',
            empty:   'Sin símbolos declarados'
        );
        return self::dotToJpg($dot);
    }

    // construir el grafo del árbol sintáctico
    private int   $counter  = 0;
    private array $nodeDefs = [];
    private array $edges    = [];

    private const SKIP_SINGLE = [
        'expression','logicalOr','logicalAnd',
        'equality','comparison','term','factor','unary',
    ];

    private const NODE_COLORS = [
        'program'       => ['#0c2340','#7dd3fc','#1d4ed8'],
        'functionDecl'  => ['#052e16','#4ade80','#15803d'],
        'block'         => ['#1e1b4b','#c084fc','#6d28d9'],
        'varDecl'       => ['#1a2e1a','#86efac','#166534'],
        'varShortDecl'  => ['#1a2e1a','#86efac','#166534'],
        'constDecl'     => ['#1a2e1a','#fde68a','#92400e'],
        'ifStmt'        => ['#0c2340','#93c5fd','#1d4ed8'],
        'forStmt'       => ['#0c2340','#93c5fd','#1d4ed8'],
        'switchStmt'    => ['#0c2340','#93c5fd','#1d4ed8'],
        'returnStmt'    => ['#450a0a','#fca5a5','#991b1b'],
        'functionCall'  => ['#1c1917','#fcd34d','#b45309'],
        'assignment'    => ['#1c1917','#fdba74','#c2410c'],
        'arrayAssign'   => ['#1c1917','#fdba74','#c2410c'],
        'ptrAssign'     => ['#1c1917','#fdba74','#c2410c'],
        'arrayLiteral'  => ['#1e1b4b','#a5b4fc','#4338ca'],
        'arrayAccess'   => ['#1e1b4b','#a5b4fc','#4338ca'],
        'breakStmt'     => ['#450a0a','#fca5a5','#991b1b'],
        'continueStmt'  => ['#450a0a','#fca5a5','#991b1b'],
        'terminal'      => ['#1e293b','#e2e8f0','#475569'],
        'error'         => ['#7f1d1d','#f87171','#dc2626'],
        'default'       => ['#1e293b','#94a3b8','#334155'],
    ];

    private function buildAstDot($tree, array $ruleNames): string
    {
        $this->counter  = 0;
        $this->nodeDefs = [];
        $this->edges    = [];

        $this->walkTree($tree, null, $ruleNames);

        $lines   = [];
        $lines[] = 'digraph AST {';
        $lines[] = '    graph [bgcolor="#0f172a" fontname="Helvetica" rankdir=TB nodesep=0.4 ranksep=0.6 pad=0.4]';
        $lines[] = '    node  [fontname="Helvetica" fontsize=10 style="filled,rounded" shape=box margin="0.12,0.08" penwidth=1.2]';
        $lines[] = '    edge  [color="#334155" penwidth=1.0 arrowsize=0.6]';
        $lines[] = '';

        foreach ($this->nodeDefs as $def) {
            $lines[] = $def;
        }

        $lines[] = '';

        foreach ($this->edges as [$from, $to]) {
            $lines[] = "    n{$from} -> n{$to}";
        }

        $lines[] = '}';
        return implode("\n", $lines);
    }

    private function walkTree($node, ?int $parentId, array $ruleNames): int
    {
        $id = $this->counter++;

        if ($node instanceof TerminalNode) {
            $txt   = $this->esc($node->getText());
            $token = $node->getSymbol();
            $ln    = $token ? $token->getLine() : 0;
            $label = $ln > 0 ? "{$txt}\\nLn {$ln}" : $txt;
            $this->addNode($id, $label, 'terminal');

        } elseif ($node instanceof ErrorNode) {
            $this->addNode($id, 'ERROR\\n' . $this->esc($node->getText()), 'error');

        } else {
            // Regla
            $ruleName = $this->getRuleName($node, $ruleNames);

            // Colapsar paso único
            if (in_array($ruleName, self::SKIP_SINGLE) && $node->getChildCount() === 1) {
                return $this->walkTree($node->getChild(0), $parentId, $ruleNames);
            }

            $ln    = '';
            try { $s = $node->getStart(); if ($s) $ln = "\\nLn " . $s->getLine(); }
            catch (\Throwable $e) {}

            $this->addNode($id, $ruleName . $ln, $ruleName);

            for ($i = 0; $i < $node->getChildCount(); $i++) {
                $childId = $this->walkTree($node->getChild($i), $id, $ruleNames);
                $this->edges[] = [$id, $childId];
            }
        }

        return $id;
    }

    private function addNode(int $id, string $label, string $type): void
    {
        [$bg, $fg, $border] = self::NODE_COLORS[$type] ?? self::NODE_COLORS['default'];
        $this->nodeDefs[$id] =
            "    n{$id} [label=\"{$label}\" fillcolor=\"{$bg}\" fontcolor=\"{$fg}\" color=\"{$border}\"]";
    }

    private function getRuleName($node, array $ruleNames): string
    {
        try {
            $idx = $node->getRuleIndex();
            return $ruleNames[$idx] ?? 'rule_' . $idx;
        } catch (\Throwable $e) {
            $class = get_class($node);
            $parts = explode('\\', $class);
            return str_replace('Context', '', end($parts));
        }
    }

    // construir tablas HTML-like con record nodes para Graphviz
    private static function buildTableDot(
        string $title,
        array  $headers,
        array  $rows,
        string $color,
        string $empty
    ): string {
        $cols  = count($headers);
        $lines = [];
        $lines[] = 'digraph Table {';
        $lines[] = '    graph [bgcolor="#0f172a" fontname="Helvetica" pad=0.5 margin=0.3]';
        $lines[] = '    node  [fontname="Helvetica" fontsize=11 shape=none margin=0]';
        $lines[] = '    edge  [style=invis]';
        $lines[] = '';

        // Construir tabla HTML dentro de Graphviz (HTML-like labels)
        $html  = '<TABLE BORDER="0" CELLBORDER="1" CELLSPACING="0" CELLPADDING="6" BGCOLOR="#0f172a">';

        // Título
        $html .= "<TR><TD COLSPAN=\"{$cols}\" BGCOLOR=\"{$color}\" "
              .  "ALIGN=\"CENTER\"><FONT COLOR=\"white\" POINT-SIZE=\"13\"><B>"
              .  self::escHtml($title)
              .  "</B></FONT></TD></TR>";

        // Cabecera
        $html .= '<TR>';
        foreach ($headers as $h) {
            $html .= "<TD BGCOLOR=\"#1e3a5f\" ALIGN=\"CENTER\">"
                  .  "<FONT COLOR=\"#7dd3fc\" POINT-SIZE=\"10\"><B>"
                  .  self::escHtml($h)
                  .  "</B></FONT></TD>";
        }
        $html .= '</TR>';

        // Filas
        if (empty($rows)) {
            $html .= "<TR><TD COLSPAN=\"{$cols}\" ALIGN=\"CENTER\">"
                  .  "<FONT COLOR=\"#64748b\">{$empty}</FONT></TD></TR>";
        } else {
            foreach ($rows as $ri => $row) {
                $bg = ($ri % 2 === 0) ? '#1e293b' : '#162032';
                $html .= '<TR>';
                foreach ($row as $ci => $cell) {
                    $align = ($ci === 0 || $ci === 2 || $ci === 3) ? 'LEFT' : 'CENTER';
                    $html .= "<TD BGCOLOR=\"{$bg}\" ALIGN=\"{$align}\">"
                          .  "<FONT COLOR=\"#cbd5e1\" POINT-SIZE=\"10\">"
                          .  self::escHtml($cell)
                          .  "</FONT></TD>";
                }
                $html .= '</TR>';
            }
        }

        $html .= '</TABLE>';

        $lines[] = "    tbl [label=<{$html}>]";
        $lines[] = '}';
        return implode("\n", $lines);
    }

    // convertir DOT a imagen JPG usando Graphviz
    private static function dotToJpg(string $dot): string
    {
        $bin = self::DOT_BIN;
        if (!file_exists($bin)) {
            // Intentar con PATH
            $bin = 'dot';
        }

        $descriptors = [
            0 => ['pipe', 'r'],   // stdin
            1 => ['pipe', 'w'],   // stdout
            2 => ['pipe', 'w'],   // stderr
        ];

        $proc = proc_open(
            "{$bin} -Tjpg -Gdpi=150",
            $descriptors,
            $pipes
        );

        if (!is_resource($proc)) {
            return '';
        }

        fwrite($pipes[0], $dot);
        fclose($pipes[0]);

        $jpg    = stream_get_contents($pipes[1]);
        $errors = stream_get_contents($pipes[2]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($proc);

        if (empty($jpg)) return '';

        return base64_encode($jpg);
    }

    // funciones de utilidad para escapar texto y formatear
    private function esc(string $text): string
    {
        $text = str_replace(['\\', '"', "\n", "\r", '<', '>'], ['\\\\', '\\"', '\\n', '', '', ''], $text);
        return strlen($text) > 28 ? substr($text, 0, 25) . '...' : $text;
    }

    private static function escHtml(string $text): string
    {
        return htmlspecialchars($text, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }

    private static function wrap(string $text, int $max): string
    {
        if (strlen($text) <= $max) return $text;
        $words  = explode(' ', $text);
        $lines  = [];
        $line   = '';
        foreach ($words as $w) {
            if (strlen($line . ' ' . $w) > $max) {
                $lines[] = $line;
                $line    = $w;
            } else {
                $line = $line === '' ? $w : $line . ' ' . $w;
            }
        }
        if ($line !== '') $lines[] = $line;
        return implode("\n", $lines);
    }

    private static function shortType(string $type): string
    {
        if (str_starts_with($type, 'array[')) return 'arreglo';
        if (str_starts_with($type, 'ptr:'))   return 'ptr→' . substr($type, 4);
        return match($type) {
            'int'     => 'entero',
            'float'   => 'flotante',
            'string'  => 'cadena',
            'bool'    => 'booleano',
            'rune'    => 'rune',
            'unknown' => 'desconocido',
            default   => $type,
        };
    }

    private static function formatValue($value, string $type): string
    {
        if ($value === null) return '—';
        if (is_array($value)) return '{' . implode(', ', array_merge(...array_map(
            fn($v) => is_array($v) ? $v : [$v], $value
        ))) . '}';
        if (is_bool($value)) return $value ? 'true' : 'false';
        if (is_string($value) && $type === 'string') return "\"{$value}\"";
        return (string)$value;
    }
}