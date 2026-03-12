# Documentación Técnica
| Nombre | Carnet|
|----------|-------|
| Mariano Roberto Rac Noguera| 202101149 |

---

## 1. Gramática Formal de Golampi (Archivo .g4)

Golampi es un lenguaje de programación inspirado en Go, compilado mediante ANTLR4 (Another Tool for Language Recognition). La gramática define la estructura sintáctica completa del lenguaje.

### 1.1 Estructura General del Programa

```
program
    : (functionDecl | varDecl | constDecl)+ EOF
    ;
```

Un programa de Golampi consiste en una o más declaraciones de funciones, variables o constantes, seguidas del marcador de fin de archivo (EOF).

**Ejemplo:**
```go
const PI float32 = 3.14159;

var globalVar int32 = 10;

func fibonacci(n int32) int32 {
    if n <= 1 {
        return n;
    }
    return fibonacci(n - 1) + fibonacci(n - 2);
}

func main() {
    // Código principal
}
```

### 1.2 Declaraciones de Función

#### Regla ANTLR

```
functionDecl
    : FUNC ID '(' paramList? ')' returnType? block
    ;

paramList
    : param (',' param)*
    ;

param
    : ID type               // Parámetro simple: a int32
    | ID STAR type          // Puntero: a *int32
    | ID STAR arrayType     // Puntero a array: a *[5]int32
    | ID STAR sliceType     // Puntero a slice: a *[]int32
    | ID arrayType          // Array: a [5]int32
    | ID sliceType          // Slice: a []int32
    ;

returnType
    : type
    | arrayType
    | sliceType
    | STAR type
    | STAR arrayType
    | STAR sliceType
    | '(' multiReturnType (',' multiReturnType)* ')'
    ;
```

#### Ejemplos de Funciones

**Función simple sin retorno:**
```go
func saludar() {
    println("Hola");
}
```

**Función con un parámetro:**
```go
func cuadrado(x int32) int32 {
    return x * x;
}
```

**Función con múltiples parámetros:**
```go
func suma(a int32, b int32) int32 {
    return a + b;
}
```

**Función con múltiples retornos:**
```go
func dividir(a float32, b float32) (float32, bool) {
    if b == 0.0 {
        return 0.0, false;
    }
    return a / b, true;
}
```

**Función con parámetros de tipo puntero:**
```go
func incrementar(ptr *int32) {
    *ptr = *ptr + 1;
}
```

**Función con parámetros de array:**
```go
func sumarArray(arr [5]int32) int32 {
    var suma int32 = 0;
    // procesar array
    return suma;
}
```

### 1.3 Declaraciones de Variables y Constantes

#### Variables

**Regla ANTLR:**
```
varDecl
    : VAR ID type ('=' expression)? ';'?
    | VAR idList type '=' expList ';'?
    | VAR ID arrayType ('=' arrayLiteral)? ';'?
    | VAR ID STAR type ';'?
    ;

varShortDecl
    : idList ':=' expList ';'?
    | ID ':=' arrayLiteral ';'?
    ;
```

**Ejemplos:**
```go
// Variable simple inicializada
var x int32 = 10;

// Variable sin inicializar (valor por defecto)
var y int32;

// Declaración corta con inferencia de tipo
z := 42;

// Múltiples variables
var a, b, c int32 = 1, 2, 3;

// Variable puntero
var ptr *int32;

// Array
var arr [5]int32 = [5]int32{1, 2, 3, 4, 5};
```

#### Constantes

**Regla ANTLR:**
```
constDecl
    : CONST ID type '=' expression ';'?
    ;
```

**Ejemplo:**
```go
const MAX_ITEMS int32 = 100;
const PI float32 = 3.14159;
const APP_NAME string = "Golampi";
```

### 1.4 Bloques de Código

```
block
    : '{' statement* '}'
    ;
```

Un bloque es una secuencia de statements entre llaves. Se utilizan en funciones, condicionales, bucles y otras construcciones de control de flujo.

