

# Documentación Técnica
| Nombre | Carnet|
|----------|-------|
| Mariano Roberto Rac Noguera| 202101149 |


## 1. Gramática Formal de Golampi (Archivo .g4)

Golampi es un lenguaje de programación inspirado en Go, compilado mediante ANTLR4 (Another Tool for Language Recognition).

### 1.1 Estructura General

```
programa
  ├── declaración_función+
  └── EOF
```

### 1.2 Declaraciones de Función

```
functionDecl
  ├── FUNC ID '(' paramList? ')' returnType? block
  │
  ├── paramList: param (',' param)*
  │   └── param: ID [tipo | STAR tipo | array]
  │
  └── returnType: tipo | arrayType | STAR tipo | 
                  '(' multiReturnType (',' multiReturnType)* ')'
```

### 1.3 Bloques y Declaraciones

Las funciones contienen bloques que pueden incluir:

**Variables y Constantes:**
- `var ID tipo = expression?` - Declaración de variable
- `var ID := expression` - Declaración implícita
- `const ID tipo = expression` - Constante

**Control de Flujo:**
- `if expression block (else block)?` - Condicional
- `for [init; condición; post] block` - Bucle determinado
- `for expression block` - Bucle condicional
- `for block` - Bucle infinito
- `switch expression { case ... default? }` - Condicional múltiple
- `break`, `continue`, `return [expresiones]`

**Asignaciones:**
- `ID = expression` - Asignación simple
- `*ID = expression` - Desreferenciación
- `ID[indice] = expression` - Índice de array
- Operadores compuestos: `+=`, `-=`, `*=`, `/=`

### 1.4 Tipos de Datos

```
type
  ├── int
  ├── float
  ├── string
  ├── bool
  └── rune (carácter Unicode)
```

**Tipos Complejos:**
- `[n]tipo` - Array de tamaño fijo n
- `*tipo` - Puntero a tipo
- `[n]*tipo` - Array de punteros

### 1.5 Expresiones

Golampi utiliza un análisis de precedencia estándar:

```
expression (precedencia de menor a mayor)
  ├── logicalOr: || (OR)
  ├── logicalAnd: && (AND)
  ├── equality: ==, !=
  ├── comparison: <, <=, >, >=
  ├── term: +, -
  ├── factor: *, /, %
  ├── unary: !, -, * (desref)
  └── primary: (), functionCall, ID, números, strings
```

### 1.6 Llamadas a Función

```
functionCall
  ├── qualifiedName '(' argList? ')'
  │
  └── argList: argItem (',' argItem)*
      └── argItem: [&ID | expression]  (& indica referencia)
```

### 1.7 Palabras Clave Reservadas

| Categoría | Palabras |
|-----------|----------|
| Estructura | `func`, `var`, `const` |
| Control | `if`, `else`, `for`, `switch`, `case`, `default`, `break`, `continue`, `return` |
| Valores | `true`, `false`, `nil` |
| Tipos | `int`, `float`, `string`, `bool`, `rune` |

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

