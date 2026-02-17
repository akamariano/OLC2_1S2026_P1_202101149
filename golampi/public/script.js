const runBtn = document.getElementById("runBtn");
const clearBtn = document.getElementById("clearBtn");
const editor = document.getElementById("codeEditor");
const consoleOutput = document.getElementById("consoleOutput");

runBtn.addEventListener("click", async () => {

    consoleOutput.innerHTML = "Analizando...\n";

    try {
        const response = await fetch("analyze.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ code: editor.value })
        });

        const result = await response.json();

        consoleOutput.innerHTML = "";

        if (result.success) {

    consoleOutput.innerHTML = `
        <span class="success">Análisis exitoso</span>\n\n
        <strong>Salida:</strong>\n${result.output ?? "Sin salida"}\n\n
        <strong>Tabla de Símbolos:</strong>\n${JSON.stringify(result.symbols, null, 2)}
    `;
            console.log(result);

} else {
    consoleOutput.innerHTML = `<span class="error">${result.error}</span>`;
}


    } catch (error) {
        consoleOutput.innerHTML = `<span class="error">Error de conexión con el servidor</span>`;
    }

});

clearBtn.addEventListener("click", () => {
    consoleOutput.innerHTML = "";
});