```go
func ejemplo() {
    // Inicio del bloque de la función
    var x int32 = 5;
    
    if x > 0 {
        // Bloque anidado del if
        println("Positivo");
    }
    
    // Fin del bloque de la función
}
```

### 1.5 Statements (Declaraciones)

Las estructuras que se pueden incluir dentro de un bloque:

```
statement
    : varDecl
    | varShortDecl
    | constDecl
    | ptrAssign           // Asignación a puntero
    | arrayAssign         // Asignación a elemento de array
    | assignment          // Asignación simple
    | ifStmt
    | forStmt
    | switchStmt
    | breakStmt
    | continueStmt
    | incDecStmt          // Incremento/Decremento
    | returnStmt
    | functionCall ';'?
    | expression ';'?
    ;
```

### 1.6 Control de Flujo

#### Sentencia If-Else

```
ifStmt
    : IF expression block (ELSE (ifStmt | block))?
    ;
```

**Ejemplos:**
```go
// If simple
if x > 0 {
    println("Positivo");
}

// If-Else
if x > 0 {
    println("Positivo");
} else {
    println("No positivo");
}

// If-Else anidado (if-else if)
if x > 0 {
    println("Positivo");
} else if x < 0 {
    println("Negativo");
} else {
    println("Cero");
}
```

#### Sentencia For

```
forStmt
    : FOR forInit ';' expression ';' forPost block
    | FOR expression block
    | FOR block
    ;

forInit
    : ID ':=' expression
    | ID '=' expression
    ;

forPost
    : ID '++'
    | ID '--'
    | ID '=' expression
    ;
```

**Ejemplos:**
```go
// Bucle tradicional
for i := 0; i < 10; i++ {
    println(i);
}

// Bucle condicional (como while)
var n int32 = 10;
for n > 0 {
    println(n);
    n--;
}

// Bucle infinito
for {
    if condition {
        break;
    }
}
```

#### Sentencia Switch

```
switchStmt
    : SWITCH expression '{' caseClause* defaultClause? '}'
    ;

caseClause
    : CASE expList ':' statement*
    ;

defaultClause
    : DEFAULT ':' statement*
    ;
```

**Ejemplo:**
```go
var dia int32 = 3;
switch dia {
    case 1, 2, 3:
        println("Inicio de semana");
    case 4, 5:
        println("Mitad de semana");
    case 6, 7:
        println("Fin de semana");
    default:
        println("Día inválido");
}
```

#### Break y Continue

```
breakStmt  : BREAK ';'?    ;
continueStmt : CONTINUE ';'? ;
```

```go
for i := 0; i < 10; i++ {
    if i == 5 {
        break;  // Sale del bucle
    }
    if i == 2 {
        continue;  // Salta a siguiente iteración
    }
    println(i);
}
```

#### Return

```
returnStmt
    : RETURN expList? ';'?
    ;
```

```go
func obtenerValor() int32 {
    return 42;
}

func dividir() (int32, bool) {
    return 10, true;
}

func procedimiento() {
    return;  // Sin valor de retorno
}
```

### 1.7 Asignaciones

```
assignment
    : ID assignOp expression ';'?
    ;

ptrAssign
    : STAR ID assignOp expression ';'?
    ;

arrayAssign
    : ID ('[' expression ']')+ assignOp expression ';'?
    ;

assignOp
    : '='
    | ADD_ASSIGN   // +=
    | SUB_ASSIGN   // -=
    | MUL_ASSIGN   // *=
    | DIV_ASSIGN   // /=
    ;

incDecStmt
    : ID '++'  ';'?
    | ID '--'  ';'?
    ;
```

**Ejemplos:**
```go
// Asignación simple
x = 10;

// Asignación con operadores compuestos
x += 5;    // x = x + 5
y -= 3;    // y = y - 3
z *= 2;    // z = z * 2
w /= 4;    // w = w / 4

// Asignación a puntero
*ptr = 20;

// Asignación a elemento de array
arr[2] = 15;

// Incremento/Decremento
i++;
j--;
```

