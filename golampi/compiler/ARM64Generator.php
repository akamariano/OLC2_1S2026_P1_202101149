<?php

namespace Compiler;

require_once __DIR__ . '/../grammar/GolampiBaseVisitor.php';

// Genera código ensamblador ARM64 (AArch64) desde el árbol sintáctico de Golampi.
// Frame: stp x29,x30 baja sp, mov x29,sp fija el fp. Variables en [x29+16], [x29+24]...
// Expresiones dejan resultado en w0 (int32/bool) o x0 (string). Binops usan push/pop a sp.
class ARM64Generator extends \GolampiBaseVisitor
{
    // buffers de salida: instrucciones y datos
    private array $textLines = [];
    private array $dataLines = [];

    // contadores para generar etiquetas únicas
    private int $labelCount = 0;
    private int $strCount   = 0;

    // estado de la función que se está generando
    private array  $varOffsets   = [];   // nombre de variable => offset desde x29
    private int    $nextOffset   = 16;   // siguiente slot libre en el frame (empieza en [x29+16])
    private string $funcName     = '';

    // pilas de etiquetas destino para break y continue
    private array $breakStack    = [];
    private array $continueStack = [];

    // tabla de funciones declaradas para hoisting
    private array $funcDecls = [];

    // constantes globales (declaradas fuera de funciones): name => ['type'=>..., 'intVal'=>..., 'strVal'=>...]
    private array $globalConsts = [];

    // pila de scopes con tipos de variables para inferir formatos en Println
    private array $scopeStack = [[]];

    // info de arreglos declarados: name => ['dims','elemType','elemSize','totalElems']
    private array $arrayInfo = [];

    // flag para emitir los labels estáticos de now() solo una vez por programa
    private bool $nowStaticAdded = false;

    // contador de profundidad float: >0 significa que la expresión actual es float32
    private int $floatDepth = 0;

    // ================================================================
    //  SALIDA PÚBLICA
    // ================================================================

    public function getAssembly(): string
    {
        $lines = [];
        $lines[] = '// Código ensamblador ARM64 generado por Golampi Compiler';
        $lines[] = '// Arquitectura: AArch64 — GNU Assembler (GAS)';
        $lines[] = '';
        $lines[] = '.section .data';
        foreach ($this->dataLines as $l) {
            $lines[] = $l;
        }
        $lines[] = '';
        $lines[] = '.section .text';
        $lines[] = '.global main';
        foreach ($this->textLines as $l) {
            $lines[] = $l;
        }
        return implode("\n", $lines);
    }

    // ================================================================
    //  HELPERS DE EMISIÓN
    // ================================================================

    // emite una instrucción con indentación
    private function emit(string $line): void
    {
        $this->textLines[] = '    ' . $line;
    }

    // emite una etiqueta sin indentación
    private function emitLabel(string $label): void
    {
        $this->textLines[] = $label . ':';
    }

    // nueva etiqueta única
    private function newLabel(string $prefix = '.L'): string
    {
        return $prefix . ($this->labelCount++);
    }

    // crea un string literal en .data y retorna su etiqueta
    private function newStringLit(string $content): string
    {
        $label = '.Lstr' . ($this->strCount++);
        $this->dataLines[] = $label . ':';
        $this->dataLines[] = '    .string "' . $this->escapeForGas($content) . '"';
        return $label;
    }

    // convierte un string de Golampi al formato que acepta GAS (.string "...")
    private function escapeForGas(string $s): string
    {
        // primero expandir las secuencias de escape del lenguaje
        $s = str_replace('\\n',  "\n",  $s);
        $s = str_replace('\\t',  "\t",  $s);
        $s = str_replace('\\\\', "\\",  $s);
        $s = str_replace('\\"',  '"',   $s);
        // luego re-escapar los caracteres especiales para GAS
        $s = str_replace('\\', '\\\\', $s);
        $s = str_replace('"',  '\\"',  $s);
        $s = str_replace("\n", '\\n',  $s);
        $s = str_replace("\t", '\\t',  $s);
        return $s;
    }

    // ================================================================
    //  SCOPE DE TIPOS (para fmt.Println)
    // ================================================================

    private function pushScope(): void { $this->scopeStack[] = []; }
    private function popScope(): void  { array_pop($this->scopeStack); }

    private function enterFloat(): void { $this->floatDepth++; }
    private function exitFloat(): void  { if ($this->floatDepth > 0) $this->floatDepth--; }
    private function inFloat(): bool    { return $this->floatDepth > 0; }

    private function setVarType(string $name, string $type): void
    {
        $this->scopeStack[count($this->scopeStack) - 1][$name] = $type;
    }