#### 2. **ReportGenerator** (NUEVA)
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
│  (4 imágenes)       │
└──────────┬───────────┘
           │
    ┌──────┼──────────┬──────────┬─────────────┐
    ▼      ▼          ▼          ▼             ▼
   AST   Errores  Símbolos   (Ejecutar si   JSON
  (JPG)  (JPG)     (JPG)      no hay error)  API
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
    public bool $isConst;    // ¿Es constante?
    public bool $isPointer;  // ¿Es puntero?
    public bool $isArray;    // ¿Es array?
}
```

#### Resolución de Variables

Cuando se necesita acceder a una variable:

1. Buscar en el scope actual (cima del stack)
2. Si no existe, buscar en el scope padre
3. Continuar hasta el scope global
4. Si no se encuentra → Error de variables no declarada

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

## 4. Características del Lenguaje Golampi

### 4.1 Variables y Tipos

- **Tipado fuerte**: Requiere declaración explícita de tipos
- **Tipos básicos**: int, float, string, bool, rune
- **Arrays**: `[5]int` - array de 5 enteros
- **Punteros**: `*int` - puntero a int, se referencia con `&` y desreferencia con `*`
- **Constantes**: Valores inmutables declarados con `const`

### 4.2 Control de Flujo

- **Condicionales**: if/else (sin paréntesis obligatorios como en Go)
- **Bucles**: for con tres variantes (tradicional, condicional, infinito)
- **Switch**: Multiple selección de casos
- **Break/Continue**: Control de bucles
- **Return**: Retorno de funciones, soporta múltiples valores

### 4.3 Funciones

- Declaración con `func`
- Parámetros por valor
- Parámetros por referencia con `&`
- Múltiples retornos posibles
- Recursión soportada

### 4.4 Operadores

| Categoría | Operadores |
|-----------|-----------|
| Aritméticos | `+`, `-`, `*`, `/`, `%` |
| Comparación | `<`, `<=`, `>`, `>=` |
| Igualdad | `==`, `!=` |
| Lógicos | `&&`, `\|\|`, `!` |
| Asignación | `=`, `+=`, `-=`, `*=`, `/=` |
| Especiales | `&` (referencia), `*` (desref/multiplicación) |

---

## 5. Algoritmo de Procesamiento

### Paso 1: Lexing (Tokenización)
El código fuente se divide en tokens (palabras clave, identificadores, números, etc.)

### Paso 2: Parsing (Análisis Sintáctico)
Los tokens se organizan según las reglas gramaticales, generando un AST.

### Paso 3: Análisis Semántico
- Construcción de tabla de símbolos
- Validación de tipos
- Verificación de declaraciones
- Control de scopes

### Paso 4: Interpretación
- Recorrido del AST
- Ejecución de instrucciones
- Mantenimiento de estado (variables, scopes)
- Retorno de resultados

---

## 6. Archivos Clave del Proyecto

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
| `AstGenerator.php` | Generador de visualización AST en DOT (Graphviz) |
| `Reportgenerator.php` | Generador de reportes visuales en JPG |

---

## 7. Generación de Reportes (Nueva Funcionalidad)

### 7.1 Clase ReportGenerator

La clase `ReportGenerator` es responsable de convertir datos del procesamiento en imágenes JPG descargables.

**Métodos principales:**

```php
public static function astJpg($tree, $parser): string
```
- **Entrada**: Árbol sintáctico (ParserRuleContext) y parser
- **Proceso**: 
  1. Usa AstGenerator para crear formato DOT
  2. Convierte DOT a imagen con Graphviz
- **Salida**: String base64 de imagen JPG
- **Uso**: Generar visualización del AST

```php
public static function errorsJpg($errors): string
```
- **Entrada**: Array de errores con keys: `type`, `description`, `line`, `column`
- **Proceso**:
  1. Organiza errores por tipo (Léxico, Sintáctico, Semántico)
  2. Renderiza tabla HTML elegante
  3. Convierte a imagen JPG
- **Salida**: String base64 de imagen JPG
- **Uso**: Generar tabla visual de errores

```php
public static function symbolsJpg($symbols): string
```
- **Entrada**: Array de símbolos con keys: `name`, `type`, `scope`, `value`
- **Proceso**:
  1. Agrupa símbolos por scope
  2. Renderiza tabla HTML con colores
  3. Convierte a imagen JPG
- **Salida**: String base64 de imagen JPG
- **Uso**: Generar tabla visual de símbolos

### 7.2 Flujo de Generación de Reportes

```
Backend (PHP)
├─ analyze.php recibe código
│
├─ LEXING + PARSING
│  └─ ReportGenerator::astJpg()
│     → img_ast (base64)
│
├─ ANÁLISIS SEMÁNTICO
│  ├─ SemanticVisitor (recopila errores y símbolos)
│  ├─ ReportGenerator::errorsJpg($allErrors)
│  │  → img_errors (base64)
│  └─ ReportGenerator::symbolsJpg($symbolsReport)
│     → img_symbols (base64)
│
├─ EJECUCIÓN (si no hay errores)
│  ├─ Executor::visit(tree)
│  └─ output (texto plano)
│
└─ RESPUESTA JSON
   ├─ success (bool)
   ├─ output (string)
   ├─ errors (array)
   ├─ symbols (array)
   ├─ img_ast (base64)
   ├─ img_errors (base64)
   └─ img_symbols (base64)
        │
        ▼
    Frontend (JavaScript + HTML)
    ├─ Decodifica base64
    ├─ Muestra en img tags
    └─ Permite descarga con botones