### 1.8 Tipos de Datos

```
type
    : INT_TYPE       // 'int32'
    | FLOAT_TYPE     // 'float32'
    | STRING_TYPE    // 'string'
    | BOOL_TYPE      // 'bool'
    | RUNE_TYPE      // 'rune'
    ;

arrayType
    : '[' INT ']' type
    | '[' INT ']' arrayType
    ;

sliceType
    : '[' ']' type
    ;
```

#### Tipos Primitivos

| Tipo | Descripción | Ejemplo |
|------|-------------|---------|
| `int32` | Entero de 32 bits | `42` |
| `float32` | Punto flotante de 32 bits | `3.14` |
| `string` | Cadena de caracteres | `"Hola"` |
| `bool` | Booleano | `true`, `false` |
| `rune` | Carácter Unicode | `'A'` |

#### Tipos Complejos

**Arrays (Tamaño fijo):**
```go
var arr1 [5]int32;              // Array de 5 enteros
var arr2 [3]string = [3]string{"a", "b", "c"};
var matriz [2][3]int32;         // Array bidimensional
```

**Punteros:**
```go
var x int32 = 10;
var ptr *int32 = &x;            // Puntero a x
*ptr = 20;                       // Desreferencia y asigna
```

**Arrays de Punteros:**
```go
var ptrArray [5]*int32;         // Array de 5 punteros a int32
```

### 1.9 Llamadas a Función

```
functionCall
    : qualifiedName '(' argList? ')'
    ;

qualifiedName
    : ID ('.' ID)*
    ;

argList
    : argItem (',' argItem)*
    ;

argItem
    : REF ID      // & indica referencia/dirección
    | expression
    ;
```

**Ejemplos:**
```go
// Llamada simple
resultado = suma(5, 3);

// Llamada sin argumentos
saludar();

// Paso por referencia
incrementar(&x);

// Múltiples argumentos
valor = funcionCompleja(a, b, &c, 42);

// Resultado en variable
var res int32 = cuadrado(5);
```

### 1.10 Expresiones y Operadores

```
expression
    : logicalOr
    ;

logicalOr
    : logicalAnd ( OR logicalAnd )*
    ;

logicalAnd
    : equality ( AND equality )*
    ;

equality
    : comparison ( ( EQ | NEQ ) comparison )*
    ;

comparison
    : term ( ( GTE | LTE | GT | LT ) term )*
    ;

term
    : factor ( ( PLUS | MINUS ) factor )*
    ;

factor
    : unary ( ( STAR | SLASH | MOD ) unary )*
    ;

unary
    : BANG unary
    | MINUS unary
    | STAR unary
    | primary
    ;

primary
    : '(' expression ')'
    | functionCall
    | arrayAccess
    | ID
    | INT
    | FLOAT
    | STRING
    | RUNE
    | TRUE
    | FALSE
    | NIL
    ;
```

#### Tabla de Operadores (por precedencia)

| Precedencia | Operador | Descripción | Tipo |
|-------------|----------|-------------|------|
| 1 (Menor) | `\|\|` | OR lógico | Binario |
| 2 | `&&` | AND lógico | Binario |
| 3 | `==`, `!=` | Igualdad/Desigualdad | Binario |
| 4 | `<`, `<=`, `>`, `>=` | Comparación | Binario |
| 5 | `+`, `-` | Suma, Resta | Binario |
| 6 | `*`, `/`, `%` | Multiplicación, División, Módulo | Binario |
| 7 (Mayor) | `!`, `-`, `*` | Negación, Negación aritmética, Desref | Unario |

