# Documentación Técnica
| Nombre | Carnet|
|----------|-------|
| Mariano Roberto Rac Noguera| 202101149 |

---

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