    private function getVarType(string $name): string
    {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            if (isset($this->scopeStack[$i][$name])) return $this->scopeStack[$i][$name];
        }
        // constante global
        if (isset($this->globalConsts[$name])) return $this->globalConsts[$name]['type'];
        return 'int32';
    }

    // ================================================================
    //  GESTIÓN DE VARIABLES
    // ================================================================

    // asigna un slot en el frame y devuelve el offset desde x29
    private function allocVar(string $name, string $type = 'int32'): int
    {
        $offset = $this->nextOffset;
        $this->varOffsets[$name] = $offset;
        $this->setVarType($name, $type);
        $this->nextOffset += 8;
        return $offset;
    }

    private function getVarOffset(string $name): ?int
    {
        return $this->varOffsets[$name] ?? null;
    }

    // reserva espacio para un arreglo en el frame y guarda su info
    private function allocArray(string $name, array $dims, string $elemType): int
    {
        $eSize      = $this->elemSize($elemType);
        $totalElems = max(1, (int)array_product($dims));
        $totalBytes = $totalElems * $eSize;
        $aligned    = (int)(ceil($totalBytes / 8.0) * 8);
        if ($aligned < 8) $aligned = 8;

        $offset = $this->nextOffset;
        $this->varOffsets[$name] = $offset;
        $this->nextOffset += $aligned;
        $this->arrayInfo[$name] = [
            'dims'       => $dims,
            'elemType'   => $elemType,
            'elemSize'   => $eSize,
            'totalElems' => $totalElems,
        ];
        $this->setVarType($name, 'array');
        return $offset;
    }

    // retorna el tamaño en bytes de un elemento según tipo
    private function elemSize(string $type): int
    {
        return match($type) {
            'string' => 8,
            default  => 4,   // int32, bool, rune, float32
        };
    }

    // parsea las dimensiones y tipo base de un arrayType context
    private function parseArrayDims($arrayTypeCtx): array
    {
        $dims     = [];
        $elemType = 'int32';
        $cur      = $arrayTypeCtx;
        while ($cur !== null) {
            $dims[] = (int)$cur->INT()->getText();
            if ($cur->arrayType()) {
                $cur = $cur->arrayType();
            } elseif ($cur->type()) {
                $elemType = $cur->type()->getText();
                break;
            } else {
                break;
            }
        }
        return [$dims, $elemType];
    }

    // extrae dims y tipo base de un arrayLiteral context
    private function parseLiteralInfo($literalCtx): array
    {
        if ($literalCtx->arrayType()) {
            $outerDim = (int)$literalCtx->INT()->getText();
            [$innerDims, $elemType] = $this->parseArrayDims($literalCtx->arrayType());
            $dims = array_merge([$outerDim], $innerDims);
        } elseif ($literalCtx->INT()) {
            $dims     = [(int)$literalCtx->INT()->getText()];
            $elemType = $literalCtx->type() ? $literalCtx->type()->getText() : 'int32';
        } else {
            // slice literal — inferir tamaño por cantidad de elementos
            $elemType = $literalCtx->type() ? $literalCtx->type()->getText() : 'int32';
            $n        = $literalCtx->arrayElements()
                ? count($literalCtx->arrayElements()->expression()) : 0;
            $dims = [$n];
        }
        return [$dims, $elemType];
    }

    // emite stores para inicializar un arreglo con los valores del literal
    private function initArrayFromLiteral(int $baseOff, array $dims, string $elemType, $literalCtx): void
    {
        $eSize = $this->elemSize($elemType);

        if ($literalCtx->arrayRowElements()) {
            $this->initFromRowElements($baseOff, $dims, $elemType, $eSize, $literalCtx->arrayRowElements(), 0);
        } elseif ($literalCtx->arrayElements()) {
            // 1D: {1, 2, 3}
            foreach ($literalCtx->arrayElements()->expression() as $i => $elem) {
                $byteOff = $baseOff + $i * $eSize;
                if ($elemType === 'float32') $this->enterFloat();
                $this->genExpr($elem);
                if ($elemType === 'float32') $this->exitFloat();
                if ($eSize === 8) {
                    $this->emit("str  x0, [x29, #{$byteOff}]");
                } elseif ($elemType === 'float32') {
                    $this->emit("fmov s0, w0");
                    $this->emit("str  s0, [x29, #{$byteOff}]");
                } else {
                    $this->emit("str  w0, [x29, #{$byteOff}]");
                }
            }
        }
    }

    private function initFromRowElements(int $baseOff, array $dims, string $elemType, int $eSize, $rowElemsCtx, int $depth): void
    {
        // stride of one row at this depth = product(dims[depth+1..]) * eSize
        $rowStride = $eSize;
        for ($d = $depth + 1; $d < count($dims); $d++) {
            $rowStride *= $dims[$d];
        }

        foreach ($rowElemsCtx->arrayRowItem() as $r => $rowItem) {
            $rowBase = $baseOff + $r * $rowStride;

            if ($rowItem->arrayElements()) {
                // leaf row: {e0, e1, ...}
                foreach ($rowItem->arrayElements()->expression() as $c => $elem) {
                    $byteOff = $rowBase + $c * $eSize;
                    if ($elemType === 'float32') $this->enterFloat();
                    $this->genExpr($elem);
                    if ($elemType === 'float32') $this->exitFloat();
                    if ($eSize === 8) {
                        $this->emit("str  x0, [x29, #{$byteOff}]");
                    } elseif ($elemType === 'float32') {
                        $this->emit("fmov s0, w0");
                        $this->emit("str  s0, [x29, #{$byteOff}]");
                    } else {
                        $this->emit("str  w0, [x29, #{$byteOff}]");
                    }
                }
            } elseif ($rowItem->arrayRowElements()) {
                // nested rows: {{...}, {...}} — recurse
                $this->initFromRowElements($rowBase, $dims, $elemType, $eSize, $rowItem->arrayRowElements(), $depth + 1);
            }
        }
    }

    // navega hasta el primary de una expresión simple (un solo camino)
    private function getPrimary($exprCtx)
    {
        try {
            $lo = $exprCtx->logicalOr();
            if (count($lo->logicalAnd()) !== 1) return null;
            $la = $lo->logicalAnd()[0];
            if (count($la->equality()) !== 1) return null;
            $eq = $la->equality()[0];
            if (count($eq->comparison()) !== 1) return null;
            $cp = $eq->comparison()[0];
            if (count($cp->term()) !== 1) return null;
            $tm = $cp->term()[0];
            if (count($tm->factor()) !== 1) return null;
            $fc = $tm->factor()[0];
            if (count($fc->unary()) !== 1) return null;
            $un = $fc->unary()[0];
            return $un->primary() ?? null;
        } catch (\Throwable $e) {
            return null;
        }
    }

    // ================================================================
    //  PROGRAM
    // ================================================================

    public function visitProgram($ctx)
    {
        // hoisting: registrar todas las funciones antes de generar código
        foreach ($ctx->functionDecl() as $func) {
            $this->funcDecls[$func->ID()->getText()] = $func;
        }

        // recolectar constantes globales (const X type = val fuera de funciones)
        foreach ($ctx->constDecl() as $cd) {
            $name = $cd->ID()->getText();
            $type = $cd->type()->getText();
            $expr = $cd->expression();
            $val  = $expr->getText();
            $intVal = 0;
            $strLbl = null;
            if ($type === 'string') {
                $inner  = substr($val, 1, strlen($val) - 2);
                $strLbl = $this->newStringLit($inner);
            } elseif ($type === 'float32') {
                $fval   = (float)$val;
                $lbl    = '.Lgc_' . $name;
                $this->dataLines[] = $lbl . ':';
                $this->dataLines[] = '    .float ' . $fval;
                $strLbl = $lbl;  // reuse field for float label
            } else {
                $intVal = (int)$val;
            }
            $this->globalConsts[$name] = ['type' => $type, 'intVal' => $intVal, 'strLbl' => $strLbl];
        }

        // generar código para cada función (main incluida)
        foreach ($ctx->functionDecl() as $func) {
            $this->visitFunctionDeclNode($func);
        }

        return $this->getAssembly();
    }

    // ================================================================
    //  FUNCTION DECLARATION
    // ================================================================

    public function visitFunctionDecl($ctx)
    {
        $this->visitFunctionDeclNode($ctx);
    }

    // método interno para evitar ambigüedad con dispatch del visitor
    private function visitFunctionDeclNode($ctx): void
    {
        $name = $ctx->ID()->getText();
        $this->funcName   = $name;
        $this->varOffsets = [];
        $this->nextOffset = 16;  // [x29+0]=fp, [x29+8]=lr, [x29+16]= primera var
        $this->arrayInfo  = [];
        $this->pushScope();

        // prólogo: reservar frame con sub+stp para soportar tamaños arbitrarios
        // se emite un placeholder y se parchea al final cuando nextOffset es conocido
        $this->emitLabel($name);
        $subIdx = count($this->textLines);
        $this->emit("sub  sp, sp, #16");   // placeholder: se parchea al final
        $this->emit("stp  x29, x30, [sp]");
        $this->emit("mov  x29, sp");

        // guardar cada parámetro de entrada en su slot del frame
        if ($ctx->paramList()) {
            $regIdx = 0;
            foreach ($ctx->paramList()->param() as $param) {
                $pName = $param->ID()->getText();
                // determinar tipo del parámetro
                $pType = 'int32';
                if ($param->type())      $pType = $param->type()->getText();
                elseif ($param->arrayType()) $pType = 'array';
                elseif ($param->sliceType()) $pType = 'slice';

                // parámetro puntero: comprobar segundo hijo (STAR entre ID y tipo)
                $child1 = $param->getChildCount() > 1 ? $param->getChild(1) : null;
                if ($child1 && $child1->getText() === '*') $pType = 'ptr:' . $pType;

                // si es arreglo (por valor o por puntero): registrar dims para acceso correcto
                if (($pType === 'ptr:array' || $pType === 'array') && $param->arrayType()) {
                    [$dims, $elemType] = $this->parseArrayDims($param->arrayType());
                    $offset = $this->allocVar($pName, 'ptr:array');  // tratar internamente como ptr
                    $this->arrayInfo[$pName] = [
                        'dims'       => $dims,
                        'elemType'   => $elemType,
                        'elemSize'   => $this->elemSize($elemType),
                        'totalElems' => (int)array_product($dims),
                    ];
                } else {
                    $offset = $this->allocVar($pName, $pType);
                }

                // guardar registro del parámetro en el frame
                if (in_array($pType, ['string', 'ptr:int32', 'ptr:float32']) || str_starts_with($pType, 'ptr:') || str_starts_with($pType, 'array')) {
                    $this->emit("str  x{$regIdx}, [x29, #{$offset}]");
                } else {
                    $this->emit("str  w{$regIdx}, [x29, #{$offset}]");
                }
                $regIdx++;
            }
        }

        // generar el cuerpo de la función
        $this->visitBlockNode($ctx->block());

        // epílogo: restaurar sp/fp/lr y retornar
        $epilogue = '.L' . $name . '_ret';
        $this->emitLabel($epilogue);
        if ($name === 'main') $this->emit("mov  w0, #0");   // exit code 0
        $this->emit("mov  sp, x29");
        $this->emit("ldp  x29, x30, [sp]");
        $addIdx = count($this->textLines);
        $this->emit("add  sp, sp, #16");   // placeholder: se parchea al final
        $this->emit("ret");
        $this->textLines[] = '';   // línea en blanco entre funciones

        // calcular tamaño real del frame y parchear los placeholders
        $fs = ($this->nextOffset + 15) & ~15;  // alinear a 16 bytes
        if ($fs < 16) $fs = 16;
        $this->textLines[$subIdx] = "    sub  sp, sp, #{$fs}";
        $this->textLines[$addIdx] = "    add  sp, sp, #{$fs}";

        $this->popScope();
    }

    // ================================================================
    //  BLOCK
    // ================================================================

    public function visitBlock($ctx) { $this->visitBlockNode($ctx); }

    private function visitBlockNode($ctx): void
    {
        $this->pushScope();
        foreach ($ctx->statement() as $stmt) {
            $this->dispatchStatement($stmt);
        }
        $this->popScope();
    }

    // ================================================================
    //  STATEMENT DISPATCH
    // ================================================================

    // despacha cada tipo de sentencia al método generador correspondiente
    private function dispatchStatement($ctx): void
    {
        if ($ctx->varDecl())      { $this->genVarDecl($ctx->varDecl());           return; }
        if ($ctx->varShortDecl()) { $this->genVarShortDecl($ctx->varShortDecl()); return; }
        if ($ctx->constDecl())    { $this->genConstDecl($ctx->constDecl());        return; }
        if ($ctx->ptrAssign())    { $this->genPtrAssign($ctx->ptrAssign());         return; }
        if ($ctx->assignment())   { $this->genAssignment($ctx->assignment());       return; }
        if ($ctx->arrayAssign())  { $this->genArrayAssign($ctx->arrayAssign());     return; }
        if ($ctx->ifStmt())       { $this->genIfStmt($ctx->ifStmt());               return; }
        if ($ctx->forStmt())      { $this->genForStmt($ctx->forStmt());             return; }
        if ($ctx->switchStmt())   { $this->genSwitchStmt($ctx->switchStmt());       return; }
        if ($ctx->breakStmt())    { $this->genBreak();                               return; }
        if ($ctx->continueStmt()) { $this->genContinue();                            return; }
        if ($ctx->incDecStmt())   { $this->genIncDec($ctx->incDecStmt());            return; }
        if ($ctx->returnStmt())   { $this->genReturn($ctx->returnStmt());            return; }
        if ($ctx->functionCall()) { $this->genFunctionCall($ctx->functionCall());    return; }
        if ($ctx->block())        { $this->visitBlockNode($ctx->block());            return; }
        if ($ctx->expression())   { $this->genExpr($ctx->expression());              return; }
    }

    // ================================================================
    //  VAR DECLARATION
    // ================================================================

    private function genVarDecl($ctx): void
    {
        // VAR ID type ('=' expression)?  — caso más común
        if ($ctx->ID() && $ctx->type() && !$ctx->idList()) {
            $name = $ctx->ID()->getText();
            $type = $ctx->type()->getText();
            $off  = $this->allocVar($name, $type);

            if ($ctx->expression()) {
                if ($type === 'float32') $this->enterFloat();
                $this->genExpr($ctx->expression());
                if ($type === 'float32') $this->exitFloat();
                $this->storeVar($off, $type);
            } else {
                // valor por defecto
                $this->emitDefault($off, $type);
            }
            return;
        }

        // VAR idList type '=' expList  OR  VAR idList '=' expList (no type — multi-return)
        if ($ctx->idList() && $ctx->expList()) {
            $ids  = $ctx->idList()->ID();
            $exps = $ctx->expList()->expression();
            $type = $ctx->type() ? $ctx->type()->getText() : 'int32';

            // caso multi-retorno: var a, b, c = func()
            if (count($ids) > 1 && count($exps) === 1) {
                $pr = $this->getPrimary($exps[0]);
                if ($pr && $pr->functionCall()) {
                    $this->genFunctionCall($pr->functionCall());
                    for ($i = 0; $i < count($ids); $i++) {
                        $off = $this->allocVar($ids[$i]->getText(), 'int32');
                        $this->emit("str  w{$i}, [x29, #{$off}]");
                    }
                    return;
                }
            }

            // evaluar expresiones y pushear al stack temporal
            foreach ($exps as $exp) {
                $this->genExpr($exp);
                $this->emit("str  x0, [sp, #-16]!");
            }

            // pop en orden inverso para asignar cada variable correctamente
            for ($i = count($ids) - 1; $i >= 0; $i--) {
                $off = $this->allocVar($ids[$i]->getText(), $type);
                $this->emit("ldr  x1, [sp], #16");
                $this->emit("str  w1, [x29, #{$off}]");
            }
            return;
        }

        // VAR ID arrayType ('=' arrayLiteral | '=' expression)?
        if ($ctx->ID() && $ctx->arrayType() && !$ctx->STAR()) {
            $name = $ctx->ID()->getText();
            [$dims, $elemType] = $this->parseArrayDims($ctx->arrayType());
            $off = $this->allocArray($name, $dims, $elemType);

            if ($ctx->arrayLiteral()) {
                $this->initArrayFromLiteral($off, $dims, $elemType, $ctx->arrayLiteral());
            } elseif ($ctx->expression()) {
                // arreglo asignado desde función que retorna arreglo (copia simplificada)
                $this->genExpr($ctx->expression());
                $this->emit("str  x0, [x29, #{$off}]");
            } else {
                // cero-inicializar todos los elementos
                $eSize = $this->elemSize($elemType);
                $total = (int)array_product($dims);
                for ($i = 0; $i < $total; $i++) {
                    $byteOff = $off + $i * $eSize;
                    $this->emit($eSize === 8
                        ? "str  xzr, [x29, #{$byteOff}]"
                        : "str  wzr, [x29, #{$byteOff}]");
                }
            }
            return;
        }

        // VAR ID STAR type — puntero a tipo simple
        if ($ctx->ID() && $ctx->STAR() && $ctx->type() && !$ctx->arrayType()) {
            $name = $ctx->ID()->getText();
            $type = 'ptr:' . $ctx->type()->getText();
            $off  = $this->allocVar($name, $type);
            $this->emit("str  xzr, [x29, #{$off}]");
            return;
        }

        // VAR ID STAR arrayType — puntero a arreglo
        if ($ctx->ID() && $ctx->STAR() && $ctx->arrayType()) {
            $name = $ctx->ID()->getText();
            $off  = $this->allocVar($name, 'ptr:array');
            $this->emit("str  xzr, [x29, #{$off}]");
            return;
        }
    }

    // escribe el valor por defecto de un tipo en el frame
    private function emitDefault(int $off, string $type): void
    {
        if ($type === 'string') {
            $lbl = $this->newStringLit('');
            $this->emit("adrp x0, {$lbl}");
            $this->emit("add  x0, x0, :lo12:{$lbl}");
            $this->emit("str  x0, [x29, #{$off}]");
        } elseif ($type === 'float32') {
            $this->emit("str  wzr, [x29, #{$off}]");
        } else {
            $this->emit("str  wzr, [x29, #{$off}]");
        }
    }

    // almacena w0/x0/s0 en el frame según el tipo
    private function storeVar(int $off, string $type): void
    {
        if ($type === 'string' || str_starts_with($type, 'ptr:')) {
            $this->emit("str  x0, [x29, #{$off}]");
        } elseif ($type === 'float32') {
            // w0 lleva los bits IEEE 754; mover a s0 y guardar como 4 bytes
            $this->emit("fmov s0, w0");
            $this->emit("str  s0, [x29, #{$off}]");
        } else {
            $this->emit("str  w0, [x29, #{$off}]");
        }
    }

    // ================================================================
    //  SHORT VAR DECLARATION: ids := exps
    // ================================================================

    private function genVarShortDecl($ctx): void
    {
        // ID ':=' arrayLiteral — declaración corta con literal de arreglo
        if ($ctx->arrayLiteral()) {
            $name = $ctx->ID()->getText();
            [$dims, $elemType] = $this->parseLiteralInfo($ctx->arrayLiteral());
            $off = $this->allocArray($name, $dims, $elemType);
            $this->initArrayFromLiteral($off, $dims, $elemType, $ctx->arrayLiteral());
            return;
        }

        $ids  = $ctx->idList()->ID();
        $exps = $ctx->expList()->expression();
        $n    = count($ids);

        // caso multi-retorno: a, b, c := func()
        if ($n > 1 && count($exps) === 1) {
            $pr = $this->getPrimary($exps[0]);
            if ($pr && $pr->functionCall()) {
                $this->genFunctionCall($pr->functionCall());
                // w0=first, x1=second, x2=third... (up to 8)
                for ($i = 0; $i < $n; $i++) {
                    $iname = $ids[$i]->getText();
                    $off = isset($this->varOffsets[$iname])
                        ? $this->varOffsets[$iname]
                        : $this->allocVar($iname, 'int32');
                    $this->emit("str  w{$i}, [x29, #{$off}]");
                }
                return;
            }
        }

        // 1. evaluar todas las expresiones y pushear al stack temporal
        for ($i = 0; $i < $n; $i++) {
            $type = $this->inferExprType($exps[$i]);
            if ($type === 'float32') $this->enterFloat();
            $this->genExpr($exps[$i]);
            if ($type === 'float32') $this->exitFloat();

            if ($type === 'string') {
                $this->emit("str  x0, [sp, #-16]!");
            } elseif ($type === 'float32') {
                // guardar bits IEEE 754 como 64 bits para consistencia del stack
                $this->emit("sxtw x0, w0");
                $this->emit("str  x0, [sp, #-16]!");
            } else {
                // sign-extend a 64 bits para consistencia en el stack
                $this->emit("sxtw x0, w0");
                $this->emit("str  x0, [sp, #-16]!");
            }
        }

        // 2. pop en orden inverso y asignar
        for ($i = $n - 1; $i >= 0; $i--) {
            $this->emit("ldr  x1, [sp], #16");
            $name = $ids[$i]->getText();
            $type = $this->inferExprType($exps[$i]);

            if (isset($this->varOffsets[$name])) {
                // variable ya existe — reasignar
                $off = $this->varOffsets[$name];
            } else {
                // nueva variable
                $off = $this->allocVar($name, $type);
            }

            if ($type === 'string') {
                $this->emit("str  x1, [x29, #{$off}]");
            } elseif ($type === 'float32') {
                // mover bits a s1 y guardar como float de 4 bytes
                $this->emit("fmov s1, w1");
                $this->emit("str  s1, [x29, #{$off}]");
            } else {
                $this->emit("str  w1, [x29, #{$off}]");
            }
        }
    }

    // ================================================================
    //  CONST DECLARATION (tratada igual que var)
    // ================================================================

    private function genConstDecl($ctx): void
    {
        $name = $ctx->ID()->getText();
        $type = $ctx->type()->getText();
        $off  = $this->allocVar($name, $type);
        $this->genExpr($ctx->expression());
        $this->storeVar($off, $type);
    }

    // ================================================================
    //  ASSIGNMENT: x op= expr
    // ================================================================

    private function genAssignment($ctx): void
    {
        $name = $ctx->ID()->getText();
        $op   = $ctx->assignOp()->getText();
        $off  = $this->getVarOffset($name);
        if ($off === null) return;

        $type = $this->getVarType($name);
        if ($type === 'float32') $this->enterFloat();
        $this->genExpr($ctx->expression());
        if ($type === 'float32') $this->exitFloat();

        if ($op === '=') {
            // arreglos: ya fueron modificados en su lugar por la función; no re-guardar
            if ($type === 'array') return;
            $this->storeVar($off, $type);
        } elseif ($type === 'float32') {
            // operadores compuestos para float32
            $this->emit("ldr  s1, [x29, #{$off}]");   // cargar valor actual
            $this->emit("fmov s0, w0");                // rhs en s0
            switch ($op) {
                case '+=': $this->emit("fadd s0, s1, s0"); break;
                case '-=': $this->emit("fsub s0, s1, s0"); break;
                case '*=': $this->emit("fmul s0, s1, s0"); break;
                case '/=': $this->emit("fdiv s0, s1, s0"); break;
            }
            $this->emit("str  s0, [x29, #{$off}]");
        } else {
            // operadores compuestos (+= -= *= /=) para enteros
            $this->emit("ldr  w1, [x29, #{$off}]");
            switch ($op) {
                case '+=': $this->emit("add  w0, w1, w0"); break;
                case '-=': $this->emit("sub  w0, w1, w0"); break;
                case '*=': $this->emit("mul  w0, w1, w0"); break;
                case '/=': $this->emit("sdiv w0, w1, w0"); break;
            }
            $this->emit("str  w0, [x29, #{$off}]");
        }
    }

    // ================================================================
    //  ARRAY ASSIGN: arr[i] = expr
    // ================================================================

    private function genArrayAssign($ctx): void
    {
        $name    = $ctx->ID()->getText();
        $op      = $ctx->assignOp()->getText();
        $off     = $this->getVarOffset($name);
        if ($off === null) return;

        // todas las expresiones: las primeras son índices, la última es el valor
        $allExprs = $ctx->expression();
        $nIdx     = count($allExprs) - 1;
        $valExpr  = $allExprs[$nIdx];

        $info    = $this->arrayInfo[$name] ?? null;
        $dims    = $info ? $info['dims'] : [];
        $eSize   = $info ? $info['elemSize'] : 4;
        $varType = $this->getVarType($name);

        // calcular dirección base en x8
        if (str_starts_with($varType, 'ptr:')) {
            $this->emit("ldr  x8, [x29, #{$off}]");
        } else {
            $this->emit("add  x8, x29, #{$off}");
        }

        // aplicar cada índice con su stride
        for ($k = 0; $k < $nIdx; $k++) {
            $stride = $eSize;
            for ($d = $k + 1; $d < count($dims); $d++) {
                $stride *= $dims[$d];
            }
            // evaluar índice (puede sobrescribir x8, guardarlo)
            $this->emit("str  x8, [sp, #-16]!");   // push dirección actual
            $this->genExpr($allExprs[$k]);
            $this->emit("sxtw x1, w0");
            if ($stride === 4) {
                $this->emit("lsl  x1, x1, #2");
            } elseif ($stride === 8) {
                $this->emit("lsl  x1, x1, #3");
            } elseif ($stride > 1) {
                $this->emit("mov  x2, #{$stride}");
                $this->emit("mul  x1, x1, x2");
            }
            $this->emit("ldr  x8, [sp], #16");     // pop dirección
            $this->emit("add  x8, x8, x1");
        }

        $elemType = $info ? $info['elemType'] : 'int32';

        // guardar dirección final y evaluar valor
        $this->emit("str  x8, [sp, #-16]!");
        if ($elemType === 'float32') $this->enterFloat();
        $this->genExpr($valExpr);
        if ($elemType === 'float32') $this->exitFloat();
        $this->emit("ldr  x8, [sp], #16");

        if ($op === '=') {
            if ($eSize === 8) {
                $this->emit("str  x0, [x8]");
            } elseif ($elemType === 'float32') {
                $this->emit("fmov s0, w0");
                $this->emit("str  s0, [x8]");
            } else {
                $this->emit("str  w0, [x8]");
            }
        } else {
            $this->emit("ldr  w1, [x8]");
            switch ($op) {
                case '+=': $this->emit("add  w0, w1, w0"); break;
                case '-=': $this->emit("sub  w0, w1, w0"); break;
                case '*=': $this->emit("mul  w0, w1, w0"); break;
                case '/=': $this->emit("sdiv w0, w1, w0"); break;
            }
            $this->emit("str  w0, [x8]");
        }
    }

    // ================================================================
    //  PTR ASSIGN: *ptr = expr
    // ================================================================

    private function genPtrAssign($ctx): void
    {
        $name = $ctx->ID()->getText();
        $op   = $ctx->assignOp()->getText();
        $off  = $this->getVarOffset($name);
        if ($off === null) return;

        // evaluar expresión del lado derecho → w0
        $this->genExpr($ctx->expression());

        // cargar la dirección apuntada por el puntero
        $this->emit("ldr  x1, [x29, #{$off}]");

        if ($op === '=') {
            $this->emit("str  w0, [x1]");
        } else {
            $this->emit("ldr  w2, [x1]");
            switch ($op) {
                case '+=': $this->emit("add  w0, w2, w0"); break;
                case '-=': $this->emit("sub  w0, w2, w0"); break;
                case '*=': $this->emit("mul  w0, w2, w0"); break;
                case '/=': $this->emit("sdiv w0, w2, w0"); break;
            }
            $this->emit("str  w0, [x1]");
        }
    }

    // ================================================================
    //  INC / DEC: x++ / x--
    // ================================================================

    private function genIncDec($ctx): void
    {
        $name = $ctx->ID()->getText();
        $op   = $ctx->getChild(1)->getText();
        $off  = $this->getVarOffset($name);
        if ($off === null) return;

        $this->emit("ldr  w0, [x29, #{$off}]");
        if ($op === '++') {
            $this->emit("add  w0, w0, #1");
        } else {
            $this->emit("sub  w0, w0, #1");
        }
        $this->emit("str  w0, [x29, #{$off}]");
    }

    // ================================================================
    //  IF / ELSE
    // ================================================================

    private function genIfStmt($ctx): void
    {
        $lblElse = $this->newLabel('.Lelse');
        $lblEnd  = $this->newLabel('.Lend_if');

        // evaluar condición → w0
        $condType = $this->inferExprType($ctx->expression());
        if ($condType === 'float32') $this->enterFloat();
        $this->genExpr($ctx->expression());
        if ($condType === 'float32') $this->exitFloat();
        $this->emit("cbz  w0, {$lblElse}");

        // bloque then
        $blocks = $ctx->block();
        $this->visitBlockNode($blocks[0]);
        $this->emit("b    {$lblEnd}");

        // etiqueta else
        $this->emitLabel($lblElse);

        if ($ctx->ifStmt()) {
            // else if
            $this->genIfStmt($ctx->ifStmt());
        } elseif (isset($blocks[1])) {
            // else { }
            $this->visitBlockNode($blocks[1]);
        }

        $this->emitLabel($lblEnd);
    }

    // ================================================================
    //  FOR
    // ================================================================

    private function genForStmt($ctx): void
    {
        $lblStart    = $this->newLabel('.Lfor');
        $lblEnd      = $this->newLabel('.Lfor_end');
        $lblContinue = $this->newLabel('.Lfor_cont');

        array_push($this->breakStack,    $lblEnd);
        array_push($this->continueStack, $lblContinue);

        if ($ctx->forInit()) {
            // for init; cond; post { }
            $this->genForInit($ctx->forInit());

            $this->emitLabel($lblStart);
            if ($ctx->expression()) {
                $forCondType = $this->inferExprType($ctx->expression());
                if ($forCondType === 'float32') $this->enterFloat();
                $this->genExpr($ctx->expression());
                if ($forCondType === 'float32') $this->exitFloat();
                $this->emit("cbz  w0, {$lblEnd}");
            }

            $this->visitBlockNode($ctx->block());

            $this->emitLabel($lblContinue);
            $this->genForPost($ctx->forPost());
            $this->emit("b    {$lblStart}");

        } elseif ($ctx->expression()) {
            // for cond { }  — estilo while
            $this->emitLabel($lblStart);
            $forCondType = $this->inferExprType($ctx->expression());
            if ($forCondType === 'float32') $this->enterFloat();
            $this->genExpr($ctx->expression());
            if ($forCondType === 'float32') $this->exitFloat();
            $this->emit("cbz  w0, {$lblEnd}");

            $this->visitBlockNode($ctx->block());

            $this->emitLabel($lblContinue);
            $this->emit("b    {$lblStart}");

        } else {
            // for { }  — bucle infinito
            $this->emitLabel($lblStart);
            $this->visitBlockNode($ctx->block());
            $this->emitLabel($lblContinue);
            $this->emit("b    {$lblStart}");
        }

        $this->emitLabel($lblEnd);

        array_pop($this->breakStack);
        array_pop($this->continueStack);
    }

    private function genForInit($ctx): void
    {
        $name = $ctx->ID()->getText();
        $op   = $ctx->getChild(1)->getText();
        $this->genExpr($ctx->expression());

        if ($op === ':=') {
            $off = $this->allocVar($name, 'int32');
        } else {
            $off = $this->getVarOffset($name);
            if ($off === null) return;
        }
        $this->emit("str  w0, [x29, #{$off}]");
    }

    private function genForPost($ctx): void
    {
        $name = $ctx->ID()->getText();
        $op   = $ctx->getChild(1)->getText();
        $off  = $this->getVarOffset($name);
        if ($off === null) return;

        if ($op === '++') {
            $this->emit("ldr  w0, [x29, #{$off}]");
            $this->emit("add  w0, w0, #1");
            $this->emit("str  w0, [x29, #{$off}]");
        } elseif ($op === '--') {
            $this->emit("ldr  w0, [x29, #{$off}]");
            $this->emit("sub  w0, w0, #1");
            $this->emit("str  w0, [x29, #{$off}]");
        } elseif ($ctx->assignOp()) {
            // ID assignOp expression  (e.g., i += 6)
            $this->genExpr($ctx->expression());
            $assignOp = $ctx->assignOp()->getText();
            if ($assignOp === '=') {
                $this->emit("str  w0, [x29, #{$off}]");
            } else {
                $this->emit("ldr  w1, [x29, #{$off}]");
                switch ($assignOp) {
                    case '+=': $this->emit("add  w0, w1, w0"); break;
                    case '-=': $this->emit("sub  w0, w1, w0"); break;
                    case '*=': $this->emit("mul  w0, w1, w0"); break;
                    case '/=': $this->emit("sdiv w0, w1, w0"); break;
                }
                $this->emit("str  w0, [x29, #{$off}]");
            }
        } else {
            // legacy ID '=' expression
            $this->genExpr($ctx->expression());
            $this->emit("str  w0, [x29, #{$off}]");
        }
    }

    // ================================================================
    //  BREAK / CONTINUE
    // ================================================================

    private function genBreak(): void
    {
        if (!empty($this->breakStack)) {
            $this->emit("b    " . end($this->breakStack));
        }
    }

    private function genContinue(): void
    {
        if (!empty($this->continueStack)) {
            $this->emit("b    " . end($this->continueStack));
        }
    }

    // ================================================================
    //  RETURN
    // ================================================================

    private function genReturn($ctx): void
    {
        $epilogue = '.L' . $this->funcName . '_ret';

        if ($ctx->expList()) {
            $exps = $ctx->expList()->expression();
            $n    = count($exps);

            if ($n === 1) {
                $t0 = $this->inferExprType($exps[0]);
                if ($t0 === 'float32') $this->enterFloat();
                $this->genExpr($exps[0]);
                if ($t0 === 'float32') $this->exitFloat();

            } elseif ($n >= 2) {
                // evaluar todos los valores y pushear al stack
                for ($i = 0; $i < $n; $i++) {
                    $ti = $this->inferExprType($exps[$i]);
                    if ($ti === 'float32') $this->enterFloat();
                    $this->genExpr($exps[$i]);
                    if ($ti === 'float32') $this->exitFloat();
                    $this->emit("str  x0, [sp, #-16]!");
                }
                // pop en orden inverso: x(n-1)..x1 primero, x0 último
                for ($i = $n - 1; $i >= 0; $i--) {
                    $this->emit("ldr  x{$i}, [sp], #16");
                }
            }
        }

        $this->emit("b    {$epilogue}");
    }

    // ================================================================
    //  SWITCH BÁSICO
    // ================================================================

    private function genSwitchStmt($ctx): void
    {
        $lblEnd = $this->newLabel('.Lswitch_end');
        array_push($this->breakStack, $lblEnd);

        // evaluar expresión del switch → w9 (registro de trabajo)
        $this->genExpr($ctx->expression());
        $this->emit("mov  w9, w0");

        foreach ($ctx->caseClause() as $case) {
            $lblCase = $this->newLabel('.Lcase');
            $lblSkip = $this->newLabel('.Lskip');

            // verificar cada valor del case
            foreach ($case->expList()->expression() as $caseExpr) {
                $this->genExpr($caseExpr);
                $this->emit("cmp  w9, w0");
                $this->emit("b.eq {$lblCase}");
            }
            $this->emit("b    {$lblSkip}");

            $this->emitLabel($lblCase);
            foreach ($case->statement() as $stmt) {
                $this->dispatchStatement($stmt);
            }
            $this->emit("b    {$lblEnd}");

            $this->emitLabel($lblSkip);
        }

        if ($ctx->defaultClause()) {
            foreach ($ctx->defaultClause()->statement() as $stmt) {
                $this->dispatchStatement($stmt);
            }
        }

        $this->emitLabel($lblEnd);
        array_pop($this->breakStack);
    }

    // ================================================================
    //  FUNCTION CALL
    // ================================================================

    public function visitFunctionCall($ctx) { $this->genFunctionCall($ctx); }

    private function genFunctionCall($ctx): void
    {
        $name = $ctx->qualifiedName()->getText();

        // fmt.Println
        if ($name === 'fmt.Println') {
            $this->genFmtPrintln($ctx);
            return;
        }

        // len(arr | str) → tamaño en tiempo de compilación para arreglos, strlen para strings
        if ($name === 'len') {
            $items = $ctx->argList() ? $ctx->argList()->argItem() : [];
            if (count($items) === 1 && $items[0]->expression()) {
                $pr = $this->getPrimary($items[0]->expression());
                $varName = $pr && $pr->ID() ? $pr->ID()->getText() : null;
                if ($varName && isset($this->arrayInfo[$varName])) {
                    $size = $this->arrayInfo[$varName]['totalElems'];
                    $this->emit("mov  w0, #{$size}");
                } else {
                    // string: llamar strlen
                    $this->genExpr($items[0]->expression());
                    $this->emit("bl   strlen");
                }
            } else {
                $this->emit("mov  w0, #0");
            }
            return;
        }

        // now() → string con fecha y hora actual en formato YYYY-MM-DD HH:MM:SS
        if ($name === 'now') {
            if (!$this->nowStaticAdded) {
                $this->dataLines[] = '.Lnow_t:';
                $this->dataLines[] = '    .space 8';
                $this->dataLines[] = '.Lnow_buf:';
                $this->dataLines[] = '    .space 32';
                $this->dataLines[] = '.Lnow_fmt:';
                $this->dataLines[] = '    .string "%Y-%m-%d %H:%M:%S"';
                $this->nowStaticAdded = true;
            }
            // time(NULL) → x0
            $this->emit("mov  x0, #0");
            $this->emit("bl   time");
            // guardar time_t
            $this->emit("adrp x1, .Lnow_t");
            $this->emit("add  x1, x1, :lo12:.Lnow_t");
            $this->emit("str  x0, [x1]");
            // localtime(&.Lnow_t) → struct tm*
            $this->emit("adrp x0, .Lnow_t");
            $this->emit("add  x0, x0, :lo12:.Lnow_t");
            $this->emit("bl   localtime");
            // guardar tm* en stack (se necesita después)
            $this->emit("str  x0, [sp, #-16]!");
            // strftime(.Lnow_buf, 32, .Lnow_fmt, tm*)
            $this->emit("adrp x0, .Lnow_buf");
            $this->emit("add  x0, x0, :lo12:.Lnow_buf");
            $this->emit("mov  x1, #32");
            $this->emit("adrp x2, .Lnow_fmt");
            $this->emit("add  x2, x2, :lo12:.Lnow_fmt");
            $this->emit("ldr  x3, [sp], #16");   // pop tm*
            $this->emit("bl   strftime");
            // retornar puntero al buffer con la fecha
            $this->emit("adrp x0, .Lnow_buf");
            $this->emit("add  x0, x0, :lo12:.Lnow_buf");
            return;
        }

        // substr(s, start, len) → nueva cadena usando strndup
        if ($name === 'substr') {
            $items = $ctx->argList() ? $ctx->argList()->argItem() : [];
            if (count($items) >= 3) {
                // push s, start, len en orden
                $this->genExpr($items[0]->expression());  // s
                $this->emit("str  x0, [sp, #-16]!");
                $this->genExpr($items[1]->expression());  // start
                $this->emit("sxtw x0, w0");
                $this->emit("str  x0, [sp, #-16]!");
                $this->genExpr($items[2]->expression());  // len
                $this->emit("sxtw x0, w0");
                $this->emit("str  x0, [sp, #-16]!");
                // pop: len → x1, start → x2, s → x0
                $this->emit("ldr  x1, [sp], #16");   // len
                $this->emit("ldr  x2, [sp], #16");   // start
                $this->emit("ldr  x0, [sp], #16");   // s
                // x0 = s + start
                $this->emit("add  x0, x0, x2");
                // strndup(ptr, len) → x0 = nueva cadena null-terminada
                $this->emit("bl   strndup");
            } else {
                $this->emit("mov  x0, xzr");
            }
            return;
        }

        // typeOf(expr) → nombre del tipo como string (compile-time)
        if ($name === 'typeOf') {
            $items = $ctx->argList() ? $ctx->argList()->argItem() : [];
            if (count($items) === 1 && $items[0]->expression()) {
                $type = $this->inferExprType($items[0]->expression());
                // también revisar si es arreglo
                $pr = $this->getPrimary($items[0]->expression());
                $varName = $pr && $pr->ID() ? $pr->ID()->getText() : null;
                if ($varName && isset($this->arrayInfo[$varName])) {
                    $info = $this->arrayInfo[$varName];
                    $dimStr = implode('', array_map(fn($d) => "[{$d}]", $info['dims']));
                    $type = $dimStr . $info['elemType'];
                }
                $lbl = $this->newStringLit($type);
                $this->emit("adrp x0, {$lbl}");
                $this->emit("add  x0, x0, :lo12:{$lbl}");
            } else {
                $this->emit("mov  x0, xzr");
            }
            return;
        }

        // llamada a función de usuario
        if (!isset($this->funcDecls[$name])) return;

        // construir lista de args: cada uno puede ser expr o &ID (referencia)
        $args = [];
        if ($ctx->argList()) {
            foreach ($ctx->argList()->argItem() as $item) {
                if ($item->REF()) {
                    // &ID → pasar dirección de la variable en el frame
                    $args[] = ['ref' => $item->getChild(1)->getText()];
                } elseif ($item->expression()) {
                    $args[] = ['expr' => $item->expression()];
                }
            }
        }

        // evaluar args y pushear al stack (máx 8 args)
        $n = min(count($args), 8);
        for ($i = 0; $i < $n; $i++) {
            $arg = $args[$i];
            if (isset($arg['ref'])) {
                // &ID: calcular dirección en el frame o en arrayInfo
                $varName = $arg['ref'];
                $off = $this->getVarOffset($varName);
                if ($off !== null) {
                    $this->emit("add  x0, x29, #{$off}");
                } else {
                    $this->emit("mov  x0, xzr");
                }
                $this->emit("str  x0, [sp, #-16]!");
            } else {
                $exp  = $arg['expr'];
                $type = $this->inferExprType($exp);
                $this->genExpr($exp);
                if ($type === 'string' || str_starts_with($type, 'ptr:') || $type === 'array') {
                    // strings, punteros y arreglos: x0 ya contiene dirección de 64 bits
                    $this->emit("str  x0, [sp, #-16]!");
                } else {
                    $this->emit("sxtw x0, w0");
                    $this->emit("str  x0, [sp, #-16]!");
                }
            }
        }

        // pop en registros x0..x(n-1) (orden inverso del stack)
        for ($i = $n - 1; $i >= 0; $i--) {
            $this->emit("ldr  x{$i}, [sp], #16");
        }

        $this->emit("bl   {$name}");
        // resultado en w0/x0
    }

    // ================================================================
    //  FMT.PRINTLN
    // ================================================================

    private function genFmtPrintln($ctx): void
    {
        if (!$ctx->argList() || count($ctx->argList()->argItem()) === 0) {
            // fmt.Println() → solo salto de línea
            $lbl = $this->newStringLit("\n");
            $this->emit("adrp x0, {$lbl}");
            $this->emit("add  x0, x0, :lo12:{$lbl}");
            $this->emit("bl   printf");
            return;
        }

        $items    = $ctx->argList()->argItem();
        $fmtParts = [];
        $argTypes = [];   // tipo de cada arg (para decidir GP vs VR en el pop)

        // 1. evaluar cada argumento y pushear al stack temporal
        foreach ($items as $item) {
            if ($item->REF()) {
                $fmtParts[] = '%p';
                $argTypes[] = 'ptr';
                $this->emit("mov  x0, xzr");
                $this->emit("str  x0, [sp, #-16]!");
                continue;
            }

            $exp  = $item->expression();
            $type = $this->inferExprType($exp);

            if ($type === 'float32') $this->enterFloat();
            $this->genExpr($exp);
            if ($type === 'float32') $this->exitFloat();

            if ($type === 'string') {
                $fmtParts[] = '%s';
                $argTypes[] = 'string';
                $this->emit("str  x0, [sp, #-16]!");

            } elseif ($type === 'bool') {
                $fmtParts[] = '%s';
                $argTypes[] = 'string';  // convertido a string ptr
                $lblT   = $this->newLabel('.Lbt');
                $lblD   = $this->newLabel('.Lbd');
                $sTrue  = $this->newStringLit('true');
                $sFalse = $this->newStringLit('false');
                $this->emit("cbnz w0, {$lblT}");
                $this->emit("adrp x0, {$sFalse}");
                $this->emit("add  x0, x0, :lo12:{$sFalse}");
                $this->emit("b    {$lblD}");
                $this->emitLabel($lblT);
                $this->emit("adrp x0, {$sTrue}");
                $this->emit("add  x0, x0, :lo12:{$sTrue}");
                $this->emitLabel($lblD);
                $this->emit("str  x0, [sp, #-16]!");

            } elseif ($type === 'float32') {
                // %g: double en registro VR (d0, d1...) — guardar double bits al stack
                $fmtParts[] = '%g';
                $argTypes[] = 'float32';
                $this->emit("fmov s0, w0");
                $this->emit("fcvt d0, s0");
                $this->emit("fmov x0, d0");
                $this->emit("str  x0, [sp, #-16]!");

            } else {
                $fmtParts[] = '%d';
                $argTypes[] = 'int';
                $this->emit("sxtw x0, w0");
                $this->emit("str  x0, [sp, #-16]!");
            }
        }

        // 2. construir string de formato (registrar etiqueta; ADRP se emite tras los pops)
        $fmtStr = implode(' ', $fmtParts) . '\n';
        $fmtLbl = $this->newStringLit($fmtStr);

        // 3. pre-calcular destinos: floats → d0,d1... / resto → x1,x2...
        $gpIdx = 1;
        $vrIdx = 0;
        $argDests = [];
        foreach ($argTypes as $t) {
            if ($t === 'float32') {
                $argDests[] = 'd' . $vrIdx++;
            } else {
                $argDests[] = 'x' . $gpIdx++;
            }
        }

        // 4. pop en orden inverso al stack
        $n = count($argDests);
        for ($i = $n - 1; $i >= 0; $i--) {
            $dest = $argDests[$i];
            if ($dest[0] === 'd') {
                // double bits → registro FPU; usar x10 para no pisar x8/x9
                $this->emit("ldr  x10, [sp], #16");
                $this->emit("fmov {$dest}, x10");
            } else {
                $this->emit("ldr  {$dest}, [sp], #16");
            }
        }

        // 4b. args GP que exceden x7 (x8, x9, ...) no son registros de argumento
        // AAPCS64: variadic args extra van en [sp] antes del bl → devolver al stack
        $overflowRegs = [];
        for ($r = 8; $r < $gpIdx; $r++) {
            $overflowRegs[] = 'x' . $r;
        }
        // push en orden inverso: x8 queda en dirección más baja (primer arg de stack)
        foreach (array_reverse($overflowRegs) as $reg) {
            $this->emit("str  {$reg}, [sp, #-16]!");
        }

        // 5. cargar formato en x0 DESPUÉS de los pops (evita colisión con x8)
        $this->emit("adrp x0, {$fmtLbl}");
        $this->emit("add  x0, x0, :lo12:{$fmtLbl}");
        $this->emit("bl   printf");

        // 6. limpiar stack overflow args
        if (!empty($overflowRegs)) {
            $this->emit("add  sp, sp, #" . (count($overflowRegs) * 16));
        }
    }

    // ================================================================
    //  EXPRESIONES — resultado en w0 (int32/bool) o x0 (string)
    // ================================================================

    public function visitExpression($ctx) { $this->genExpr($ctx); }

    private function genExpr($ctx): void
    {
        $this->genLogicalOr($ctx->logicalOr());
    }

    private function genLogicalOr($ctx): void
    {
        $children = $ctx->logicalAnd();
        if (count($children) === 1) { $this->genLogicalAnd($children[0]); return; }

        // evaluación de cortocircuito: a || b → si a es true, saltar al true
        $lblTrue = $this->newLabel('.Lor_t');
        $lblEnd  = $this->newLabel('.Lor_e');

        $this->genLogicalAnd($children[0]);
        $this->emit("cbnz w0, {$lblTrue}");   // cortocircuito

        for ($i = 1; $i < count($children); $i++) {
            $this->genLogicalAnd($children[$i]);
            if ($i < count($children) - 1) {
                $this->emit("cbnz w0, {$lblTrue}");
            }
        }

        $this->emit("b    {$lblEnd}");
        $this->emitLabel($lblTrue);
        $this->emit("mov  w0, #1");
        $this->emitLabel($lblEnd);
    }

    private function genLogicalAnd($ctx): void
    {
        $children = $ctx->equality();
        if (count($children) === 1) { $this->genEquality($children[0]); return; }

        // cortocircuito: a && b → si a es false, saltar al false
        $lblFalse = $this->newLabel('.Land_f');
        $lblEnd   = $this->newLabel('.Land_e');

        $this->genEquality($children[0]);
        $this->emit("cbz  w0, {$lblFalse}");

        for ($i = 1; $i < count($children); $i++) {
            $this->genEquality($children[$i]);
            if ($i < count($children) - 1) {
                $this->emit("cbz  w0, {$lblFalse}");
            }
        }

        $this->emit("b    {$lblEnd}");
        $this->emitLabel($lblFalse);
        $this->emit("mov  w0, #0");
        $this->emitLabel($lblEnd);
    }

    private function genEquality($ctx): void
    {
        $children = $ctx->comparison();
        if (count($children) === 1) { $this->genComparison($children[0]); return; }

        $this->genComparison($children[0]);
        for ($i = 1; $i < count($children); $i++) {
            $op = $ctx->getChild(2 * $i - 1)->getText();
            $this->emit("str  w0, [sp, #-16]!");
            $this->genComparison($children[$i]);
            $this->emit("ldr  w1, [sp], #16");
            if ($this->inFloat()) {
                $this->emit("fmov s1, w1");
                $this->emit("fmov s0, w0");
                $this->emit("fcmp s1, s0");
            } else {
                $this->emit("cmp  w1, w0");
            }
            $this->emit($op === '==' ? "cset w0, eq" : "cset w0, ne");
        }
    }

    private function genComparison($ctx): void
    {
        $children = $ctx->term();
        if (count($children) === 1) { $this->genTerm($children[0]); return; }

        $this->genTerm($children[0]);
        for ($i = 1; $i < count($children); $i++) {
            $op = $ctx->getChild(2 * $i - 1)->getText();
            $this->emit("str  w0, [sp, #-16]!");
            $this->genTerm($children[$i]);
            $this->emit("ldr  w1, [sp], #16");
            if ($this->inFloat()) {
                $this->emit("fmov s1, w1");
                $this->emit("fmov s0, w0");
                $this->emit("fcmp s1, s0");
            } else {
                $this->emit("cmp  w1, w0");
            }
            switch ($op) {
                case '>':  $this->emit("cset w0, gt"); break;
                case '<':  $this->emit("cset w0, lt"); break;
                case '>=': $this->emit("cset w0, ge"); break;
                case '<=': $this->emit("cset w0, le"); break;
            }
        }
    }

    private function genTerm($ctx): void
    {
        $children = $ctx->factor();
        if (count($children) === 1) { $this->genFactor($children[0]); return; }

        $this->genFactor($children[0]);
        for ($i = 1; $i < count($children); $i++) {
            $op = $ctx->getChild(2 * $i - 1)->getText();
            $this->emit("str  w0, [sp, #-16]!");
            $this->genFactor($children[$i]);
            $this->emit("ldr  w1, [sp], #16");
            if ($this->inFloat()) {
                $this->emit("fmov s1, w1");
                $this->emit("fmov s0, w0");
                $this->emit($op === '+' ? "fadd s0, s1, s0" : "fsub s0, s1, s0");
                $this->emit("fmov w0, s0");
            } else {
                $this->emit($op === '+' ? "add  w0, w1, w0" : "sub  w0, w1, w0");
            }
        }
    }

    private function genFactor($ctx): void
    {
        $children = $ctx->unary();
        if (count($children) === 1) { $this->genUnary($children[0]); return; }

        $this->genUnary($children[0]);
        for ($i = 1; $i < count($children); $i++) {
            $op = $ctx->getChild(2 * $i - 1)->getText();
            $this->emit("str  w0, [sp, #-16]!");
            $this->genUnary($children[$i]);
            $this->emit("ldr  w1, [sp], #16");
            if ($this->inFloat()) {
                $this->emit("fmov s1, w1");
                $this->emit("fmov s0, w0");
                switch ($op) {
                    case '*': $this->emit("fmul s0, s1, s0"); break;
                    case '/': $this->emit("fdiv s0, s1, s0"); break;
                    default:  $this->emit("fmul s0, s1, s0"); break;
                }
                $this->emit("fmov w0, s0");
            } else {
                switch ($op) {
                    case '*':
                        $this->emit("mul  w0, w1, w0");
                        break;
                    case '/':
                        $this->emit("sdiv w0, w1, w0");
                        break;
                    case '%':
                        // módulo: a % b = a - (a/b)*b
                        $this->emit("sdiv w2, w1, w0");
                        $this->emit("msub w0, w2, w0, w1");
                        break;
                }
            }
        }
    }

    private function genUnary($ctx): void
    {
        if ($ctx->primary()) { $this->genPrimary($ctx->primary()); return; }

        $op = $ctx->getChild(0)->getText();
        $this->genUnary($ctx->unary());

        switch ($op) {
            case '-':
                if ($this->inFloat()) {
                    $this->emit("fmov s0, w0");
                    $this->emit("fneg s0, s0");
                    $this->emit("fmov w0, s0");
                } else {
                    $this->emit("neg  w0, w0");
                }
                break;
            case '!':
                // negación booleana: 0→1, distinto de 0→0
                $this->emit("cmp  w0, #0");
                $this->emit("cset w0, eq");
                break;
            case '*':
                // desreferenciación de puntero: ldr w0, [x0]
                $this->emit("ldr  w0, [x0]");
                break;
        }
    }

    private function genPrimary($ctx): void
    {
        // expresión entre paréntesis
        if ($ctx->expression()) {
            $this->genExpr($ctx->expression());
            return;
        }

        // llamada a función
        if ($ctx->functionCall()) {
            $this->genFunctionCall($ctx->functionCall());
            return;
        }

        // acceso a arreglo o cadena: arr[i] / str[i]
        if ($ctx->arrayAccess()) {
            $this->genArrayAccess($ctx->arrayAccess());
            return;
        }

        // conversión de tipo: rune(expr), int32(expr), float32(expr), etc.
        if ($ctx->typeCast()) {
            $targetType = $ctx->typeCast()->type()->getText();
            $innerType  = $this->inferExprType($ctx->typeCast()->expression());
            if ($innerType === 'float32') $this->enterFloat();
            $this->genExpr($ctx->typeCast()->expression());
            if ($innerType === 'float32') $this->exitFloat();
            // la mayoría de casts son no-ops en nivel de bits (rune↔int32, int32↔bool)
            // float32→int32: truncar
            if ($innerType === 'float32' && in_array($targetType, ['int32','rune','int'])) {
                $this->emit("fmov s0, w0");
                $this->emit("fcvtzs w0, s0");
            }
            // int32→float32: convertir
            if (in_array($innerType, ['int32','rune','int']) && $targetType === 'float32') {
                $this->emit("scvtf s0, w0");
                $this->emit("fmov  w0, s0");
            }
            return;
        }

        // identificador (variable)
        if ($ctx->ID()) {
            $name = $ctx->ID()->getText();
            $off  = $this->getVarOffset($name);
            $type = $this->getVarType($name);

            if ($off !== null) {
                if ($type === 'array') {
                    // arreglo por valor: pasar la dirección del primer elemento
                    $this->emit("add  x0, x29, #{$off}");
                } elseif ($type === 'string' || str_starts_with($type, 'ptr:')) {
                    $this->emit("ldr  x0, [x29, #{$off}]");
                } elseif ($type === 'float32') {
                    // cargar 4 bytes float → s0, luego mover bits a w0 para uniformidad
                    $this->emit("ldr  s0, [x29, #{$off}]");
                    $this->emit("fmov w0, s0");
                } else {
                    $this->emit("ldr  w0, [x29, #{$off}]");
                }
            } else {
                // verificar si es una constante global
                if (isset($this->globalConsts[$name])) {
                    $gc = $this->globalConsts[$name];
                    if ($gc['type'] === 'string') {
                        $this->emit("adrp x0, {$gc['strLbl']}");
                        $this->emit("add  x0, x0, :lo12:{$gc['strLbl']}");
                    } elseif ($gc['type'] === 'float32') {
                        $this->emit("adrp x0, {$gc['strLbl']}");
                        $this->emit("add  x0, x0, :lo12:{$gc['strLbl']}");
                        $this->emit("ldr  s0, [x0]");
                        $this->emit("fmov w0, s0");
                    } else {
                        $this->emitIntImm($gc['intVal']);
                    }
                } else {
                    $this->emit("mov  w0, #0");
                }
            }
            return;
        }

        // literal entero
        if ($ctx->INT()) {
            $val = (int)$ctx->INT()->getText();
            $this->emitIntImm($val);
            return;
        }

        // literal flotante: almacenar en .data como .float y cargar con FPU
        if ($ctx->FLOAT()) {
            $fval = $ctx->FLOAT()->getText();
            $lbl  = '.Lflt' . ($this->strCount++);
            $this->dataLines[] = $lbl . ':';
            $this->dataLines[] = '    .float ' . $fval;
            $this->emit("adrp x0, {$lbl}");
            $this->emit("add  x0, x0, :lo12:{$lbl}");
            $this->emit("ldr  s0, [x0]");
            $this->emit("fmov w0, s0");   // bits IEEE 754 en w0
            return;
        }

        // literal string
        if ($ctx->STRING()) {
            $raw   = $ctx->STRING()->getText();
            $inner = substr($raw, 1, strlen($raw) - 2);
            $lbl   = $this->newStringLit($inner);
            $this->emit("adrp x0, {$lbl}");
            $this->emit("add  x0, x0, :lo12:{$lbl}");
            return;
        }

        // literal rune: 'a' → valor ASCII/Unicode
        if ($ctx->RUNE()) {
            $raw   = $ctx->RUNE()->getText();
            $inner = substr($raw, 1, strlen($raw) - 2);
            $val   = $this->runeValue($inner);
            $this->emitIntImm($val);
            return;
        }

        // true / false
        if ($ctx->TRUE())  { $this->emit("mov  w0, #1"); return; }
        if ($ctx->FALSE()) { $this->emit("mov  w0, #0"); return; }

        // nil → imprime como <nil>
        if ($ctx->NIL()) {
            $lbl = $this->newStringLit('<nil>');
            $this->emit("adrp x0, {$lbl}");
            $this->emit("add  x0, x0, :lo12:{$lbl}");
            return;
        }
    }

    // ================================================================
    //  ARRAY ACCESS: arr[i]
    // ================================================================

    private function genArrayAccess($ctx): void
    {
        $name    = $ctx->ID()->getText();
        $off     = $this->getVarOffset($name);
        $indices = $ctx->expression();

        if ($off === null) { $this->emit("mov  w0, #0"); return; }

        $info    = $this->arrayInfo[$name] ?? null;
        $dims    = $info ? $info['dims'] : [];
        $varType = $this->getVarType($name);
        $elemType = $info ? $info['elemType'] : 'int32';

        // string indexing: byte access
        if ($varType === 'string') {
            $this->emit("ldr  x8, [x29, #{$off}]");  // load string pointer
            $this->genExpr($indices[0]);
            $this->emit("sxtw x1, w0");
            $this->emit("ldrb w0, [x8, x1]");        // load byte at index
            return;
        }

        $eSize = $info ? $info['elemSize'] : 4;

        // si es puntero a arreglo: cargar el valor del puntero como base
        if (str_starts_with($varType, 'ptr:')) {
            $this->emit("ldr  x8, [x29, #{$off}]");
        } else {
            $this->emit("add  x8, x29, #{$off}");
        }

        // aplicar cada índice con su stride correspondiente
        foreach ($indices as $k => $idx) {
            // stride[k] = producto de dims[k+1..] * eSize
            $stride = $eSize;
            for ($d = $k + 1; $d < count($dims); $d++) {
                $stride *= $dims[$d];
            }

            $this->genExpr($idx);
            $this->emit("sxtw x1, w0");

            if ($stride === 4) {
                $this->emit("lsl  x1, x1, #2");
            } elseif ($stride === 8) {
                $this->emit("lsl  x1, x1, #3");
            } elseif ($stride > 1) {
                $this->emit("mov  x2, #{$stride}");
                $this->emit("mul  x1, x1, x2");
            }
            $this->emit("add  x8, x8, x1");
        }

        if ($eSize === 8) {
            $this->emit("ldr  x0, [x8]");
        } elseif ($elemType === 'float32') {
            // load 4-byte float → s0 → w0 (IEEE754 bits in w0 for uniform handling)
            $this->emit("ldr  s0, [x8]");
            $this->emit("fmov w0, s0");
        } else {
            $this->emit("ldr  w0, [x8]");
        }
    }

    // ================================================================
    //  HELPERS DE EXPRESIONES
    // ================================================================

    // emite instrucciones para cargar un inmediato entero en w0
    private function emitIntImm(int $val): void
    {
        if ($val >= 0 && $val <= 65535) {
            $this->emit("mov  w0, #{$val}");
        } elseif ($val < 0 && $val >= -65536) {
            // valores negativos pequeños
            $this->emit("mov  w0, #" . ($val & 0xFFFF));
            $this->emit("sxtw x0, w0");
            $this->emit("mov  w0, w0");   // ensure sign-extension
        } else {
            // valores grandes: usar movz + movk
            $lo = $val & 0xFFFF;
            $hi = ($val >> 16) & 0xFFFF;
            $this->emit("movz w0, #{$lo}");
            if ($hi !== 0) {
                $this->emit("movk w0, #{$hi}, lsl #16");
            }
        }
    }

    // retorna el valor numérico de un literal rune
    private function runeValue(string $inner): int
    {
        if ($inner === '\\n') return 10;
        if ($inner === '\\t') return 9;
        if ($inner === '\\\\') return 92;
        if ($inner === "\\'") return 39;
        if (str_starts_with($inner, '\\u')) {
            return hexdec(substr($inner, 2));
        }
        return mb_ord($inner, 'UTF-8') ?: 0;
    }

    // ================================================================
    //  INFERENCIA DE TIPO (para fmt.Println y short decl)
    // ================================================================

    // infiere el tipo de una expresión de manera simplificada
    private function inferExprType($exprCtx): string
    {
        $text = $exprCtx->getText();

        // string literal
        if (str_starts_with($text, '"')) return 'string';

        // booleanos literales
        if ($text === 'true' || $text === 'false') return 'bool';

        // nil → se trata como string (<nil>)
        if ($text === 'nil') return 'string';

        // intentar navegar hasta primary
        try {
            $lo = $exprCtx->logicalOr();

            // si hay múltiples AND/OR, es booleano
            if (count($lo->logicalAnd()) > 1) return 'bool';

            $la = $lo->logicalAnd()[0];
            if (count($la->equality()) > 1) return 'bool';

            $eq = $la->equality()[0];
            if (count($eq->comparison()) > 1) return 'bool';

            $cp = $eq->comparison()[0];

            // recorrer todos los términos/factores buscando float32 o bool (negación)
            foreach ($cp->term() as $tm) {
                foreach ($tm->factor() as $fc) {
                    foreach ($fc->unary() as $un) {
                        if (!$un->primary()) {
                            // BANG unary → resultado booleano
                            if (method_exists($un, 'BANG') && $un->BANG()) return 'bool';
                            continue;
                        }
                        $pr = $un->primary();
                        if ($pr->FLOAT()) return 'float32';
                        if ($pr->ID()) {
                            $t = $this->getVarType($pr->ID()->getText());
                            if ($t === 'float32') return 'float32';
                        }
                    }
                }
            }

            // si hay comparación (>, <, >=, <=) el resultado es bool
            if (count($cp->term()) > 1) return 'bool';

            $tm = $cp->term()[0];
            $fc = $tm->factor()[0];
            $un = $fc->unary()[0];

            if (!$un->primary()) return 'int32';
            $pr = $un->primary();

            if ($pr->STRING()) return 'string';
            if ($pr->TRUE() || $pr->FALSE()) return 'bool';
            if ($pr->RUNE()) return 'rune';
            if ($pr->typeCast()) return $pr->typeCast()->type()->getText();
            if ($pr->arrayAccess()) {
                $arrName = $pr->arrayAccess()->ID()->getText();
                if (isset($this->arrayInfo[$arrName])) {
                    return $this->arrayInfo[$arrName]['elemType'];
                }
                return 'int32';
            }
            if ($pr->functionCall()) {
                $fname = $pr->functionCall()->qualifiedName()->getText();
                if (in_array($fname, ['typeOf', 'substr', 'now'])) return 'string';
                if (isset($this->funcDecls[$fname])) {
                    $rt = $this->funcDecls[$fname]->returnType();
                    if ($rt && !$rt->getChildCount()) return 'int32';
                    if ($rt && $rt->type()) return $rt->type()->getText();
                    if ($rt && $rt->arrayType()) return 'array';
                }
                return 'int32';
            }
            if ($pr->ID()) return $this->getVarType($pr->ID()->getText());

        } catch (\Throwable $e) {
            // si falla la navegación, asumir int32
        }

        return 'int32';
    }
}