**Ejemplos:**
```go
// Expresiones aritméticas
var a int32 = 10 + 5 * 2;      // 20 (multiplicación primero)
var b int32 = (10 + 5) * 2;    // 30 (paréntesis tienen precedencia)

// Expresiones lógicas
if x > 5 && y < 10 {
    // Ambas condiciones deben ser verdaderas
}

if x == 0 || y == 0 {
    // Al menos una condición es verdadera
}

// Negación
var invertido bool = !verdadero;

// Acceso a arrays
var elemento int32 = arr[i];

// Desreferencia
var valor int32 = *ptr;
```

### 1.11 Literales y Valores

```
primary
    : INT          // Número entero: 42
    | FLOAT        // Número flotante: 3.14
    | STRING       // Cadena: "texto"
    | RUNE         // Carácter: 'A'
    | TRUE         // Valor booleano verdadero
    | FALSE        // Valor booleano falso
    | NIL          // Valor nulo/vacío
    ;
```

**Ejemplos:**
```go
var edad int32 = 30;             // Literal entero
var pi float32 = 3.14159;        // Literal flotante
var nombre string = "Golampi";   // Literal string
var inicial rune = 'G';          // Literal rune
var esActivo bool = true;        // Literal booleano
var vacio int32 = nil;           // Valor nil (no válido para todos los tipos)
```

### 1.12 Arrays y Literales de Array

```
arrayType
    : '[' INT ']' type
    | '[' INT ']' arrayType
    ;

arrayLiteral
    : '[' INT ']' type '{' arrayElements? '}'
    | '[' INT ']' arrayType '{' arrayRowElements? '}'
    | '[' ']' type '{' arrayElements? '}'
    ;

arrayElements
    : expression (',' expression)*
    ;

arrayAccess
    : ID ('[' expression ']')+
    ;
```

**Ejemplos:**
```go
// Array unidimensional
var numeros [5]int32 = [5]int32{1, 2, 3, 4, 5};

// Array sin inicialización
var vacio [3]string;

// Array bidimensional
var matriz [2][3]int32 = [2][3]int32{
    {1, 2, 3},
    {4, 5, 6}
};

// Acceso a elementos
var primero int32 = numeros[0];
numeros[2] = 10;

// Acceso a arrays multidimensionales
var elemento int32 = matriz[0][1];
```

### 1.13 Palabras Clave Reservadas

| Categoría | Palabras Clave |
|-----------|---------|
| **Estructura** | `func`, `var`, `const` |
| **Control de Flujo** | `if`, `else`, `for`, `switch`, `case`, `default`, `break`, `continue`, `return` |
| **Literales Booleanos** | `true`, `false` |
| **Valor Nulo** | `nil` |
| **Tipos de Dato** | `int32`, `float32`, `string`, `bool`, `rune` |

### 1.14 Operadores Léxicos

| Operador | Símbolo | Descripción |
|----------|---------|-------------|
| **Asignación** | `=` | Asignación simple |
| **Asignación Compuesta** | `+=`, `-=`, `*=`, `/=` | Asignación con operación |
| **Incremento/Decremento** | `++`, `--` | Incremento y decremento |
| **Aritmética** | `+`, `-`, `*`, `/`, `%` | Suma, resta, multiplicación, división, módulo |
| **Comparación** | `==`, `!=`, `<`, `<=`, `>`, `>=` | Igualdad, desigualdad, comparaciones |
| **Lógica** | `&&`, `\|\|`, `!` | AND, OR, NOT |
| **Puntero** | `*`, `&` | Desreferencia, referencia |
| **Especiales** | `:=` | Declaración corta con asignación |

### 1.15 Estructura de Tokens Léxicos (Orden en .g4)

El orden de definición en la sección léxica es importante para evitar conflictos:

