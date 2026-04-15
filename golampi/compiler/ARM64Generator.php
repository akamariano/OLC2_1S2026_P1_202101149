<?php

namespace Compiler;

require_once __DIR__ . '/../grammar/GolampiBaseVisitor.php';

// Genera código ensamblador ARM64 (AArch64) desde el árbol sintáctico de Golampi.
// Frame: stp x29,x30 baja sp, mov x29,sp fija el fp. Variables en [x29+16], [x29+24]...
// Expresiones dejan resultado en w0 (int32/bool) o x0 (string). Binops usan push/pop a sp.
class ARM64Generator extends \GolampiBaseVisitor
{
    // -- secciones de código --
    private array $textLines = [];
    private array $dataLines = [];

    // -- contadores únicos --
    private int $labelCount = 0;
    private int $strCount   = 0;

    // -- estado por función --
    private array  $varOffsets   = [];   // nombre => offset desde x29
    private int    $nextOffset   = 16;   // primer slot libre ([x29+16])
    private string $funcName     = '';
    private int    $frameSize    = 512;  // frame fijo: suficiente para 62 variables locales

    // -- pilas de etiquetas para break/continue --
    private array $breakStack    = [];
    private array $continueStack = [];

    // -- hoisting: todas las funciones del programa --
    private array $funcDecls = [];

