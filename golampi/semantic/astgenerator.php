<?php

use Antlr\Antlr4\Runtime\Tree\TerminalNode;
use Antlr\Antlr4\Runtime\Tree\ErrorNode;
use Antlr\Antlr4\Runtime\ParserRuleContext;

/**
 * Genera un grafo DOT (Graphviz) a partir del árbol sintáctico de ANTLR4.
 *
 * Uso:
 *   $gen = new AstGenerator($parser);
 *   $dot = $gen->generate($tree);
 *
 * El string DOT resultante se puede renderizar con Graphviz o en
 * herramientas online como https://dreampuf.github.io/GraphvizOnline/
 */
class AstGenerator
{
    private array  $nodes    = [];  // id => label
    private array  $edges    = [];  // [from, to]
    private int    $counter  = 0;
    private array  $ruleNames;

    // Reglas que NO se expanden como nodos intermedios (demasiado verbosas)
    private const SKIP_SINGLE_CHILD = [
        'expression', 'logicalOr', 'logicalAnd',
        'equality', 'comparison', 'term', 'factor', 'unary',
    ];

    // Colores por tipo de nodo
    private const COLORS = [
        'program'        => ['#1e3a5f', '#7dd3fc'],
        'functionDecl'   => ['#1e4d2b', '#4ade80'],
        'block'          => ['#2d1b69', '#c084fc'],
        'statement'      => ['#1e293b', '#94a3b8'],
        'varDecl'        => ['#1a2e1a', '#86efac'],
        'varShortDecl'   => ['#1a2e1a', '#86efac'],
        'constDecl'      => ['#1a2e1a', '#fde68a'],
        'ifStmt'         => ['#1e3a5f', '#93c5fd'],
        'forStmt'        => ['#1e3a5f', '#93c5fd'],
        'switchStmt'     => ['#1e3a5f', '#93c5fd'],
        'returnStmt'     => ['#4a1515', '#fca5a5'],
        'functionCall'   => ['#2d1f0a', '#fcd34d'],
        'assignment'     => ['#2d1f0a', '#fdba74'],
        'arrayAssign'    => ['#2d1f0a', '#fdba74'],
        'ptrAssign'      => ['#2d1f0a', '#fdba74'],
        'arrayLiteral'   => ['#1a2032', '#a5b4fc'],
        'arrayAccess'    => ['#1a2032', '#a5b4fc'],
        'arrayType'      => ['#1a2032', '#a5b4fc'],
        'breakStmt'      => ['#4a1515', '#fca5a5'],
        'continueStmt'   => ['#4a1515', '#fca5a5'],
        'terminal'       => ['#0f172a', '#e2e8f0'],
        'error'          => ['#7f1d1d', '#f87171'],
        'default'        => ['#1e293b', '#cbd5e1'],
    ];

    public function __construct(private $parser)
    {
        $this->ruleNames = $parser->getRuleNames();
    }

    public function generate($tree): string
    {
        $this->nodes   = [];
        $this->edges   = [];
        $this->counter = 0;

        $this->walk($tree, null);

        return $this->buildDot();
    }

    // recorrer el árbol sintáctico y construir nodos
    private function walk($node, ?int $parentId): int
    {
        $nodeId = $this->counter++;

        if ($node instanceof TerminalNode) {
            $text  = $this->escLabel($node->getText());
            $token = $node->getSymbol();
            $line  = $token ? $token->getLine() : 0;
            $label = $line > 0 ? "{$text}\\nLn {$line}" : $text;
            $this->nodes[$nodeId] = ['label' => $label, 'type' => 'terminal'];

        } elseif ($node instanceof ErrorNode) {
            $text = $this->escLabel($node->getText());
            $this->nodes[$nodeId] = ['label' => "ERROR\\n{$text}", 'type' => 'error'];

        } else {
            // Nodo de regla
            $ruleName = $this->getRuleName($node);

            // Colapsar nodos intermedios con un solo hijo (simplifica el árbol)
            if (in_array($ruleName, self::SKIP_SINGLE_CHILD) && $node->getChildCount() === 1) {
                return $this->walk($node->getChild(0), $parentId);
            }

            $line  = '';
            try {
                $start = $node->getStart();
                if ($start) $line = "\\nLn " . $start->getLine();
            } catch (\Throwable $e) {}

            $this->nodes[$nodeId] = [
                'label' => $ruleName . $line,
                'type'  => $ruleName,
            ];

            for ($i = 0; $i < $node->getChildCount(); $i++) {
                $childId = $this->walk($node->getChild($i), $nodeId);
                $this->edges[] = [$nodeId, $childId];
            }
        }

        if ($parentId !== null) {
            // Edge ya se añade desde el padre, no desde el hijo
        }

        return $nodeId;
    }

    private function getRuleName($node): string
    {
        try {
            $idx = $node->getRuleIndex();
            return $this->ruleNames[$idx] ?? 'rule_' . $idx;
        } catch (\Throwable $e) {
            // Fallback: obtener nombre de la clase
            $class = get_class($node);
            $parts = explode('\\', $class);
            $short = end($parts);
            return str_replace('Context', '', $short);
        }
    }

    // generar el código DOT para Graphviz
    private function buildDot(): string
    {
        $lines = [];
        $lines[] = 'digraph AST {';
        $lines[] = '    graph [';
        $lines[] = '        bgcolor="#0f172a"';
        $lines[] = '        fontname="Fira Code, monospace"';
        $lines[] = '        splines=ortho';
        $lines[] = '        rankdir=TB';
        $lines[] = '        nodesep=0.5';
        $lines[] = '        ranksep=0.7';
        $lines[] = '    ]';
        $lines[] = '    node [';
        $lines[] = '        shape=box';
        $lines[] = '        style="filled,rounded"';
        $lines[] = '        fontname="Fira Code, monospace"';
        $lines[] = '        fontsize=11';
        $lines[] = '        margin="0.15,0.1"';
        $lines[] = '        penwidth=1.2';
        $lines[] = '    ]';
        $lines[] = '    edge [';
        $lines[] = '        color="#334155"';
        $lines[] = '        penwidth=1.2';
        $lines[] = '        arrowsize=0.7';
        $lines[] = '    ]';
        $lines[] = '';

        // Nodos
        foreach ($this->nodes as $id => $info) {
            [$bg, $fg] = $this->getColors($info['type']);
            $label     = $info['label'];
            $lines[]   = "    n{$id} [label=\"{$label}\" fillcolor=\"{$bg}\" fontcolor=\"{$fg}\" color=\"{$fg}33\"]";
        }

        $lines[] = '';

        // Aristas
        foreach ($this->edges as [$from, $to]) {
            $lines[] = "    n{$from} -> n{$to}";
        }

        $lines[] = '}';

        return implode("\n", $lines);
    }

    private function getColors(string $type): array
    {
        return self::COLORS[$type] ?? self::COLORS['default'];
    }

    private function escLabel(string $text): string
    {
        // Escapar caracteres especiales de DOT
        $text = str_replace(['\\', '"', "\n", "\r"], ['\\\\', '\\"', '\\n', ''], $text);
        // Truncar tokens muy largos
        if (strlen($text) > 30) {
            $text = substr($text, 0, 27) . '...';
        }
        return $text;
    }
}