```
1. Operadores compuestos (antes que simples)
   ADD_ASSIGN, SUB_ASSIGN, MUL_ASSIGN, DIV_ASSIGN
   OR, AND, EQ, NEQ, GTE, LTE

2. Palabras clave (deben estar antes de ID para tener prioridad)
   func, var, const, if, else, for, switch, case, default,
   break, continue, return, true, false, nil

3. Tipos (deben estar antes de ID)
   int32, float32, string, bool, rune

4. Identificadores
   ID : [\p{L}_] [\p{L}\p{N}_]*

5. Números (FLOAT antes que INT)
   FLOAT : [0-9]+ '.' [0-9]+
   INT   : [0-9]+

6. Strings y Runes
   STRING, RUNE

7. Comentarios (ignorados con skip)
   LINE_COMMENT, BLOCK_COMMENT

8. Espacios en blanco (ignorados con skip)
   WS
```

---

## 2. Diagrama de Clases

```
┌─────────────────────────────────────────────────────────┐
│                    FLUJO DE COMPILACIÓN                 │
└─────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│     GolampiLexer (generado por ANTLR)   │
│  Tokeniza el código fuente en tokens    │
└────────────────┬────────────────────────┘
                 │
                 ▼
┌─────────────────────────────────────────┐
│     GolampiParser (generado por ANTLR)  │
│  Crea el árbol sintáctico (AST) desde   │
│  los tokens                             │
└────────────────┬────────────────────────┘
                 │
         ┌───────┼──────────┐
         │       │          │
         ▼       ▼          ▼
    ┌─────────────┐   ┌──────────────────┐   ┌──────────────────┐
    │AstGenerator │   │SemanticVisitor   │   │ReportGenerator   │
    │(genera AST) │   │ - Análisis léxico│   │(genera JPGs)     │
    │Visualiza    │   │ - Control scope  │   │ - Tabla Errores  │
    │el AST       │   │ - Validación tipo│   │ - Tabla Símbolos │
    └──────┬──────┘   └────────┬─────────┘   │ - Grafo AST      │
           │                   │             └──────────────────┘
           │                   ▼
           │          ┌─────────────────────┐
           │          │  SymbolTable        │
           │          │  - Variables        │
           │          │  - Funciones        │
           │          │  - Scopes (stack)   │
           │          └────────┬────────────┘
           │                   │
           │                   ▼
           │          ┌─────────────────────┐
           │          │  Executor           │
           │          │  (GolampiVisitor)   │
           │          │  - Interpreta AST   │
           │          │  - Ejecuta código   │
           │          │  - Maneja estado    │
           │          └────────┬────────────┘
           │                   │
           └───────────────────┼─────────────────┐
                               ▼                 ▼
                          SALIDA              REPORTES
                          (texto)             (JPGs + datos)
```

### Clases Principales

#### 1. **AstGenerator**
- **Responsabilidad**: Generar visualización del árbol sintáctico en formato DOT
- **Entrada**: Árbol del parser (ParserRuleContext)
- **Salida**: Código DOT (para Graphviz)
- **Método clave**: `generate($tree): string`

#### 2. **ReportGenerator**
- **Responsabilidad**: Generar reportes visuales en formato JPG
- **Funciones**:
  - `astJpg($tree, $parser): string` - Genera imagen JPG del AST
  - `errorsJpg($errors): string` - Genera tabla visual de errores en JPG
  - `symbolsJpg($symbols): string` - Genera tabla de símbolos en JPG
- **Formato de salida**: Base64 de imagen JPG
- **Integración**: Convierte datos en imágenes descargables

#### 3. **SemanticVisitor**
- **Responsabilidad**: Análisis semántico del código
- **Hereda de**: GolampiBaseVisitor
- **Funciones**:
  - Validar tipos de datos
  - Verificar declaraciones antes de uso
  - Gestionar scopes (global y locales)
  - Detectar errores semánticos
- **Salida**: Array de errores y tabla de símbolos
  
#### 4. **SymbolTable**
- **Responsabilidad**: Gestionar tabla de símbolos
- **Estructura**:
  - Stack de scopes (global + funciones + bloques)
  - Variables y funciones registradas