```

### 7.3 Formatos de Salida

**img_ast**: Formato Graphviz (DOT) convertido a JPG
- Nodos coloreados por tipo
- Relaciones jerarquizadas
- Texto centrado en nodos

**img_errors**: Tabla HTML renderizada a JPG
- Columnas: Tipo, Línea, Descripción, Columna, Token
- Filas coloreadas por tipo de error
- Fuente legible Arial 10pt

**img_symbols**: Tabla HTML renderizada a JPG
- Columnas: Nombre, Tipo, Scope, Valor
- Filas alternadas en color
- Agrupadas por scope

---

## 8. API JSON de analyze.php

### 8.1 Petición HTTP

**Endpoint**: `POST /analyze.php`

**Headers**:
```
Content-Type: application/json
```

**Body**:
```json
{
  "code": "func main() { ... }"
}
```

### 8.2 Respuesta Exitosa (HTTP 200)

```json
{
  "success": true,
  "output": "Salida del programa aquí",
  "errors": [],
  "symbols": {
    "functions": [
      {
        "name": "main",
        "params": [],
        "returnTypes": [],
        "line": 1,
        "column": 1
      }
    ],
    "variables": [
      {
        "name": "x",
        "type": "int",
        "scope": "main",
        "value": 42,
        "line": 2,
        "column": 1
      }
    ]
  },
  "img_ast": "<base64 JPG string>",
  "img_errors": "<base64 JPG string>",
  "img_symbols": "<base64 JPG string>"
}
```

### 8.3 Respuesta con Errores

```json
{
  "success": false,
  "output": "",
  "errors": [
    {
      "type": "Sintáctico",
      "description": "Token inesperado '{', se esperaba: '('",
      "line": 5,
      "column": 8
    },
    {
      "type": "Semántico",
      "description": "Variable 'x' no declarada",
      "line": 10,
      "column": 15
    }
  ],
  "symbols": {},
  "img_ast": "<base64 JPG>",
  "img_errors": "<base64 JPG>",
  "img_symbols": ""
}
```

### 8.4 Campos de la Respuesta

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `success` | boolean | ¿Se ejecutó sin errores? |
| `output` | string | Salida del programa (vacío si hay errores) |
| `errors` | array | Lista de todos los errores encontrados |
| `symbols` | object | Tabla de símbolos con funciones y variables |
| `img_ast` | string | Base64 de imagen JPG del árbol sintáctico |
| `img_errors` | string | Base64 de imagen JPG de tabla de errores |
| `img_symbols` | string | Base64 de imagen JPG de tabla de símbolos |

### 8.5 Estructura de Errores

Cada error contiene:

```json
{
  "type": "Léxico|Sintáctico|Semántico|Interno",
  "description": "Mensaje legible en español",
  "line": 0,
  "column": 0
}
```

**Tipos de Errores:**
- **Léxico**: Token no reconocido (caracteres inválidos)
- **Sintáctico**: Estructura de código incorrecta
- **Semántico**: Error de tipos, variables no declaradas, etc.
- **Interno**: Errores inesperados en el intérprete

### 8.6 Flujo de Procesamiento en Backend

```
POST /analyze.php con código
        ↓
├─ FASE 1: LEXING
│  ├─ GolampiLexer tokeniza el código
│  └─ GolampiErrorListener acumula errores léxicos
│
├─ FASE 2: PARSING
│  ├─ GolampiParser crea AST
│  └─ GolampiErrorListener acumula errores sintácticos
│  └─ ReportGenerator::astJpg() genera imagen AST
│
├─ FASE 3: ANÁLISIS SEMÁNTICO
│  ├─ SemanticVisitor recorre el AST
│  ├─ SymbolTable acumula símbolos
│  └─ SemanticVisitor acumula errores semánticos
│
├─ FASE 4: GENERACIÓN DE REPORTES
│  ├─ ReportGenerator::errorsJpg() crea tabla de errores
│  └─ ReportGenerator::symbolsJpg() crea tabla de símbolos
│
├─ FASE 5: EJECUCIÓN (solo si NO hay errores)
│  └─ Executor interpreta el AST y produce salida
│
└─ RESPUESTA JSON
   ├─ success (si está vacío allErrors)
   ├─ output (solo si success=true)
   ├─ errors, symbols
   └─ img_ast, img_errors, img_symbols
