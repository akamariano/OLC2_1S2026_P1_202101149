/* ================================================================
   ESTADO GLOBAL
   ================================================================ */
let lastResult  = null;   // Último resultado del servidor
let currentFile = 'sin_titulo.golampi';

/* ================================================================
   REFERENCIAS DOM
   ================================================================ */
const editor      = document.getElementById('codeEditor');
const consoleOut  = document.getElementById('consoleOutput');
const errorsOut   = document.getElementById('errorsOutput');
const symbolsOut  = document.getElementById('symbolsOutput');
const errorBadge  = document.getElementById('errorBadge');
const fileNameEl  = document.getElementById('fileName');
const editorLabel = document.getElementById('editorLabel');
const cursorPos   = document.getElementById('cursorPos');
const fileInput   = document.getElementById('fileInput');

/* ================================================================
   POSICIÓN DEL CURSOR EN EL EDITOR
   ================================================================ */
editor.addEventListener('keyup', updateCursor);
editor.addEventListener('click', updateCursor);

function updateCursor() {
    const text  = editor.value.substring(0, editor.selectionStart);
    const lines = text.split('\n');
    const ln    = lines.length;
    const col   = lines[lines.length - 1].length + 1;
    cursorPos.textContent = `Ln ${ln}, Col ${col}`;
}

/* ================================================================
   TABS
   ================================================================ */
document.querySelectorAll('.tab').forEach(btn => {
    btn.addEventListener('click', () => switchTab(btn.dataset.tab));
});

function switchTab(name) {
    document.querySelectorAll('.tab').forEach(t =>
        t.classList.toggle('active', t.dataset.tab === name)
    );
    document.querySelectorAll('.tab-content').forEach(t =>
        t.classList.toggle('active', t.id === 'tab-' + name)
    );
}

/* ================================================================
   NUEVO ARCHIVO
   ================================================================ */
document.getElementById('newBtn').addEventListener('click', () => {
    if (editor.value.trim() !== '' &&
        !confirm('¿Crear un nuevo archivo? Se perderán los cambios no guardados.')) return;

    editor.value   = '';
    currentFile    = 'sin_titulo.golampi';
    setFileName(currentFile);
    resetOutput();
});

/* ================================================================
   ABRIR ARCHIVO
   ================================================================ */
document.getElementById('openBtn').addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (ev) => {
        editor.value = ev.target.result;
        currentFile  = file.name;
        setFileName(currentFile);
        resetOutput();
    };
    reader.readAsText(file);
    // Limpiar input para poder abrir el mismo archivo de nuevo
    fileInput.value = '';
});

/* ================================================================
   GUARDAR CÓDIGO
   ================================================================ */
document.getElementById('saveBtn').addEventListener('click', () => {
    saveFile(currentFile, editor.value, 'text/plain');
});

// Atajo Ctrl+S
document.addEventListener('keydown', (e) => {
    if ((e.ctrlKey || e.metaKey) && e.key === 's') {
        e.preventDefault();
        saveFile(currentFile, editor.value, 'text/plain');
    }
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('runBtn').click();
    }
});

/* ================================================================
   EJECUTAR
   ================================================================ */