- **Métodos clave**:
  - `enterScope($name)` - Nuevo scope
  - `exitScope()` - Salir de scope
  - `defineVariable($name, $symbol)` - Registrar variable
  - `resolveVariable($name)` - Buscar variable (búsqueda en profundidad)
  - `defineFunction($name, $symbol)` - Registrar función
  - `toArray()` - Exportar tabla para reportes

#### 5. **VariableSymbol**
- **Responsabilidad**: Representar información de una variable
- **Atributos**:
  - Nombre
  - Tipo (int, float, string, bool, rune)
  - Scope donde fue declarada
  - Valor actual (si aplica)

#### 6. **FunctionSymbol**
- **Responsabilidad**: Representar información de una función
- **Atributos**:
  - Nombre
  - Parámetros
  - Tipo de retorno
  - Cuerpo (bloque de código)

#### 7. **Executor** (interpretador)
- **Responsabilidad**: Ejecutar el código compilado
- **Hereda de**: GolampiBaseVisitor
- **Funciones**:
  - `visitProgram()` - Ejecutar programa
  - `visitFunctionDecl()` - Procesar declaración
  - `visitStatement()` - Ejecutar declaración
  - `visitExpression()` - Evaluar expresión
  - `callFunction()` - Invocar función
  - `getOutput()` - Obtener salida acumulada
- **Estado**:
  - Stack de scopes (múltiples niveles)
  - Tabla de funciones
  - Tabla de punteros
  - Buffer de salida

---

## 3. Flujo de Procesamiento y Tabla de Símbolos

### 3.1 Flujo General con Generación de Reportes

```
CÓDIGO FUENTE (.golampi)
        │
        ▼
    ┌───────────────┐
    │   Lexer       │ → Tokenización (errores léxicos)
    └───────┬───────┘
            │
            ▼
    ┌───────────────────────────┐
    │   Parser                  │ → Análisis sintáctico
    └───────┬─────────────┬─────┘     (AST - Árbol sintáctico)
            │             │
            │             └──────────────────┐
            ▼                                │
    ┌───────────────────────┐               │
    │ Semantic Visitor      │ → Análisis    │
    │ + Symbol Table        │   semántico   │
    └───────┬───────────────┘               │
            │                               │
    ┌───────┴───────────────────────────────┘
    │
    ▼
┌──────────────────────┐
│  ReportGenerator     │ → Genera reportes JPG
│  (3 imágenes)       │
└──────────┬───────────┘
           │
    ┌──────┼──────────┬──────────┐
    ▼      ▼          ▼          ▼
   AST   Errores  Símbolos   JSON
  (JPG)  (JPG)     (JPG)      API
```

### 3.2 Tabla de Símbolos

La **Tabla de Símbolos** es una estructura fundamental que mantiene información sobre variables y funciones durante la compilación e interpretación.

#### Estructura en Stack

```
┌──────────────────────────────┐
│  STACK DE SCOPES             │
├──────────────────────────────┤
│                              │
│  Scope 3: Bloque local       │  (ej: interior de if)
│  ├─ variable_local: int      │
│  └─ x: float                 │
│                              │
├──────────────────────────────┤
│                              │
│  Scope 2: Función main()     │
│  ├─ a: int                   │
│  ├─ b: string                │
│  └─ ptr_c: *int              │
│                              │
├──────────────────────────────┤
│                              │
│  Scope 1: Global             │
│  ├─ main: function           │
│  ├─ fibonacci: function      │
│  └─ MAX_VALUE: const int     │
│                              │
└──────────────────────────────┘
```

#### Variables en la Tabla

Cuando se declara una variable, se registra con:

```php
class VariableSymbol {
    public string $name;      // Nombre identificador
    public string $type;      // int, float, string, bool, rune
    public string $scope;     // Scope donde fue declarada
    public $value;           // Valor actual
}
```

#### Resolución de Variables

Cuando se necesita acceder a una variable:

