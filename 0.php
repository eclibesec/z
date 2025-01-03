<?php

/**
 * SCRIPT INI DI BUAT OLEH Eclipse Security Labs Team
 * Memastikan file yang dipantau tidak bisa terhapus atau diubah.
 */

set_time_limit(0);
$interval = 1; // Waktu jeda antar pengecekan dalam detik
$jsonFilePath = './config.json';
$logFilePath = './monitor.log'; // Lokasi file log

// Fungsi untuk membaca konfigurasi dari config.json
function getConfig($jsonFilePath) {
    if (!file_exists($jsonFilePath)) {
        logMessage("File config.json tidak ditemukan: $jsonFilePath");
        return null;
    }

    $jsonContent = file_get_contents($jsonFilePath);
    $data = json_decode($jsonContent, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        logMessage("Error pada format config.json: " . json_last_error_msg());
        return null;
    }

    return $data;
}

// Fungsi untuk memulihkan file menggunakan wget
function checkAndRestoreFile($filePath, $url) {
    logMessage("Memeriksa file: $filePath");

    // Jika file tidak ada, unduh dengan wget
    if (!file_exists($filePath)) {
        logMessage("File $filePath tidak ditemukan. Mengunduh dari $url...");
        $command = "wget -q -O " . escapeshellarg($filePath) . " " . escapeshellarg($url);
        exec($command, $output, $return_var);

        if ($return_var === 0) {
            logMessage("File $filePath berhasil dipulihkan.");
        } else {
            logMessage("Gagal mengunduh file dari $url.");
        }
    } else {
        // Jika file ada, cek apakah kontennya berubah
        $currentHash = md5_file($filePath);
        $command = "wget -q -O - " . escapeshellarg($url) . " | md5sum";
        $remoteHash = trim(shell_exec($command));

        if ($currentHash !== $remoteHash) {
            logMessage("Konten file $filePath berubah. Memulihkan...");
            exec("wget -q -O " . escapeshellarg($filePath) . " " . escapeshellarg($url));
            logMessage("Konten file $filePath berhasil dipulihkan.");
        } else {
            logMessage("File $filePath dalam kondisi baik.");
        }
    }
}

// Fungsi untuk mencatat log aktivitas
function logMessage($message) {
    global $logFilePath;
    $logEntry = "[" . date('Y-m-d H:i:s') . "] " . $message . PHP_EOL;
    file_put_contents($logFilePath, $logEntry, FILE_APPEND);
}

// Mulai eksekusi
$config = getConfig($jsonFilePath);
if (!$config) {
    logMessage("Konfigurasi tidak valid. Program dihentikan.");
    exit;
}

$filesToMonitor = isset($config['path']) ? $config['path'] : [];
$url = isset($config['url']) ? $config['url'] : null;

if (empty($filesToMonitor) || !$url) {
    logMessage("File yang diawasi atau URL tidak diatur dalam config.json.");
    exit;
}

logMessage("Memulai pemantauan file...");

while (true) {
    foreach ($filesToMonitor as $file) {
        checkAndRestoreFile($file, $url);
    }
    sleep($interval);
}
