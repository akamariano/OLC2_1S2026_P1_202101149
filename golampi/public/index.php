<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Golampi Compiler</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Input oculto para abrir archivos -->
<input type="file" id="fileInput" accept=".golampi,.go,.txt" style="display:none">

<div class="container">

    <header>
        <div class="header-left">
            <h1>Golampi Compiler</h1>
            <span id="fileName" class="file-name">sin_titulo.golampi</span>
        </div>
        <div class="toolbar">
            <button class="tool-btn" id="newBtn"   title="Nuevo archivo">
                <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14,2 14,8 20,8"/></svg>
                Nuevo
            </button>
            <button class="tool-btn" id="openBtn"  title="Abrir archivo">
                <svg viewBox="0 0 24 24"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                Abrir
            </button>
            <button class="tool-btn" id="saveBtn"  title="Guardar código">
                <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17,21 17,13 7,13 7,21"/><polyline points="7,3 7,8 15,8"/></svg>
                Guardar
            </button>
            <div class="toolbar-sep"></div>
            <button class="tool-btn primary" id="runBtn" title="Compilar (Ctrl+Enter)">
                <svg viewBox="0 0 24 24"><polyline points="16,18 22,12 16,6"/><polyline points="8,6 2,12 8,18"/></svg>
                Compilar
            </button>
            <button class="tool-btn danger" id="clearBtn" title="Limpiar consola">
                <svg viewBox="0 0 24 24"><polyline points="3,6 5,6 21,6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                Limpiar
            </button>
        </div>
    </header>

    <main>

        <!-- EDITOR -->
        <section class="editor-section">
            <div class="section-header">
                <span id="editorLabel">📄 sin_titulo.golampi</span>
                <span id="cursorPos" class="cursor-pos">Ln 1, Col 1</span>
            </div>
            <div class="editor-wrapper">
                <div id="lineNumbers" class="line-numbers">1</div>
                <textarea id="codeEditor" spellcheck="false">func main() {
    x := 5
    y := 10
    z := x + y
    fmt.Println(z)
}</textarea>
            </div>
        </section>

        <!-- PANEL DERECHO -->
        <section class="output-section">

            <div class="tabs">
                <button class="tab active" data-tab="console">
                    <svg viewBox="0 0 24 24"><polyline points="4,17 10,11 4,5"/><line x1="12" y1="19" x2="20" y2="19"/></svg>
                    Consola
                </button>
                <button class="tab" data-tab="errors">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    Errores
                    <span id="errorBadge" class="badge hidden">0</span>
                </button>
                <button class="tab" data-tab="symbols">
                    <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                    Símbolos
                </button>
                <button class="tab" data-tab="reports">
                    <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14,2 14,8 20,8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10,9 9,9 8,9"/></svg>
                    Reportes
                </button>
            </div>

            <!-- CONSOLA ARM64 -->
            <div id="tab-console" class="tab-content active">
                <div class="console-header">Consola — Código ARM64 Generado</div>
                <div id="consoleOutput" class="asm-output">Listo.</div>
            </div>

            <!-- ERRORES -->
            <div id="tab-errors" class="tab-content">
                <div id="errorsOutput">
                    <p class="placeholder">No se han detectado errores.</p>
                </div>
            </div>

            <!-- TABLA DE SÍMBOLOS -->
            <div id="tab-symbols" class="tab-content">
                <div id="symbolsOutput">
                    <p class="placeholder">Ejecuta el código para ver la tabla de símbolos.</p>
                </div>
            </div>

            <!-- REPORTES -->
            <div id="tab-reports" class="tab-content">
                <div class="reports-panel">

                    <div class="reports-grid">

                        <!-- ARM64 -->
                        <div class="report-card" id="card-arm64">
                            <div class="report-card-icon arm64-icon">
                                <svg viewBox="0 0 24 24"><polyline points="16,18 22,12 16,6"/><polyline points="8,6 2,12 8,18"/></svg>
                            </div>
                            <div class="report-card-info">
                                <h3>Código ARM64</h3>
                                <p>Ensamblador AArch64 generado por el compilador</p>
                                <span class="report-status" id="status-arm64">Sin compilar</span>
                            </div>
                            <button class="download-btn" id="dl-arm64" disabled>
                                <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7,10 12,15 17,10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                Descargar .s
                            </button>
                        </div>

                        <!-- ERRORES -->
                        <div class="report-card" id="card-errors">
                            <div class="report-card-icon errors-icon">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            </div>
                            <div class="report-card-info">
                                <h3>Reporte de Errores</h3>
                                <p>Tabla de errores léxicos, sintácticos y semánticos</p>
                                <span class="report-status" id="status-errors">Sin ejecutar</span>
                            </div>
                            <div class="card-thumb-wrap">
                                <img id="thumb-errors" class="card-thumb" style="display:none" alt="preview errores">
                            </div>
                            <div class="card-actions">
                                <button class="preview-btn" id="preview-errors" disabled>
                                    <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Ver
                                </button>
                                <button class="download-btn" id="dl-errors" disabled>
                                    <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7,10 12,15 17,10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                    Descargar .jpg
                                </button>
                            </div>
                        </div>

                        <!-- SÍMBOLOS -->
                        <div class="report-card" id="card-symbols">
                            <div class="report-card-icon symbols-icon">
                                <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                            </div>
                            <div class="report-card-info">
                                <h3>Tabla de Símbolos</h3>
                                <p>Identificadores, tipos, ámbitos y ubicaciones</p>
                                <span class="report-status" id="status-symbols">Sin ejecutar</span>
                            </div>
                            <div class="card-thumb-wrap">
                                <img id="thumb-symbols" class="card-thumb" style="display:none" alt="preview símbolos">
                            </div>
                            <div class="card-actions">
                                <button class="preview-btn" id="preview-symbols" disabled>
                                    <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Ver
                                </button>
                                <button class="download-btn" id="dl-symbols" disabled>
                                    <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7,10 12,15 17,10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                    Descargar .jpg
                                </button>
                            </div>
                        </div>

                        <!-- AST -->
                        <div class="report-card" id="card-ast">
                            <div class="report-card-icon ast-icon">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="5" r="2"/><circle cx="5" cy="19" r="2"/><circle cx="19" cy="19" r="2"/><line x1="12" y1="7" x2="5" y2="17"/><line x1="12" y1="7" x2="19" y2="17"/></svg>
                            </div>
                            <div class="report-card-info">
                                <h3>Árbol Sintáctico (AST)</h3>
                                <p>Grafo del árbol de análisis sintáctico</p>
                                <span class="report-status" id="status-ast">Sin ejecutar</span>
                            </div>
                            <div class="card-thumb-wrap">
                                <img id="thumb-ast" class="card-thumb" style="display:none" alt="preview AST">
                            </div>
                            <div class="card-actions">
                                <button class="preview-btn" id="preview-ast" disabled>
                                    <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Ver
                                </button>
                                <button class="download-btn" id="dl-ast" disabled>
                                    <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7,10 12,15 17,10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                    Descargar .jpg
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </main>

</div>

<script src="script.js"></script>
</body>
</html>