1. Buscar en el scope actual (cima del stack)
2. Si no existe, buscar en el scope padre
3. Continuar hasta el scope global
4. Si no se encuentra → Error de variable no declarada

```
Búsqueda(variable "x") en scope 3:
  ├─ ¿En scope 3? NO
  ├─ ¿En scope 2 (padre)? SÍ → Encontrada
  └─ Retornar símbolo de "x"
```

#### Manejo de Funciones

```php
class FunctionSymbol {
    public string $name;       // Nombre de función
    public array $parameters;  // Parámetros formales
    public string $returnType; // Tipo de retorno
    public $body;             // AST del cuerpo
}
```

### 3.3 Fases de la Tabla de Símbolos

**Fase 1: Pre-procesamiento de funciones** (en `visitProgram`)
```
Registrar todas las funciones en la tabla global
├─ main()
├─ fibonacci()
└─ otras...
```

**Fase 2: Ejecución de función main()** (inicio)
```
Entrar en scope de main
├─ Procesar parámetros (si existen)
├─ Procesar declaraciones locales
├─ Ejecutar statements
└─ Salir de scope
```

**Fase 3: Llamadas a funciones**
```
Al llamar función f():
├─ Entrar en nuevo scope (nombre: "f")
├─ Vincular parámetros formales con argumentos actuales
├─ Procesar cuerpo de función
├─ Capturar valor de retorno (si aplica)
└─ Salir de scope
```

**Fase 4: Bloques anidados** (if, for, etc.)
```
Al entrar a bloque de if:
├─ Entrar en nuevo scope (intermediario)
├─ Procesar statements del bloque
└─ Salir de scope (variables locales se pierden)
```

### 3.4 Ejemplo de Ejecución

```go
func fibonacci(n int) int {
    if n <= 1 {
        return n;
    }
    return fibonacci(n - 1) + fibonacci(n - 2);
}

func main() {
    var result int;
    result = fibonacci(10);
}
```

**Estado de la tabla de símbolos en distintos puntos:**

```
[PUNTO 1] En visitProgram (pre-procesamiento):
  Scope 0 (global):
    - fibonacci: FunctionSymbol
    - main: FunctionSymbol

[PUNTO 2] Dentro de main(), antes de asignación:
  Scope 1 (main):
    - result: int = nil
  Scope 0 (global):
    - fibonacci: FunctionSymbol
    - main: FunctionSymbol

[PUNTO 3] Dentro de fibonacci(10), primer call:
  Scope 2 (fibonacci):
    - n: int = 10
  Scope 1 (main):
    - result: int = nil
  Scope 0 (global):
    - fibonacci: FunctionSymbol
    - main: FunctionSymbol

[PUNTO 4] Dentro de if (n <= 1):
  Scope 3 (bloque if):
    (sin variables nuevas)
  Scope 2 (fibonacci):
    - n: int = 0 o 1
  ... (scopes anteriores)

[PUNTO 5] Dentro de fibonacci(9) (llamada anidada):
  Scope 3 (fibonacci recursivo):
    - n: int = 9
  Scope 2 (fibonacci anterior):
    - n: int = 10 (suspendido)
  ... (scopes anteriores)
```

---

## 4. Archivos Clave del Proyecto

| Archivo | Descripción |
|---------|-------------|
| `Golampi.g4` | Especificación ANTLR4 de la gramática |
| `GolampiLexer.php` | Tokenizador (generado) |
| `GolampiParser.php` | Analizador sintáctico (generado) |
| `SemanticVisitor.php` | Análisis semántico y validación |
| `SymbolTable.php` | Gestión de tabla de símbolos |
| `VariableSymbol.php` | Representación de variables |
| `FunctionSymbol.php` | Representación de funciones |
| `Executor.php` | Intérprete que ejecuta el código |
| `AstGenerator.php` | Generador de visualización AST |
| `Reportgenerator.php` | Generador de reportes en JPG |

---

**Autor:** Mariano Roberto Rac Noguera  
**Carnet:** 202101149