    // -- tipos en scope para inferir fmt.Println --
    private array $scopeStack = [[]];

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
        // escapar secuencias para GAS: \n → literal newline char no, usamos .string
        $this->dataLines[] = '    .string "' . $this->escapeForGas($content) . '"';
        return $label;
    }

    // escapa un string para usarlo dentro de .string "..."
    private function escapeForGas(string $s): string
    {
        // primero desescapar secuencias de Golampi, luego re-escapar para GAS
        $s = str_replace('\\n',  "\n",  $s);
        $s = str_replace('\\t',  "\t",  $s);
        $s = str_replace('\\\\', "\\",  $s);
        $s = str_replace('\\"',  '"',   $s);
        // re-escapar para GAS
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

    private function setVarType(string $name, string $type): void
    {
        $this->scopeStack[count($this->scopeStack) - 1][$name] = $type;
    }

    private function getVarType(string $name): string
    {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            if (isset($this->scopeStack[$i][$name])) return $this->scopeStack[$i][$name];
        }
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

    // ================================================================
    //  PROGRAM
    // ================================================================

    public function visitProgram($ctx)
    {
        // hoisting: registrar todas las funciones antes de generar código
        foreach ($ctx->functionDecl() as $func) {
            $this->funcDecls[$func->ID()->getText()] = $func;
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
        $this->pushScope();

        // PRÓLOGO
        $this->emitLabel($name);
        $this->emit("stp  x29, x30, [sp, #-{$this->frameSize}]!");
        $this->emit("mov  x29, sp");

        // guardar parámetros en el frame
        if ($ctx->paramList()) {
            $regIdx = 0;
            foreach ($ctx->paramList()->param() as $param) {
                $pName = $param->ID()->getText();
                // determinar tipo del parámetro
                $pType = 'int32';
                if ($param->type())      $pType = $param->type()->getText();
                elseif ($param->arrayType()) $pType = 'array';
                elseif ($param->sliceType()) $pType = 'slice';

                // parámetro puntero: comprobar segundo hijo
                $child1 = $param->getChildCount() > 1 ? $param->getChild(1) : null;
                if ($child1 && $child1->getText() === '*') $pType = 'ptr:' . $pType;

                $offset = $this->allocVar($pName, $pType);

                // guardar registro del parámetro en el frame
                if (in_array($pType, ['string', 'ptr:int32', 'ptr:float32']) || str_starts_with($pType, 'ptr:') || str_starts_with($pType, 'array')) {
                    $this->emit("str  x{$regIdx}, [x29, #{$offset}]");
                } else {
                    $this->emit("str  w{$regIdx}, [x29, #{$offset}]");
                }
                $regIdx++;
            }
        }

        // generar cuerpo
        $this->visitBlockNode($ctx->block());

        // EPÍLOGO (return implícito al final)
        $epilogue = '.L' . $name . '_ret';
        $this->emitLabel($epilogue);
        $this->emit("mov  sp, x29");
        $this->emit("ldp  x29, x30, [sp], #{$this->frameSize}");
        $this->emit("ret");
        $this->textLines[] = '';   // línea en blanco entre funciones

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

    // ANTLR genera StatementContext con métodos para cada alternativa
    private function dispatchStatement($ctx): void
    {
        if ($ctx->varDecl())      { $this->genVarDecl($ctx->varDecl());           return; }
        if ($ctx->varShortDecl()) { $this->genVarShortDecl($ctx->varShortDecl()); return; }
        if ($ctx->constDecl())    { $this->genConstDecl($ctx->constDecl());        return; }
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
                $this->genExpr($ctx->expression());
                $this->storeVar($off, $type);
            } else {
                // valor por defecto
                $this->emitDefault($off, $type);
            }
            return;
        }

        // VAR idList type '=' expList
        if ($ctx->idList() && $ctx->expList()) {
            $ids  = $ctx->idList()->ID();
            $exps = $ctx->expList()->expression();
            $type = $ctx->type()->getText();

            // evaluar expresiones y pushear al stack temporal
            foreach ($exps as $exp) {
                $this->genExpr($exp);
                $this->emit("str  x0, [sp, #-16]!");   // push (usar x0 para 64-bit safe)
            }

            // pop en orden inverso y almacenar
            for ($i = count($ids) - 1; $i >= 0; $i--) {
                $off = $this->allocVar($ids[$i]->getText(), $type);
                $this->emit("ldr  x1, [sp], #16");     // pop
                $this->emit("str  w1, [x29, #{$off}]");
            }
            return;
        }

        // VAR ID arrayType — arreglo simple, por ahora reserva espacio
        if ($ctx->ID() && $ctx->arrayType()) {
            $name = $ctx->ID()->getText();
            $off  = $this->allocVar($name, 'array');
            $this->emit("str  xzr, [x29, #{$off}]");
            return;
        }

        // VAR ID STAR type — puntero
        if ($ctx->ID() && $ctx->STAR()) {
            $name = $ctx->ID()->getText();
            $type = 'ptr:' . ($ctx->type() ? $ctx->type()->getText() : 'int32');
            $off  = $this->allocVar($name, $type);
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

    // almacena w0/x0 en el frame según el tipo
    private function storeVar(int $off, string $type): void
    {
        if ($type === 'string' || str_starts_with($type, 'ptr:')) {
            $this->emit("str  x0, [x29, #{$off}]");
        } else {
            $this->emit("str  w0, [x29, #{$off}]");
        }
    }

    // ================================================================
    //  SHORT VAR DECLARATION: ids := exps
    // ================================================================

    private function genVarShortDecl($ctx): void
    {
        // ID ':=' arrayLiteral — skip arreglos por ahora
        if ($ctx->arrayLiteral()) return;

        $ids  = $ctx->idList()->ID();
        $exps = $ctx->expList()->expression();
        $n    = count($ids);

        // 1. evaluar todas las expresiones y pushear al stack temporal
        for ($i = 0; $i < $n; $i++) {
            $type = $this->inferExprType($exps[$i]);
            $this->genExpr($exps[$i]);

            if ($type === 'string') {
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

        $this->genExpr($ctx->expression());

        if ($op === '=') {
            $type = $this->getVarType($name);
            $this->storeVar($off, $type);
        } else {
            // operadores compuestos (+= -= *= /=)
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
        // generación básica de asignación a arreglo — versión inicial
        // arr[idx] = expr:  addr = base + idx*4 (para int32)
        $name = $ctx->ID()->getText();
        $off  = $this->getVarOffset($name);
        if ($off === null) return;

        $indices = $ctx->expression(); // puede ser multiple

        // evaluar expresión del valor
        $this->genExpr($indices[count($indices) - 1]);
        $this->emit("str  w0, [sp, #-16]!");   // guardar valor

        // evaluar último índice
        $this->genExpr($indices[count($indices) - 2 >= 0 ? count($indices) - 2 : 0]);
        $this->emit("sxtw x1, w0");            // índice como 64-bit
        $this->emit("lsl  x1, x1, #2");        // índice * 4 (int32 = 4 bytes)

        // dirección base del arreglo
        $this->emit("add  x2, x29, #{$off}");
        $this->emit("add  x2, x2, x1");

        // cargar valor y guardar
        $this->emit("ldr  w3, [sp], #16");
        $this->emit("str  w3, [x2]");
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
        $this->genExpr($ctx->expression());
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
                $this->genExpr($ctx->expression());
                $this->emit("cbz  w0, {$lblEnd}");
            }

            $this->visitBlockNode($ctx->block());

            $this->emitLabel($lblContinue);
            $this->genForPost($ctx->forPost());
            $this->emit("b    {$lblStart}");

        } elseif ($ctx->expression()) {
            // for cond { }  — estilo while
            $this->emitLabel($lblStart);
            $this->genExpr($ctx->expression());
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
        } else {
            // ID '=' expression
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
            if (count($exps) >= 1) {
                $this->genExpr($exps[0]);
                // w0 = valor de retorno (convención AArch64)
            }
            // múltiples retornos: x1, x2, ... — para implementar después
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

        // funciones embebidas sin generación real todavía
        if ($name === 'len') {
            // len(array) → retorna tamaño; versión básica devuelve 0
            $this->emit("mov  w0, #0");
            return;
        }

        if ($name === 'now') {
            // now() → string con fecha actual — placeholder
            $lbl = $this->newStringLit('2026-01-01 00:00:00');
            $this->emit("adrp x0, {$lbl}");
            $this->emit("add  x0, x0, :lo12:{$lbl}");
            return;
        }

        // llamada a función de usuario
        if (!isset($this->funcDecls[$name])) return;

        $args = [];
        if ($ctx->argList()) {
            foreach ($ctx->argList()->argItem() as $item) {
                if ($item->expression()) {
                    $args[] = $item->expression();
                }
                // &ID (puntero) — no implementado en esta versión
            }
        }

        // evaluar argumentos y pushear al stack (máx 8 args)
        $n = min(count($args), 8);
        for ($i = 0; $i < $n; $i++) {
            $type = $this->inferExprType($args[$i]);
            $this->genExpr($args[$i]);
            if ($type === 'string') {
                $this->emit("str  x0, [sp, #-16]!");
            } else {
                $this->emit("sxtw x0, w0");
                $this->emit("str  x0, [sp, #-16]!");
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

        // 1. evaluar cada argumento y pushear al stack temporal
        foreach ($items as $item) {
            if ($item->REF()) {
                // &ID — puntero, imprimir dirección
                $fmtParts[] = '%p';
                $this->emit("mov  x0, xzr");
                $this->emit("str  x0, [sp, #-16]!");
                continue;
            }

            $exp  = $item->expression();
            $type = $this->inferExprType($exp);

            $this->genExpr($exp);

            if ($type === 'string') {
                $fmtParts[] = '%s';
                $this->emit("str  x0, [sp, #-16]!");

            } elseif ($type === 'bool') {
                $fmtParts[] = '%s';
                // convertir 0/1 en "false"/"true"
                $lblT  = $this->newLabel('.Lbt');
                $lblD  = $this->newLabel('.Lbd');
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
                // float: por ahora se imprime como entero
                $fmtParts[] = '%d';
                $this->emit("sxtw x0, w0");
                $this->emit("str  x0, [sp, #-16]!");

            } else {
                // int32, rune
                $fmtParts[] = '%d';
                $this->emit("sxtw x0, w0");
                $this->emit("str  x0, [sp, #-16]!");
            }
        }

        // 2. construir string de formato y cargarlo en x8 (registro auxiliar)
        $fmtStr = implode(' ', $fmtParts) . '\n';
        $fmtLbl = $this->newStringLit($fmtStr);
        $this->emit("adrp x8, {$fmtLbl}");
        $this->emit("add  x8, x8, :lo12:{$fmtLbl}");

        // 3. pop argumentos en registros x1, x2, ... (orden inverso)
        $n = count($items);
        for ($i = $n; $i >= 1; $i--) {
            $this->emit("ldr  x{$i}, [sp], #16");
        }

        // 4. formato en x0 y llamar printf
        $this->emit("mov  x0, x8");
        $this->emit("bl   printf");
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
            $this->emit("cmp  w1, w0");
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
            $this->emit("cmp  w1, w0");
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
            if ($op === '+') {
                $this->emit("add  w0, w1, w0");
            } else {
                $this->emit("sub  w0, w1, w0");
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

    private function genUnary($ctx): void
    {
        if ($ctx->primary()) { $this->genPrimary($ctx->primary()); return; }

        $op = $ctx->getChild(0)->getText();
        $this->genUnary($ctx->unary());

        switch ($op) {
            case '-':
                $this->emit("neg  w0, w0");
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

        // acceso a arreglo: arr[i]
        if ($ctx->arrayAccess()) {
            $this->genArrayAccess($ctx->arrayAccess());
            return;
        }

        // identificador (variable)
        if ($ctx->ID()) {
            $name = $ctx->ID()->getText();
            $off  = $this->getVarOffset($name);
            $type = $this->getVarType($name);

            if ($off !== null) {
                if ($type === 'string' || str_starts_with($type, 'ptr:')) {
                    $this->emit("ldr  x0, [x29, #{$off}]");
                } else {
                    $this->emit("ldr  w0, [x29, #{$off}]");
                }
            } else {
                // variable no encontrada en scope local (puede ser global)
                $this->emit("mov  w0, #0");
            }
            return;
        }

        // literal entero
        if ($ctx->INT()) {
            $val = (int)$ctx->INT()->getText();
            $this->emitIntImm($val);
            return;
        }

        // literal flotante (por ahora solo parte entera)
        if ($ctx->FLOAT()) {
            $val = (int)floatval($ctx->FLOAT()->getText());
            $this->emitIntImm($val);
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

        // nil
        if ($ctx->NIL()) { $this->emit("mov  x0, xzr"); return; }
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

        // dirección base del arreglo en el frame
        $this->emit("add  x8, x29, #{$off}");

        // primer índice
        $this->genExpr($indices[0]);
        $this->emit("sxtw x1, w0");
        $this->emit("lsl  x1, x1, #2");   // *4 para int32
        $this->emit("add  x8, x8, x1");

        // índices adicionales (arreglos multidimensionales)
        for ($i = 1; $i < count($indices); $i++) {
            $this->genExpr($indices[$i]);
            $this->emit("sxtw x1, w0");
            $this->emit("lsl  x1, x1, #2");
            $this->emit("add  x8, x8, x1");
        }

        // cargar el valor
        $this->emit("ldr  w0, [x8]");
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
            if (count($cp->term()) > 1) return 'bool';

            $tm = $cp->term()[0];
            $fc = $tm->factor()[0];
            $un = $fc->unary()[0];

            if (!$un->primary()) return 'int32';
            $pr = $un->primary();

            if ($pr->STRING()) return 'string';
            if ($pr->TRUE() || $pr->FALSE()) return 'bool';
            if ($pr->FLOAT()) return 'float32';
            if ($pr->RUNE()) return 'rune';
            if ($pr->ID()) return $this->getVarType($pr->ID()->getText());

        } catch (\Throwable $e) {
            // si falla la navegación, asumir int32
        }

        return 'int32';
    }
}
