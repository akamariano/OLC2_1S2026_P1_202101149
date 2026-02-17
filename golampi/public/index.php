<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Golampi Interpreter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <header>
        <h1>Golampi Interpreter</h1>
        <div class="buttons">
            <button id="runBtn">Ejecutar</button>
            <button id="clearBtn">Limpiar</button>
        </div>
    </header>

    <main>

        <section class="editor-section">
            <h2>Código</h2>
            <textarea id="codeEditor" spellcheck="false">
func main() {
    x := 5;
    y := 10;
    z := x + y;
}
            </textarea>
        </section>

        <section class="output-section">
            <h2>Consola</h2>
            <div id="consoleOutput"></div>
        </section>

    </main>

</div>

<script src="script.js"></script>
</body>
</html>