```

---

## 9. Patrón de Acumulación de Errores

A diferencia de versiones anteriores que lanzaban excepciones al primer error, la nueva arquitectura acumula todos los errores:

### 9.1 Ventajas del Patrón de Acumulación

1. **Mejor experiencia del usuario**: Ve todos los problemas de una vez
2. **Análisis más completo**: Continúa analizando incluso con errores léxicos
3. **Reportes mejores**: Genera imágenes de AST aunque haya errores sintácticos
4. **Debugging facilitado**: Table de símbolos disponible incluso con fallos

### 9.2 Implementación en SemanticVisitor

```php
private array $errors = [];

private function addError(string $msg, $ctx, string $type = 'Semántico'): void
{
    // Extrae línea y columna del contexto
    $line   = $ctx->getStart()?->getLine() ?? 0;
    $column = $ctx->getStart()?->getCharPositionInLine() + 1 ?? 0;
    
    // Acumula en lugar de lanzar excepción
    $this->errors[] = [
        'type'        => $type,
        'description' => $msg,
        'line'        => $line,
        'column'      => $column,
    ];
}

// Uso:
$this->addError("Variable '$name' no declarada.", $ctx);
// Continúa el análisis...
```

### 9.3 Beneficios para Compiladores e Intérpretes

- **Compiladores**: Reportan múltiples errores en una pasada
- **IDEs**: Muestran errores de línea en tiempo real
- **Intérpretes**: Pueden hacer análisis más profundo

---

## 10. Integración Frontend-Backend

### 10.1 Flujo de Comunicación

```
FRONTEND (JavaScript)
    │
    ├─ Editor captura código
    ├─ Usuario presiona Ctrl+Enter
    ├─ script.js crea fetch() POST
    │
    └─► /analyze.php
            │
            ├─ Procesa código
            ├─ Genera reportes JPG
            │
            └─►  Respuesta JSON
                 {success, output, errors, symbols, img_*}
                 │
                 └─► JavaScript actualiza UI
                     ├─ Pestaña "Consola" muestra output
                     ├─ Pestaña "Errores" muestra tabla
                     ├─ Pestaña "Símbolos" muestra tabla
                     └─ Pestaña "Reportes" muestra imágenes JPG
                        ├─ Preview modal
                        └─ Descarga botones
```

### 10.2 Decodificación de Imágenes en Frontend

Las imágenes se envían como Base64 en el JSON:

```javascript
// En script.js (Reportgenerator.php devuelve base64)
const b64 = lastResult.img_errors; // string base64

// Mostrar en img tag
img.src = 'data:image/jpeg;base64,' + b64;

// Descargar archivo
function saveBase64Jpg(filename, b64) {
    const bin = atob(b64);
    const arr = new Uint8Array(bin.length);
    for (let i = 0; i < bin.length; i++) 
        arr[i] = bin.charCodeAt(i);
    const blob = new Blob([arr], {type: 'image/jpeg'});
    // Descargar blob...
}
```

---

## Conclusión

Golampi es un lenguaje de programación interpretado que sigue el paradigma imperativo con características tomadas de Go. Su procesamiento ocurre en cuatro fases: lexing, parsing, análisis semántico e interpretación. La tabla de símbolos juega un rol crucial manteniendo un stack de scopes que permite respetar el alcance de variables y funciones durante la ejecución del programa.

**Mejoras incorporadas (Versión Actual):**
- ✅ Generación de reportes visuales en JPG para mejor análisis
- ✅ Interfaz de usuario mejorada con pestañas dinámicas y responsive
- ✅ Descargas de reportes para documentación externa
- ✅ Mensajes de error humanizados en español
- ✅ Patrón de acumulación de errores (no lanza excepciones)
- ✅ API JSON robusta para procesar código remotamente
- ✅ Manejo de archivo (crear, abrir, guardar)
- ✅ Soporte para múltiples reportes simultáneos
- ✅ Previsualizaciones de imágenes en modal
- ✅ Indicador de posición del cursor (Ln X, Col Y)