document.getElementById('runBtn').addEventListener('click', async () => {
    consoleOut.innerHTML  = '<span class="muted">Analizando…</span>';
    errorsOut.innerHTML   = '';
    symbolsOut.innerHTML  = '';
    errorBadge.classList.add('hidden');
    setReportStatus('output',  'Ejecutando…', 'running');
    setReportStatus('errors',  'Analizando…', 'running');
    setReportStatus('symbols', 'Analizando…', 'running');
    setReportStatus('ast',     'Generando…',  'running');
    disableDownloads(true);

    try {
        const response = await fetch('analyze.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ code: editor.value })
        });

        lastResult = await response.json();

        /* ---- CONSOLA ---- */
        if (lastResult.success) {
            const out = lastResult.output || 'Sin salida';
            consoleOut.innerHTML =
                '<span class="success">✓ Análisis exitoso</span>\n\n' +
                escHtml(out);
            setReportStatus('output', `${out.split('\n').filter(Boolean).length} líneas`, 'ok');
        } else {
            consoleOut.innerHTML =
                '<span class="error">✗ Se encontraron errores. Revisa la pestaña Errores.</span>';
            setReportStatus('output', 'Sin ejecución', 'none');
            switchTab('errors');
        }

        /* ---- ERRORES ---- */
        renderErrors(lastResult.errors || []);
        const ne = (lastResult.errors || []).length;
        setReportStatus('errors', ne === 0 ? 'Sin errores ✓' : `${ne} error(es)`, ne === 0 ? 'ok' : 'err');

        /* ---- SÍMBOLOS ---- */
        renderSymbols(lastResult.symbols || {});
        const ns = ((lastResult.symbols || {}).variables || []).length;
        setReportStatus('symbols', `${ns} símbolo(s)`, 'ok');

        /* ---- IMÁGENES ---- */
        updateCardImage('errors',  lastResult.img_errors,  'dl-errors',  'preview-errors');
        updateCardImage('symbols', lastResult.img_symbols, 'dl-symbols', 'preview-symbols');
        updateCardImage('ast',     lastResult.img_ast,     'dl-ast',     'preview-ast');

        /* ---- HABILITAR DESCARGAS ---- */
        disableDownloads(false);

    } catch (err) {
        consoleOut.innerHTML = `<span class="error">Error de conexión: ${err.message}</span>`;
        setReportStatus('output',  'Error', 'err');
        setReportStatus('errors',  'Error', 'err');
        setReportStatus('symbols', 'Error', 'err');
        setReportStatus('ast',     'Error', 'err');
    }
});

/* ================================================================
   LIMPIAR
   ================================================================ */
document.getElementById('clearBtn').addEventListener('click', resetOutput);

function resetOutput() {
    lastResult = null;
    consoleOut.innerHTML  = 'Listo.';
    errorsOut.innerHTML   = '<p class="placeholder">No se han detectado errores.</p>';
    symbolsOut.innerHTML  = '<p class="placeholder">Ejecuta el código para ver la tabla de símbolos.</p>';
    errorBadge.classList.add('hidden');
    setReportStatus('output',  'Sin ejecutar', 'none');
    setReportStatus('errors',  'Sin ejecutar', 'none');
    setReportStatus('symbols', 'Sin ejecutar', 'none');
    setReportStatus('ast',     'Sin ejecutar', 'none');
    disableDownloads(true);
}

/* ================================================================
   DESCARGAS
   ================================================================ */
document.getElementById('dl-output').addEventListener('click', () => {
    if (!lastResult) return;
    const content = lastResult.output || 'Sin salida';
    saveFile(baseName() + '_output.txt', content, 'text/plain');
});

document.getElementById('preview-errors').addEventListener('click', () =>
    openPreview(lastResult?.img_errors, 'Reporte de Errores'));
document.getElementById('preview-symbols').addEventListener('click', () =>
    openPreview(lastResult?.img_symbols, 'Tabla de Símbolos'));
document.getElementById('preview-ast').addEventListener('click', () =>
    openPreview(lastResult?.img_ast, 'Árbol Sintáctico'));

document.getElementById('dl-errors').addEventListener('click', () => {
    if (!lastResult?.img_errors) return;
    saveBase64Jpg(baseName() + '_errores.jpg', lastResult.img_errors);
});

document.getElementById('dl-symbols').addEventListener('click', () => {
    if (!lastResult?.img_symbols) return;
    saveBase64Jpg(baseName() + '_simbolos.jpg', lastResult.img_symbols);
});

document.getElementById('dl-ast').addEventListener('click', () => {
    if (!lastResult?.img_ast) return;
    saveBase64Jpg(baseName() + '_ast.jpg', lastResult.img_ast);
});


