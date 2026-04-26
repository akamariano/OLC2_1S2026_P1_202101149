<?php
header('Content-Type: application/json');

$data    = json_decode(file_get_contents('php://input'), true);
$arm64   = $data['arm64_code'] ?? '';
$timeout = 10;

if (empty(trim($arm64))) {
    echo json_encode(['output' => '', 'error' => 'No hay código ARM64. Compila primero.', 'exit_code' => -1]);
    exit;
}

// buscar herramientas necesarias para cross-compilación y emulación
$as   = trim(shell_exec('which aarch64-linux-gnu-as 2>/dev/null') ?: '');
$gcc  = trim(shell_exec('which aarch64-linux-gnu-gcc 2>/dev/null') ?: '');
$qemu = trim(shell_exec('which qemu-aarch64-static 2>/dev/null') ?: '');
if (!$qemu) $qemu = trim(shell_exec('which qemu-aarch64 2>/dev/null') ?: '');

if (!$as || !$gcc || !$qemu) {
    $missing = [];
    if (!$as)   $missing[] = 'aarch64-linux-gnu-as';
    if (!$gcc)  $missing[] = 'aarch64-linux-gnu-gcc';
    if (!$qemu) $missing[] = 'qemu-aarch64-static';
    echo json_encode([
        'output'    => '',
        'error'     => 'Herramientas de cross-compilación no instaladas: ' . implode(', ', $missing) . ".\n" .
                       'Instalar con: sudo apt-get install gcc-aarch64-linux-gnu qemu-user-static',
        'exit_code' => -2,
    ]);
    exit;
}

$hash    = md5(uniqid('', true));
$tmp     = sys_get_temp_dir();
$srcFile = "{$tmp}/gol_{$hash}.s";
$objFile = "{$tmp}/gol_{$hash}.o";
$exeFile = "{$tmp}/gol_{$hash}";

// 1. escribir el archivo .s
file_put_contents($srcFile, $arm64);

// 2. ensamblar: .s → .o
$asmOut = [];
$asmRet = 0;
exec(escapeshellcmd($as) . ' -o ' . escapeshellarg($objFile) . ' ' . escapeshellarg($srcFile) . ' 2>&1', $asmOut, $asmRet);
if ($asmRet !== 0) {
    cleanup([$srcFile, $objFile, $exeFile]);
    echo json_encode([
        'output'    => '',
        'error'     => "Error de ensamblado:\n" . implode("\n", $asmOut),
        'exit_code' => $asmRet,
    ]);
    exit;
}

// 3. enlazar: .o → ejecutable (con libc)
$lnkOut = [];
$lnkRet = 0;
exec(escapeshellcmd($gcc) . ' -o ' . escapeshellarg($exeFile) . ' ' . escapeshellarg($objFile) . ' 2>&1', $lnkOut, $lnkRet);
if ($lnkRet !== 0) {
    cleanup([$srcFile, $objFile, $exeFile]);
    echo json_encode([
        'output'    => '',
        'error'     => "Error de enlace:\n" . implode("\n", $lnkOut),
        'exit_code' => $lnkRet,
    ]);
    exit;
}

// 4. ejecutar con QEMU y límite de tiempo
$ldPath = '/usr/aarch64-linux-gnu';
$runOut = [];
$runRet = 0;
$qemuCmd = "timeout {$timeout} " . escapeshellcmd($qemu) . ' -L ' . escapeshellarg($ldPath) . ' ' . escapeshellarg($exeFile) . ' 2>&1';
exec($qemuCmd, $runOut, $runRet);

cleanup([$srcFile, $objFile, $exeFile]);

$output = implode("\n", $runOut);
$error  = '';

if ($runRet === 124) {
    $error = "Tiempo límite excedido ({$timeout}s). El programa podría tener un bucle infinito.";
} elseif ($runRet > 128) {
    $signal = $runRet - 128;
    $error  = "Proceso terminado por señal {$signal} (segfault u otro error en tiempo de ejecución).";
} elseif ($runRet !== 0) {
    $error = "Proceso terminó con código de salida {$runRet}.";
}

echo json_encode([
    'output'    => $output,
    'error'     => $error,
    'exit_code' => $runRet,
]);

function cleanup(array $files): void {
    foreach ($files as $f) {
        if (file_exists($f)) @unlink($f);
    }
}
