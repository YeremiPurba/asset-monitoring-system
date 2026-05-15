<?php 
// koneksi ke database
require_once 'config/database.php';

$queries = [
    "CREATE TABLE IF NOT EXISTS role (
        id_role INT AUTO_INCREMENT PRIMARY KEY,
        role_name VARCHAR(50) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS user (
        id_user INT AUTO_INCREMENT PRIMARY KEY,
        nama_user VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        role_id INT,
        FOREIGN KEY (role_id) REFERENCES role(id_role)    
    )",
    "CREATE TABLE IF NOT EXISTS kategori (
        id_kategori INT AUTO_INCREMENT PRIMARY KEY,
        nama_kategori VARCHAR(100) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS aset (
        id_aset INT AUTO_INCREMENT PRIMARY KEY,
        kode_aset VARCHAR(50) UNIQUE NOT NULL,
        nama_aset VARCHAR(100) NOT NULL,
        lokasi VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        kategori_id INT,
        FOREIGN KEY (kategori_id) REFERENCES kategori(id_kategori)
    )",
    "CREATE TABLE IF NOT EXISTS pertanyaan (
        id_pertanyaan INT AUTO_INCREMENT PRIMARY KEY,
        pertanyaan TEXT NOT NULL,
        jenis_pertanyaan ENUM('pemeliharaan', 'tindak_lanjut', 'tugas') NOT NULL,
        tipe_jawaban ENUM('text', 'radio') DEFAULT 'radio',
        opsi_pilihan TEXT NULL,
        urutan INT DEFAULT 0,
        kategori_id INT,
        FOREIGN KEY (kategori_id) REFERENCES kategori(id_kategori)
    )",
    "CREATE TABLE IF NOT EXISTS laporan (
        id_laporan INT AUTO_INCREMENT PRIMARY KEY,
        nama_teknisi VARCHAR(100) NOT NULL,
        jenis_laporan ENUM('pemeliharaan', 'tindak_lanjut') NOT NULL,
        status_laporan ENUM('pending', 'in progress', 'done') DEFAULT 'pending',
        catatan TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        user_id INT,
        aset_id INT,
        FOREIGN KEY (user_id) REFERENCES user(id_user),
        FOREIGN KEY (aset_id) REFERENCES aset(id_aset)
    )",
    "CREATE TABLE IF NOT EXISTS jawaban (
        id_jawaban INT AUTO_INCREMENT PRIMARY KEY,
        jawaban TEXT,
        laporan_id INT,
        pertanyaan_id INT,
        FOREIGN KEY (laporan_id) REFERENCES laporan(id_laporan),
        FOREIGN KEY (pertanyaan_id) REFERENCES pertanyaan(id_pertanyaan)
    )",
    "CREATE TABLE IF NOT EXISTS dokumentasi (
        id_dokumentasi INT AUTO_INCREMENT PRIMARY KEY,
        file_path VARCHAR(255),
        file_name VARCHAR(255),
        file_size INT,
        laporan_id INT,
        FOREIGN KEY (laporan_id) REFERENCES laporan(id_laporan)
    )"
];

foreach ($queries as $index => $sql) {
    if (mysqli_query($conn, $sql)) {
        echo "Tabel ke-" . ($index + 1) . " berhasil disiapkan...<br>";
    } else {
        echo "Gagal membuat tabel ke-" . ($index + 1) . ": " . mysqli_error($conn) . "<br>";
    }
}

// echo "Selesai! Struktur tabel sudah siap";
?>