/* ================================================================
   RENDER: TABLA DE ERRORES
   ================================================================ */
function renderErrors(errors) {
    if (!errors || errors.length === 0) {
        errorsOut.innerHTML = '<p class="placeholder">No se han detectado errores.</p>';
        errorBadge.classList.add('hidden');
        return;
    }

    errorBadge.textContent = errors.length;
    errorBadge.classList.remove('hidden');

    let html = `
        <table class="report-table">
            <thead>
                <tr><th>#</th><th>Tipo</th><th>Descripción</th><th>Línea</th><th>Columna</th></tr>
            </thead>
            <tbody>
    `;
    errors.forEach((err, i) => {
        const cls = err.type === 'Léxico'     ? 'badge-lexic'
                  : err.type === 'Sintáctico'  ? 'badge-syntax'
                  : err.type === 'Semántico'   ? 'badge-semantic'
                  : 'badge-other';
        html += `<tr>
            <td class="center">${i+1}</td>
            <td class="center"><span class="type-badge ${cls}">${escHtml(err.type)}</span></td>
            <td>${escHtml(err.description)}</td>
            <td class="center">${err.line > 0 ? err.line : '—'}</td>
            <td class="center">${err.column > 0 ? err.column : '—'}</td>
        </tr>`;
    });
    html += '</tbody></table>';
    errorsOut.innerHTML = html;
}

/* ================================================================
   RENDER: TABLA DE SÍMBOLOS
   ================================================================ */
function renderSymbols(symbols) {
    if (!symbols || (!symbols.functions && !symbols.variables)) {
        symbolsOut.innerHTML = '<p class="placeholder">Sin símbolos.</p>';
        return;
    }

    let rows = [];

    if (symbols.functions) {
        Object.values(symbols.functions).forEach(f => {
            const ret    = f.returnTypes && f.returnTypes.length > 0 ? f.returnTypes.join(', ') : '—';
            const params = f.params && f.params.length > 0
                ? f.params.map(p => `${p.name}: ${p.type}`).join(', ')
                : '—';
            rows.push({
                name:   f.name,
                type:   'función',
                scope:  'global',
                value:  params !== '—' ? `(${params}) → ${ret}` : `() → ${ret}`,
                line:   f.line   || '—',
                column: f.column || '—',
            });
        });
    }

    if (symbols.variables) {
        symbols.variables.forEach(v => {
            rows.push({
                name:   v.name,
                type:   formatType(v.type),
                scope:  v.scope || 'global',
                value:  formatValue(v.value, v.type),
                line:   v.line   > 0 ? v.line   : '—',
                column: v.column > 0 ? v.column : '—',
            });
        });
    }

    if (rows.length === 0) {
        symbolsOut.innerHTML = '<p class="placeholder">Sin símbolos declarados.</p>';
        return;
    }

    let html = `
        <table class="report-table">
            <thead>
                <tr><th>Identificador</th><th>Tipo</th><th>Ámbito</th><th>Valor</th><th>Línea</th><th>Columna</th></tr>
            </thead>
            <tbody>
    `;
    rows.forEach(r => {
        html += `<tr>
            <td><code>${escHtml(r.name)}</code></td>
            <td>${escHtml(r.type)}</td>
            <td><span class="scope-label">${escHtml(r.scope)}</span></td>
            <td class="value-cell">${escHtml(String(r.value))}</td>
            <td class="center">${r.line}</td>
            <td class="center">${r.column}</td>
        </tr>`;
    });
    html += '</tbody></table>';
    symbolsOut.innerHTML = html;
}

/* ================================================================
   HELPERS DE REPORTES
   ================================================================ */
function setReportStatus(id, text, state) {
    const el = document.getElementById('status-' + id);
    if (!el) return;
    el.textContent = text;
    el.className = 'report-status status-' + state;
}

