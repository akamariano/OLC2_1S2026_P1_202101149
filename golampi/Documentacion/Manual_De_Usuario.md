# Manual de Usuario - Golampi Interpreter
| Nombre | Carnet|
|----------|-------|
| Mariano Roberto Rac Noguera| 202101149 |

## Índice
1. [Requisitos del Sistema](#requisitos-del-sistema)
2. [Instalación](#instalación)
3. [Inicio del Servidor](#inicio-del-servidor)
4. [Interfaz de Usuario](#interfaz-de-usuario)
5. [Crear, Editar y Ejecutar Código](#crear-editar-y-ejecutar-código)
6. [Interpretación de Reportes](#interpretación-de-reportes)
7. [Ejemplos de Código](#ejemplos-de-código)
8. [Solución de Problemas](#solución-de-problemas)

---

## Requisitos del Sistema

Antes de instalar y usar Golampi, asegúrate de tener lo siguiente:

### Software Obligatorio

| Componente | Versión Mínima | Descripción |
|-----------|-----------------|-------------|
| **PHP** | 7.4+ | Lenguaje de programación backend |
| **Composer** | 2.0+ | Gestor de dependencias PHP |
| **PHP CLI** | 7.4+ | Interfaz de línea de comandos de PHP |

### Software Opcional

| Componente | Uso |
|-----------|-----|
| **Git** | Control de versiones (recomendado) |
| **Visual Studio Code** | Cliente recomendado para editar archivos |

### Navegador Web

Se recomienda usar navegadores modernos:
-  Chrome/Chromium 90+
-  Firefox 88+
- Safari 14+
-  Edge 90+

### Requisitos del Equipo

- **RAM**: Mínimo 512 MB (1 GB recomendado)
- **Disco**: 200 MB de espacio libre
- **Conexión**: Localhost (no requiere internet)

---

## Instalación

### Paso 1: Descargar PHP y Composer

#### En Ubuntu/Debian:
```bash
# Actualizar lista de paquetes
sudo apt update

# Instalar PHP y extensiones necesarias
sudo apt install php php-cli php-json php-mbstring composer

# Verificar instalación
php -v
composer -v
```

#### En Windows:
1. Descargar PHP desde [php.net](https://www.php.net/downloads.php)
2. Descargar Composer desde [getcomposer.org](https://getcomposer.org/)
3. Ejecutar instaladores y seguir las instrucciones
4. Verificar en CMD:
```cmd
php -v
composer -v
```

#### En macOS:
```bash
# Usando Homebrew
brew install php composer

# Verificar instalación
php -v
composer -v
```

### Paso 2: Descargar el Proyecto Golampi

Existen dos opciones:

**Opción A: Usando Git** (recomendado)
```bash
git clone <url-del-repositorio>
cd OLC2_1S2026_P1_202101149/golampi
```

**Opción B: Descarga directa**
1. Descargar archivo ZIP del proyecto
2. Extraer en una carpeta deseada
3. Abrir terminal y navegar a `golampi/`

### Paso 3: Instalar Dependencias

```bash
# Navegar a la carpeta del proyecto
cd /ruta/a/golampi

# Instalar dependencias con Composer
composer install
```

Este comando descargará todas las dependencias necesarias, incluyendo el runtime de ANTLR4 para PHP.

### Verificación de Instalación

```bash
# Debe existir la carpeta vendor/
ls -la vendor/

# Debe contener antlr4-php-runtime
ls vendor/antlr/
```

---

## Inicio del Servidor

### Comando para Iniciar

```bash
php -S localhost:8000 -t public
```

**Explicación de parámetros:**

| Parámetro | Significado |
|-----------|-------------|
| `php` | Comando de PHP |
| `-S` | Flag para iniciar servidor web integrado |
| `localhost:8000` | **Host**: localhost (127.0.0.1), **Puerto**: 8000 |
| `-t public` | Directorio raíz ("t" = target). Servir archivos desde `public/` |

### Ejecución Paso a Paso

1. **Abrir terminal/CMD**
2. **Navegar al directorio del proyecto:**
   ```bash
   cd /path/to/golampi
   ```
3. **Ejecutar comando:**
   ```bash
   php -S localhost:8000 -t public
   ```
4. **Resultado esperado:**
   ```
   Development Server (PHP 7.4.3)
   Listening on http://localhost:8000
   Press Ctrl+C to quit
   ```

### Acceder a la Aplicación

Abrir navegador web e ir a:
```
http://localhost:8000
```

Deberías ver la interfaz de editor de Golampi.

### Detener el Servidor

Presionar `Ctrl+C` en la terminal donde está corriendo el servidor.

---

## Interfaz de Usuario

### Componentes Principales

```
┌──────────────────────────────────────────────────────────────────────┐
│                            HEADER                                    │
│  Golampi    [sin_titulo.golampi] [Ln 1, Col 1]   [Toolbar botones] │
├────────────────────────┬──────────────────────────────────────────┤
│                        │                                          │
│    EDITOR              │      PANEL DE PESTAÑAS                │
│    (código Golampi)    │    ┌───────┬───────┬───────┬──────────┐ │
│                        │    │Consola│Errores│Símbol.│ Reportes │ │
│                        │    └───────┴───────┴───────┴──────────┘ │
│                        │                                          │
│ Numeración líneas      │     CONTENIDO DINÁMICO SEGÚN PESTAÑA    │
│ Indicador posición     │     (Se actualiza según selección)      │
│                        │                                          │
└────────────────────────┴──────────────────────────────────────────┘
```

### Barra de Herramientas (Toolbar)

| Botón | Atajo | Función |
|-------|-------|---------|
| **Nuevo** | - | Crear archivo nuevo en blanco |
| **Abrir** | - | Abrir archivo `.golampi` existente |
| **Guardar** | - | Guardar código a archivo local |
| **Ejecutar** | Ctrl+Enter | Compilar, analizar e interpretar código |
| **Limpiar** | - | Limpiar panel de consola |

### Paneles Principales

#### 1. Editor (Izquierda)
- **Área de entrada** de código Golampi
- **Coloreado por sintaxis** para mejor lectura
- **Numeración de líneas** automática
- **Indicador de posición** del cursor (Ln X, Col Y)
- **Soporta** archivos `.golampi`, `.go` y `.txt`

#### 2. Panel de Pestañas (Derecha - Dinámico)

El panel derecho contiene 4 pestañas que se activan según la fase de análisis:

**a) Pestaña "Consola"**
   - Salida de ejecución del programa
   - Resultado de `println()` y similares
   - Mensajes emergentes del intérprete
   - Inicial: "Listo."

**b) Pestaña "Errores"**
   - Lista de errores léxicos, sintácticos y semánticos
   - Línea y columna exacta del error
   - Descripción legible en español
   - Badge con contador de errores
   - Mensaje placeholder si no hay errores

**c) Pestaña "Símbolos"**
   - Tabla de símbolos (variables, funciones, constantes)
   - Información por símbolo: Nombre, Tipo, Scope, Valor
   - Se actualiza después de cada ejecución
   - Placeholder si no se ha ejecutado

**d) Pestaña "Reportes"** (NUEVA)
   - Panel avanzado con 4 tarjetas descargables:
     - **Resultado de Ejecución**: Salida en texto plano (.txt)
     - **Reporte de Errores**: Tabla visual en imagen (.jpg) con preview
     - **Tabla de Símbolos**: Tabla visual en imagen (.jpg) con preview
     - **Árbol Sintáctico**: Grafo AST en imagen (.jpg) con preview
   - Botones de previsualización antes de descargar
   - Estado indicador: "Sin ejecutar", "Completado", "Con errores"

---

## Crear, Editar y Ejecutar Código

### 1. Crear un Archivo Nuevo

```
1. Clic en botón "Nuevo"
   → Se abre interfaz en blanco
   
2. El nombre por defecto es "sin_titulo.golampi"
   → Se actualiza cuando guardas
```

### 2. Escribir Código Golampi

Ejemplo básico en el editor:

```go
func main() {
    var x int = 10;
    var y int = 20;
    var suma int = x + y;
}
```

### 3. Ejecutar el Código

**Opción A: Usando el botón**
```
Clic en botón "Ejecutar" (play/triángulo)
```

**Opción B: Usando atajo de teclado**
```
Ctrl + Enter
```

### 4. Interpretar Resultados

Después de ejecutar, aparecerán:

- **✅ Sin errores**: 
  - Panel "Salida" mostrará resultado
  - Tabla de símbolos poblada

- **❌ Con errores**:
  - Panel "Errores" mostrará detalles
  - Número de línea y columna donde ocurrió
  - Descripción del problema

### 5. Guardar el Código

```
Clic en botón "Guardar"
→ Se descarga archivo .golampi a descargas
→ El nombre en la interfaz se actualiza
```

### 6. Abrir Archivo Existente

```
1. Clic en botón "Abrir"
2. Seleccionar archivo .golampi o .go
3. El contenido se carga en el editor
4. El nombre se actualiza en la interfaz
```

### 7. Limpiar la Consola

```
Clic en botón "Limpiar"
→ Borra contenido del panel de consola
→ Mantiene el código en el editor
→ Los reportes permanecen disponibles en la pestaña "Reportes"
```

### 8. Descargar Reportes (Funcionalidad Nueva)

**Acceda a la pestaña "Reportes"** después de ejecutar código:

```
1. Clic en pestaña "Reportes"
   → Se abre panel con 4 tarjetas descargables

2. Para cada reporte:
   a) Clic en botón "Ver" (preview)
      → Se muestra imagen en ventana flotante
   
   b) Clic en botón "Descargar"
      → Se descarga archivo (.txt o .jpg)

3. Los reportes disponibles dependen del estado:
   ✅ Resultado de Ejecución: Siempre (si hay salida)
   ⚠️  Reporte de Errores: Solo si hay errores
   📊 Tabla de Símbolos: Cuando hay símbolos
   🌳 Árbol Sintáctico: Cuando parsing es exitoso
```

**Ejemplo de descarga:**
```
- resultado_ejecucion.txt
- reporte_errores.jpg
- tabla_simbolos.jpg
- arbol_sintactico.jpg
```

---

## Interpretación de Reportes

### Flujo de Análisis y Reportes

El proceso de ejecución genera reportes en diferentes formatos:

```
CÓDIGO → Lexing → Tokens → Parsing → AST
                                     ↓
          ┌─────────────────────────┼─────────────────────────┐
          ↓                         ↓                         ↓
    Análisis Semántico      Generación Reportes      Ejecución
          ↓                         ↓                         ↓
    Tabla Símbolos    JPG AST, Errores, Símbolos        Output
```

### Panel de Reportes (Nueva Funcionalidad)

El panel "Reportes" proporciona 4 tarjetas independientes:

#### 1. Resultado de Ejecución
- **Contiene**: Salida completa del programa en texto plano
- **Formato**: `.txt`
- **Acciones**:
  - Descargar archivo `.txt`
  - Estado: "Sin ejecutar" → "Completado" o "Con errores"
- **Ejemplo**:
  ```
  15
  30
  45
  ```

#### 2. Reporte de Errores
- **Contiene**: Tabla visual de errores con:
  - Número y tipo de error (Léxico, Sintáctico, Semántico)
  - Descripción legible
  - Línea y columna
- **Formato**: Imagen `.jpg` generada por `ReportGenerator`
- **Acciones**:
  - Vista previa (botón "Ver")
  - Descargar imagen `.jpg`
  - Badge con contador de errores
- **Solo disponible si**: Hay errores en el código
- **Muestra tabla con columnas**:
  ```
  ┌─────────────┬──────────┬────────────────────────────────┬──────┬────────┐
  │ Tipo Error  │ Línea    │ Descripción                    │ Col  │ Token  │
  ├─────────────┼──────────┼────────────────────────────────┼──────┼────────┤
  │ Léxico      │ 3        │ Símbolo no reconocido '@'      │ 15   │ @      │
  │ Sintáctico  │ 5        │ Se esperaba ')' pero obtuve '{' │ 8    │ {      │
  └─────────────┴──────────┴────────────────────────────────┴──────┴────────┘
  ```

#### 3. Tabla de Símbolos
- **Contiene**: Tabla visual con todos los símbolos identificados:
  - Nombre del símbolo
  - Tipo de dato
  - Scope (global, función, bloque)
  - Valor actual
- **Formato**: Imagen `.jpg` generada por `ReportGenerator`
- **Acciones**:
  - Vista previa (botón "Ver")
  - Descargar imagen `.jpg`
- **Actualiza**: Después de cada ejecución correcta
- **Muestra símbolos de**:
  - Variables locales y globales
  - Funciones declaradas
  - Constantes
  - Punteros y arrays

#### 4. Árbol Sintáctico (AST)
- **Contiene**: Grafo visual del árbol de análisis sintáctico
- **Formato**: Imagen `.jpg` generada por `AstGenerator` y `ReportGenerator`
- **Acciones**:
  - Vista previa (botón "Ver")
  - Descargar imagen `.jpg`
- **Siempre generado**: Incluso si hay errores sintácticos parciales
- **Muestra**:
  - Estructura de programa
  - Nodos de declaración de funciones
  - Bloques y statements
  - Expresiones y operadores

### Tabla de Símbolos (Pestaña y Reporte)

#### Pestaña "Símbolos" (Formato Tabla HTML)

```
Nombre   │ Tipo      │ Scope  │ Valor
─────────┼───────────┼────────┼─────────────────────
x        │ int       │ main   │ 42
y        │ string    │ main   │ "Hola Mundo"
ptr      │ *int      │ main   │ (referencia a x)
arr      │ [5]int    │ global │ [1, 2, 3, 4, 5]
fibonacci│ func(int) │ global │ -
main     │ func()    │ global │ -
```

#### Interpretación de Columnas

| Columna | Significado | Ejemplos |
|---------|-------------|----------|
| **Nombre** | Identificador de variable/función | `x`, `fibonacci`, `main` |
| **Tipo** | Tipo de dato o firma de función | `int`, `string`, `*int`, `[5]float`, `func(int)int` |
| **Scope** | Alcance/contexto de declaración | `global`, `main`, `fibonacci`, `if_block_1` |
| **Valor** | Valor actual (variables) o `-` (funciones) | `42`, `"texto"`, `-` |

#### Tipos de Símbolos Registrados

```go
// VARIABLE SIMPLE
Name: x, Type: int, Scope: main, Value: 10

// PUNTERO
Name: ptr, Type: *int, Scope: main, Value: (ref)

// ARRAY
Name: arr, Type: [5]int, Scope: global, Value: -

// FUNCIÓN
Name: fibonacci, Type: func(int)int, Scope: global, Value: -

// CONSTANTE  
Name: PI, Type: const float, Scope: global, Value: 3.14159
```

### Panel de Errores (Pestaña)

Muestra lista interactiva de errores con:

- **Tipo** (badge coloreado)
  - 🔴 Léxico
  - 🟡 Sintáctico
  - 🟠 Semántico
  - 🔵 Interno
- **Descripción** legible en español
- **Ubicación** (Línea:Columna)
- **Clickeable**: Llevarte a la línea en el editor (si está implementado)

### Mensajes de Error Comunes

| Error | Causa | Solución |
|-------|-------|----------|
| "Variable no declarada: x" | Usar variable no creada | Declarar con `var x tipo;` |
| "Función no existe: foo" | Llamar función inexistente | Verificar nombre y que esté declarada |
| "Tipo incompatible" | Asignar tipo incorrecto | Convertir o cambiar tipo |
| "Token no reconocido" | Carácter inválido | Usar caracteres válidos |
| "Se esperaba ';'" | Falta marca de fin | Agregar `;` al final de statement |
| "Break/Continue fuera de bucle" | Usar fuera de loop | Envolver en for o switch |
| "Return tipo incompatible" | Tipo de retorno incorrecto | Cambiar valor retornado |

---

## Ejemplos de Código

### Ejemplo 1: Programa Básico (Hello World)

```go
func main() {
    var mensaje string = "¡Hola Mundo!";
    println(mensaje);
}
```

**Salida Esperada:**
```
¡Hola Mundo!
```

**Tabla de Símbolos:**
```
Nombre   │ Tipo      │ Scope │ Valor
─────────┼───────────┼───────┼─────────────────
mensaje  │ string    │ main  │ ¡Hola Mundo!
main     │ func()    │ global│ -
```

### Ejemplo 2: Variables y Operaciones

```go
func main() {
    var a int = 15;
    var b int = 8;
    var suma int = a + b;
    var resta int = a - b;
    var multiplicacion int = a * b;
    
    println(suma);
    println(resta);
    println(multiplicacion);
}
```

**Salida Esperada:**
```
23
7
120
```

### Ejemplo 3: Condicionales

```go
func main() {
    var edad int = 18;
    
    if edad >= 18 {
        println("Eres mayor de edad");
    } else {
        println("Eres menor de edad");
    }
}
```

**Salida Esperada:**
```
Eres mayor de edad
```

### Ejemplo 4: Bucles

```go
func main() {
    var i int = 1;
    
    for i <= 5 {
        println(i);
        i = i + 1;
    }
}
```

**Salida Esperada:**
```
1
2
3
4
5
```

### Ejemplo 5: Funciones y Recursividad

```go
func factorial(n int) int {
    if n <= 1 {
        return 1;
    }
    return n * factorial(n - 1);
}

func main() {
    var resultado int = factorial(5);
    println(resultado);
}
```

**Salida Esperada:**
```
120
```

**Tabla de Símbolos:**
```
Nombre    │ Tipo           │ Scope  │ Valor
──────────┼────────────────┼────────┼──────
factorial │ func(int)int   │ global │ -
n         │ int            │ fct    │ 1
resultado │ int            │ main   │ 120
main      │ func()         │ global │ -
```

### Ejemplo 6: Arrays

```go
func main() {
    var numeros [3]int = [3]int{10, 20, 30};
    var i int = 0;
    
    for i < 3 {
        println(numeros[i]);
        i = i + 1;
    }
}
```

**Salida Esperada:**
```
10
20
30
```

### Ejemplo 7: Punteros

```go
func main() {
    var x int = 42;
    var ptr *int = &x;
    println(*ptr);
}
```

**Salida Esperada:**
```
42
```

### Ejemplo 8: Switch

```go
func main() {
    var opcion int = 2;
    
    switch opcion {
        case 1:
            println("Opción 1");
            break;
        case 2:
            println("Opción 2");
            break;
        default:
            println("Opción inválida");
    }
}
```

**Salida Esperada:**
```
Opción 2
```

### Ejemplo 9: Múltiples Retornos

```go
func dividir(a int, b int) (int, int) {
    var cociente int = a / b;
    var residuo int = a % b;
    return cociente, residuo;
}

func main() {
    var q int;
    var r int;
    q, r = dividir(17, 5);
    
    println(q);
    println(r);
}
```

**Salida Esperada:**
```
3
2
```

### Ejemplo 10: Constantes

```go
func main() {
    const PI float = 3.14159;
    const RADIO float = 5.0;
    var area float = PI * RADIO * RADIO;
    println(area);
}
```

**Salida Esperada:**
```
78.53975
```

---

## Solución de Problemas

### Problema: "Servidor no inicia"

**Síntoma:**
```bash
$ php -S localhost:8000 -t public
Error: Cannot find server configuration
```

**Causas y Soluciones:**

1. **No estás en la carpeta correcta**
   ```bash
   # Solución: navega a la carpeta golampi
   cd /path/to/golampi
   ```

2. **Carpeta `public/` no existe**
   ```bash
   # Verifica que exista
   ls -la public/
   ```

3. **Puerto 8000 en uso**
   ```bash
   # Solución: usa otro puerto
   php -S localhost:8001 -t public
   ```

### Problema: "Página en blanco al acceder"

**Síntoma:**
Navegador muestra página en blanco.

**Soluciones:**

1. Esperar 5 segundos a que cargue
2. Refrescar la página (F5 o Ctrl+R)
3. Limpiar caché: Ctrl+Shift+Delete
4. Revisar consola del navegador (F12 → Console)

### Problema: "Composer command not found"

**Síntoma:**
```bash
$ composer install
composer: command not found
```

**Soluciones:**

1. **En Linux/Mac:**
   ```bash
   php /usr/local/bin/composer.phar install
   ```

2. **En Windows:**
   - Reinstalar Composer
   - Agregar a PATH manualmente

3. **Verificar instalación:**
   ```bash
   composer -v
   ```

### Problema: Errores de permisos (Linux/Mac)

**Síntoma:**
```
Permission denied
```

**Solución:**
```bash
chmod -R 755 /path/to/golampi
chmod -R 755 /path/to/golampi/public
```

### Problema: Código no se ejecuta (sin errores visibles)

**Causas:**

1. **No hay salida en el código**
   - Solución: Agregar `println()` 

2. **Función `main()` no existe**
   ```go
   func main() {  // OBLIGATORIO
       // ...
   }
   ```

3. **Errores de caché del navegador**
   - Solución: Limpiar caché y refrescar

### Problema: "Syntax Error" sin detalles claros

**Pasos de debug:**

1. Revisar número de línea exacta del error
2. Verificar caracteres especiales
3. Contar paréntesis, corchetes, llaves
4. Comentar código poco a poco para aislar el error
5. Copiar ejemplo funcional y modificar lentamente

---

## Atajos de Teclado

| Atajo | Función |
|-------|---------|
| **Ctrl+Enter** | Ejecutar código |
| **Ctrl+S** | Guardar archivo |
| **Ctrl+A** | Seleccionar todo |
| **Ctrl+C** | Copiar |
| **Ctrl+V** | Pegar |
| **Ctrl+Z** | Deshacer |
| **Ctrl+Y** | Rehacer |
| **Tab** | Indentar línea |
| **Shift+Tab** | Desindentación |

---

## Descarga de Reportes

### Formato de Archivos Descargados

Los reportes descargados tiene los siguientes nombres:

```
<nombre_archivo>_output.txt       # Salida de ejecución
<nombre_archivo>_errores.jpg      # Tabla de errores
<nombre_archivo>_simbolos.jpg     # Tabla de símbolos
<nombre_archivo>_ast.jpg          # Árbol sintáctico
```

**Ejemplo:**
```
programa_output.txt
programa_errores.jpg
programa_simbolos.jpg
programa_ast.jpg
```

### Integración de Reportes en Documentos

**Uso de imagenes JPG en Word/Google Docs:**
1. Descargar imagen JPG del reporte
2. Insertar → Imagen → Seleccionar archivo JPG
3. Redimensionar según necesario
4. Incluir en documentación

**Inclusión en archivos Markdown:**
```markdown
## Reporte de Errores

![Tabla de Errores](programa_errores.jpg)

## Tabla de Símbolos

![Tabla de Símbolos](programa_simbolos.jpg)

## Árbol Sintáctico

![AST](programa_ast.jpg)
```

---

## Características Avanzadas

### 1. Estado del Análisis

Cada pestaña muestra un indicador de estado:

| Estado | Color | Significado |
|--------|-------|-------------|
| **Sin ejecutar** | Gris | No se ha ejecutado código |
| **Analizando...** | Azul | En proceso de análisis |
| **Completado ✓** | Verde | Análisis exitoso |
| **Errores** | Rojo | Se encontraron problemas |

### 2. Badge de Errores

Un badge rojo en la pestaña "Errores" muestra el número total de errores:

```
[Consola] [Errores] 5 [Símbolos] [Reportes]
                   ↑
            Badge con valor "5"
```

- Solo aparece si hay errores
- Se actualiza automáticamente
- Clickear pestaña para ver detalles

### 3. Información de Cursor

En la esquina derecha del editor se muestra la posición actual:

```
Ln 42, Col 15
↑     ↑
Línea Columna
```

Se actualiza en tiempo real mientras escribes o navegas el código.

---

## Flujo de Uso Recomendado

### Workflow 1: Desarrollo y Debugging

```
1. ESCRIBIR código
   └─ Usa editor con autocompletación mental
   
2. EJECUTAR (Ctrl+Enter)
   └─ Script.js envia código a analyze.php
   
3. REVISAR ERRORES
   ├─ Si hay errores léxicos:
   │  └─ Buscar símbolo no válido
   ├─ Si hay errores sintácticos:
   │  └─ Revisar estructura { } ( ) [ ]
   └─ Si hay errores semánticos:
      └─ Revisar tipos, variables declaradas
   
4. VER TABLA DE SÍMBOLOS
   └─ Verificar variables esperadas
   
5. CORREGIR y repetir desde paso 2

6. DOCUMENTAR (cuando funcione)
   ├─ Descargar output.txt
   ├─ Descargar tabla de símbolos JPG
   ├─ Descargar AST JPG
   └─ Incluir en reporte
```

### Workflow 2: Documentación del Proyecto

```
1. EJECUTAR todos los programas
2. DESCARGAR reportes de cada uno
3. CREAR documento Word/Google Docs
4. INSERTAR imágenes descargadas
5. AÑADIR explicaciones
6. ENTREGAR documento completo
```

---

## Mejoras Recientes

### Version 1.2 (Actual)

✅ **Interfaz Mejorada**
- Diseño dark mode profesional
- Pestañas dinámicas con transiciones suaves
- Indicadores de estado visuales

✅ **Reportes Visuales**
- Generación automática de imágenes JPG
- AST con colores por tipo de nodo
- Tablas de errores formateadas
- Tablas de símbolos con información completa

✅ **Gestión de Archivos**
- Crear archivo nuevo
- Abrir archivo guardado
- Guardar con Ctrl+S
- Nombre de archivo dinámico

✅ **Experiencia de Usuario**
- Indicador de línea:columna
- Atajos de teclado mejorados
- Previos modales de imágenes
- Descargas directas de reportes

---

## Casos de Uso

### Caso 1: Aprender Programación

**Objetivo**: Aprender sintaxis de Golampi

**Pasos:**
1. Copiar ejemplo de esta guía
2. Ejecutar para ver salida
3. Modificar valores y ver cambios
4. Usar tabla de símbolos para entender estado

### Caso 2: Debug de Programa Complejo

**Objetivo**: Encontrar errores en programa

**Pasos:**
1. Escribir programa completo
2. Ejecutar y ver lista de errores
3. Usar pestaña "Errores" para navegar por problemas
4. Consultar "Símbolos" para verificar tipos
5. Corregir uno a uno

### Caso 3: Documentar Solución

**Objetivo**: Crear reporte técnico

**Pasos:**
1. Desarrollo del código (iterativo)
2. Versión final ejecutada sin errores
3. Descargar todos los reportes
4. Crear documento incluyendo:
   - Código fuente (.txt o .golampi)
   - AST (.jpg)
   - Tabla de Símbolos (.jpg)
   - Salida de Ejecución (.txt)
5. Añadir explicaciones en markdown o Word

---

## API para Programadores

Si deseas integrar Golampi en tu propia aplicación:

### Endpoint

```
POST http://localhost:8000/analyze.php
Content-Type: application/json
```

### Ejemplo de Petición

```bash
curl -X POST http://localhost:8000/analyze.php \
  -H "Content-Type: application/json" \
  -d '{"code":"func main() { println(42); }"}'
```

### Ejemplo de JavaScript

```javascript
const code = `
  func fibonacci(n int) int {
    if n <= 1 { return n; }
    return fibonacci(n-1) + fibonacci(n-2);
  }
`;

fetch('/analyze.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({code: code})
})
.then(response => response.json())
.then(result => {
    console.log('Success:', result.success);
    console.log('Output:', result.output);
    console.log('Errors:', result.errors);
    console.log('Symbols:', result.symbols);
    
    // Mostrar imágenes
    const img = new Image();
    img.src = 'data:image/jpeg;base64,' + result.img_ast;
    document.body.appendChild(img);
})
.catch(error => console.error('Error:', error));
```

### Respuesta Completa

```json
{
  "success": true,
  "output": "",
  "errors": [],
  "symbols": {
    "functions": [...],
    "variables": [...]
  },
  "img_ast": "iVBORw0KGgoAAAANS...",
  "img_errors": "iVBORw0KGgoAAAANS...", 
  "img_symbols": "iVBORw0KGgoAAAANS..."
}
```

Para más detalles, ver sección "API JSON" en Documentación Técnica.

---

## Consejos y Buenas Prácticas

### Estilo de Código

1. **Usa indentación de 4 espacios** (o consistente)
2. **Utiliza nombres descriptivos** para variables
3. **Comenta código complejo** (con `//`)
4. **Agrupa funciones relacionadas**
5. **Respeta la convención** del lenguaje
6. **Máximo 80 caracteres por línea** (recomendado)

### Nombres de Variables (Convención Golampi)

```go
// ✅ BUENO
var numberOfUsers int;
var userEmail string;
var isActive bool;

// ❌ EVITAR
var n int;
var u string;
var a bool;
```

### Estructura de Funciones

```go
// ✅ BUENO - clara y documentada
func calculateFactorial(n int) int {
    // Caso base
    if n <= 1 {
        return 1;
    }
    // Caso recursivo
    return n * calculateFactorial(n - 1);
}

// ❌ EVITAR - confuso
func calc(n int) int {
    if (n > 1) return n * calc(n - 1);
    return 1;
}
```

### Depuración

1. **Imprime valores intermedios:**
   ```go
   var resultado int = funcionCompleja(x);
   println(resultado);  // Ver valor
   ```

2. **Usa nombres significativos:**
   ```go
   var suma int;           // Mejor que 's'
   var contador int;       // Mejor que 'c'
   var temperatura float;  // Mejor que 't'
   ```

3. **Comprueba tipos en tabla de símbolos:**
   - Abre pestaña "Símbolos" después de ejecutar
   - Verifica que tipos coincidan con lo esperado

4. **Prueba con funciones simples primero**
   - Antes de escribir lógica compleja
   - Valida que funciones básicas funcionen

5. **Usa tabla de errores:**
   - Primera línea: error más crítico
   - Siguiente: posible causa del primero
   - Arregla de arriba hacia abajo

### Performance

- Para programas largos, evita recursión profunda (más de 1000 niveles)
- Los arrays tienen tamaño fijo, úsalos eficientemente
- Los punteros optimizan memoria en estructuras complejas
- `println()` es relativamente lenta, úsala modéradamente

### Buenas Prácticas de Testing

```go
// PRUEBA 1: Casos normales
func main() {
    var resultado int = fibonacci(5);
    println(resultado);  // Esperado: 5
}

// PRUEBA 2: Casos límite
func main() {
    println(fibonacci(0));   // Esperado: 0
    println(fibonacci(1));   // Esperado: 1
}

// PRUEBA 3: Casos grandes
func main() {
    println(fibonacci(20));  // Verifica rendimiento
}
```

---

## Contacto y Soporte

Si encuentras problemas:

1. **Revisa la documentación técnica** en `Documentacion/Documentacion.md`
2. **Consulta ejemplos** en esta guía (Sección 7)
3. **Verifica errores** en panel de errores (específicos y en orden)
4. **Lee tabla de símbolos** para debug de variables
5. **Prueba con código simple** antes de complejidad
6. **Revisa sección "Solución de Problemas"** (Sección 8)

### Información del Proyecto

- **Desarrollador**: Mariano Roberto Rac Noguera
- **Carnet**: 202101149
- **Institución**: Universidad San Carlos de Guatemala
- **Curso**: Laboratorio de Compiladores 2 (OLC2)
- **Ciclo**: 1S 2026

### Links Útiles

- ANTLR4: https://www.antlr.org/
- Graphviz: https://graphviz.org/
- Go Language: https://golang.org/

---

**Versión del Manual**: 1.2  
**Última Actualización**: Marzo 2026  
**Estado**: Documentación Completa ✓
1. **Usa indentación de 4 espacios** (o consistente)
2. **Utiliza nombres descriptivos** para variables
3. **Comenta código complejo** (con `//`)
4. **Agrupa funciones relacionadas**
5. **Respeta la convención** del lenguaje

### Depuración

1. **Imprime valores intermedios:**
   ```go
   println(variable);  // Ver contenido
   ```

2. **Usa nombres significativos:**
   ```go
   var suma int;      // Mejor que 's'
   var contador int;  // Mejor que 'c'
   ```

3. **Comprueba tipos:**
   ```go
   // Verifica tabla de símbolos para valores esperados
   ```

4. **Prueba con funciones simples primero**

### Performance

- Para programas largos, evita recursión profunda
- Los arrays tienen tamaño fijo, úsalos eficientemente
- Los punteros optimizan memoria en estructuras complejas

---

## Contacto y Soporte

Si encuentras problemas:

1. Revisa la documentación técnica en `Documentacion/`
2. Consulta ejemplos en esta guía
3. Verifica errores en panel de errores
4. Lee tabla de símbolos para debug

---

**Autor:** Mariano Roberto Rac Noguera  
**Carnet:** 202101149  
**Última Actualización:** Marzo 2026