function disableDownloads(disabled) {
    ['dl-output','dl-errors','dl-symbols','dl-ast',
     'preview-errors','preview-symbols','preview-ast'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.disabled = disabled;
    });
}

function setFileName(name) {
    currentFile        = name;
    fileNameEl.textContent  = name;
    editorLabel.textContent = '📄 ' + name;
    document.title     = 'Golampi — ' + name;
}

function baseName() {
    return currentFile.replace(/\.[^.]+$/, '');
}

/* ================================================================
   HELPERS GENÉRICOS
   ================================================================ */
function saveFile(filename, content, mimeType) {
    const blob = new Blob([content], { type: mimeType });
    const url  = URL.createObjectURL(blob);
    const a    = document.createElement('a');
    a.href     = url;
    a.download = filename;
    a.click();
    URL.revokeObjectURL(url);
}

function saveBase64Jpg(filename, b64) {
    const bin  = atob(b64);
    const arr  = new Uint8Array(bin.length);
    for (let i = 0; i < bin.length; i++) arr[i] = bin.charCodeAt(i);
    const blob = new Blob([arr], { type: 'image/jpeg' });
    const url  = URL.createObjectURL(blob);
    const a    = document.createElement('a');
    a.href     = url;
    a.download = filename;
    a.click();
    URL.revokeObjectURL(url);
}

function updateCardImage(reportId, b64, dlBtnId, previewBtnId) {
    const dlBtn      = document.getElementById(dlBtnId);
    const previewBtn = document.getElementById(previewBtnId);
    const thumb      = document.getElementById('thumb-' + reportId);

    if (b64) {
        if (dlBtn)      dlBtn.disabled      = false;
        if (previewBtn) previewBtn.disabled = false;
        if (thumb) {
            thumb.src   = 'data:image/jpeg;base64,' + b64;
            thumb.style.display = 'block';
        }
        setReportStatus(reportId, 'Imagen lista ✓', 'ok');
    } else {
        if (dlBtn)      dlBtn.disabled      = true;
        if (previewBtn) previewBtn.disabled = true;
        setReportStatus(reportId, 'No disponible', 'none');
    }
}

/* Modal de preview */
function openPreview(b64, title) {
    if (!b64) return;
    const existing = document.getElementById('img-modal');
    if (existing) existing.remove();

    const modal = document.createElement('div');
    modal.id    = 'img-modal';
    modal.innerHTML = `
        <div class="modal-backdrop" id="modal-backdrop">
            <div class="modal-box">
                <div class="modal-header">
                    <span>${title}</span>
                    <button class="modal-close" id="modal-close">✕</button>
                </div>
                <div class="modal-body">
                    <img src="data:image/jpeg;base64,${b64}" alt="${title}">
                </div>
            </div>
        </div>
    `;
    document.body.appendChild(modal);

    document.getElementById('modal-close').addEventListener('click', () => modal.remove());
    document.getElementById('modal-backdrop').addEventListener('click', (e) => {
        if (e.target.id === 'modal-backdrop') modal.remove();
    });
}

function escHtml(str) {
    return String(str)
        .replace(/&/g,  '&amp;')
        .replace(/</g,  '&lt;')
        .replace(/>/g,  '&gt;')
        .replace(/"/g,  '&quot;');
}

function formatType(type) {
    if (!type) return '—';
    if (type.startsWith('array[')) return 'arreglo';
    if (type.startsWith('ptr:'))   return 'puntero → ' + type.slice(4);
    const map = { int:'entero', float:'flotante', string:'cadena', bool:'booleano', rune:'rune', unknown:'desconocido' };
    return map[type] || type;
}

function formatValue(value, type) {
    if (value === null || value === undefined) return '—';
    if (Array.isArray(value)) return '{' + value.flat(Infinity).join(', ') + '}';
    if (typeof value === 'boolean') return value ? 'true' : 'false';
    if (typeof value === 'string' && type === 'string') return `"${value}"`;
    return String(value);
}