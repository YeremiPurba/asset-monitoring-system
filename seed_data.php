<?php 
require_once 'config/database.php';

// Data role
mysqli_query($conn, "INSERT IGNORE INTO role (id_role, role_name) VALUES (1, 'Admin'), (2, 'Dinas')");
echo "Data role berhasil disiapkan. <br>";

// Data user (dummy)
$password_admin = password_hash('admin123', PASSWORD_DEFAULT);
$sql_user = "INSERT IGNORE INTO user (id_user, nama_user, email, password, role_id) 
            VALUES (1, 'Admin1', 'admin@masbro.com', '$password_admin', 1)";
mysqli_query($conn, $sql_user);
echo "Data User Admin berhasil disiapkan.<br>";


// Data kategori
$kategori_list = [
    1 => 'AC',
    2 => 'APPAR',
    3 => 'LIFT',
    4 => 'GENSET'
];

foreach($kategori_list as $id => $name) {
    mysqli_query($conn, "INSERT IGNORE INTO kategori (id_kategori, nama_kategori) VALUES ($id, '$name')");
};
echo "Data kategori berhasil disiapkan. <br>";

// Data aset
$aset_list = [
    [1, 'AC-LO-GA', 'AC Loby Gudang Arsip', 'Loby', 1],
    [2, 'APR-LO-TL', 'Appar Loby Toilet Loby', 'Loby', 2],
    [3, 'LFT-LO-LT1', 'Lift Loby Lantai 1', 'Loby', 3],
    [4, 'GST-RG1', 'Genset Ruang Genset 1', 'Ruang Genset 1', 4]
];

foreach($aset_list as $aset) {
    mysqli_query($conn, "INSERT IGNORE INTO aset (id_aset, kode_aset, nama_aset, lokasi, kategori_id) VALUES ($aset[0], '$aset[1]', '$aset[2]', '$aset[3]', $aset[4])");
}
echo "Data aset berhasil dibuat";

// Data Pertanyaan
$data_pertanyaan = [
    // Kategori AC
    [1, "Unit AC menyala dan berfungsi dengan normal", "pemeliharaan", "radio", "Ya,Tidak", 1],
    [1, "Suhu udara sesuai pengaturan", "pemeliharaan", "radio", "Ya,Tidak", 2],
    [1, "Filter udara dibersihkan atau diganti", "pemeliharaan", "radio", "Sudah,Belum", 3],
    [1, "Evaporator coil bersih dan tidak berdebu", "pemeliharaan", "radio", "Ya,Tidak", 4],
    [1, "Kondensor coil bersih (unit outdoor)", "pemeliharaan", "radio", "Ya,Tidak", 5],
    [1, "Drainase air lancar, tidak ada kebocoran atau air menetes di dalam", "pemeliharaan", "radio", "Ya,Tidak", 6],
    [1, "Kipas indoor dan outdoor berfungsi normal", "pemeliharaan", "radio", "Ya,Tidak", 7],
    [1, "Tidak ada suara bising/tidak normal", "pemeliharaan", "radio", "Ya,Tidak", 8],
    [1, "Cek tekanan freon (tekanan normal sesuai standar teknis)", "pemeliharaan", "radio", "Normal,Kurang", 9],
    [1, "Pipa instalasi aman dan tidak bocor", "pemeliharaan", "radio", "Ya,Tidak", 10],
    [1, "Remote control dan panel kontrol berfungsi dengan baik", "pemeliharaan", "radio", "Ya,Tidak", 11],
    [1, "Tidak ada getaran berlebihan pada unit indoor/outdoor", "pemeliharaan", "radio", "Ya,Tidak", 12],
    [1, "Konsumsi daya sesuai standar", "pemeliharaan", "radio", "Ya,Tidak", 13],
    [1, "Timer dan mode otomatis bekerja normal", "pemeliharaan", "radio", "Ya,Tidak", 14],
    [1, "Apakah perlu pembersihan menyeluruh?", "tindak_lanjut", "radio", "Ya,Tidak", 1],
    [1, "Apakah perlu isi ulang freon?", "tindak_lanjut", "radio", "Ya,Tidak", 2],
    [1, "Apakah perlu servis teknisi profesional?", "tindak_lanjut", "radio", "Ya,Tidak", 3],
    [1, "Apakah perlu penggantian spare part?", "tindak_lanjut", "radio", "Ya,Tidak", 4],

    // Kategori Appar
    [2, "APAR mudah diakses dan tidak terhalang", "pemeliharaan", "radio", "Ya,Tidak", 1],
    [2, "Tanda/label instruksi masih terbaca", "pemeliharaan", "radio", "Ya,Tidak", 2],
    [2, "Tidak ada karat, penyok, atau kerusakan fisik", "pemeliharaan", "radio", "Ya,Tidak", 3],
    [2, "Pin pengaman dan segel masih utuh", "pemeliharaan", "radio", "Ya,Tidak", 4],
    [2, "Manometer menunjukkan tekanan normal (zona hijau)", "pemeliharaan", "radio", "Ya,Tidak", 5],
    [2, "Selang dan nozzle tidak retak atau tersumbat", "pemeliharaan", "radio", "Ya,Tidak", 6],
    [2, "Berat sesuai spesifikasi (tidak berkurang)", "pemeliharaan", "radio", "Ya,Tidak", 7],
    [2, "Tanggal kadaluarsa/servis belum terlewati", "pemeliharaan", "radio", "Ya,Tidak", 8],
    [2, "Braket/penggantung aman dan kuat", "pemeliharaan", "radio", "Ya,Tidak", 9],
    [2, "APAR telah dibalik (dry chemical) untuk mencegah beku", "pemeliharaan", "radio", "Ya,Tidak", 10],
    [2, "Apakah perlu servis profesional?", "tindak_lanjut", "radio", "Ya,Tidak", 1],
    [2, "Apakah perlu pengisian ulang?", "tindak_lanjut", "radio", "Ya,Tidak", 2],
    [2, "Apakah perlu penggantian unit?", "tindak_lanjut", "radio", "Ya,Tidak", 3],

    // Kategori Lift
    [3, "Lift dapat naik dan turun dengan lancar", "pemeliharaan", "radio", "Ya,Tidak", 1],
    [3, "Semua tombol panel berfungsi dengan baik", "pemeliharaan", "radio", "Ya,Tidak", 2],
    [3, "Indikator lantai dan arah menyala normal", "pemeliharaan", "radio", "Ya,Tidak", 3],
    [3, "Lampu kabin menyala normal", "pemeliharaan", "radio", "Ya,Tidak", 4],
    [3, "Pintu lift membuka dan menutup sempurna tanpa hambatan", "pemeliharaan", "radio", "Ya,Tidak", 5],
    [3, "Sensor pintu bekerja (pintu terbuka kembali jika terhalang)", "pemeliharaan", "radio", "Ya,Tidak", 6],
    [3, "Alarm darurat berfungsi (dengan uji coba)", "pemeliharaan", "radio", "Ya,Tidak", 7],
    [3, "Komunikasi interkom ke ruang kontrol berfungsi", "pemeliharaan", "radio", "Ya,Tidak", 8],
    [3, "Tidak ada suara bising atau getaran tidak wajar saat beroperasi", "pemeliharaan", "radio", "Ya,Tidak", 9],
    [3, "Lantai kabin bersih dan tidak licin", "pemeliharaan", "radio", "Ya,Tidak", 10],
    [3, "Pengunci pintu lantai berfungsi dan tidak longgar", "pemeliharaan", "radio", "Ya,Tidak", 11],
    [3, "Emergency light (lampu darurat) berfungsi saat simulasi mati listrik", "pemeliharaan", "radio", "Ya,Tidak", 12],
    [3, "Panel kontrol utama bebas dari debu dan lembap", "pemeliharaan", "radio", "Ya,Tidak", 13],
    [3, "Pemeriksaan kondisi kabel sling dan guide rail", "pemeliharaan", "radio", "Baik,Perlu servis", 14],
    [3, "Pelumasan mekanik lift dilakukan sesuai jadwal", "pemeliharaan", "radio", "Ya,Tidak", 15],
    [3, "Pengujian sistem rem dan perlambatan darurat", "pemeliharaan", "radio", "Sudah,Belum", 16],
    [3, "Cek baterai backup (jika ada)", "pemeliharaan", "radio", "Normal,Lemah", 17],
    [3, "Lift berhenti tepat di level lantai", "pemeliharaan", "radio", "Ya,Tidak", 18],
    [3, "Sistem proteksi beban lebih (overload) bekerja dengan benar", "pemeliharaan", "radio", "Ya,Tidak", 19],
    [3, "Sertifikat laik operasi masih berlaku", "pemeliharaan", "radio", "Ya,Tidak", 20],
    [3, "Apakah perlu perbaikan mekanik?", "tindak_lanjut", "radio", "Ya,Tidak", 1],
    [3, "Apakah perlu servis kelistrikan?", "tindak_lanjut", "radio", "Ya,Tidak", 2],
    [3, "Apakah perlu penggantian suku cadang?", "tindak_lanjut", "radio", "Ya,Tidak", 3],
    [3, "Apakah perlu inspeksi pihak ketiga?", "tindak_lanjut", "radio", "Ya,Tidak", 4],
    
    // Kategori Genset
    [4, "Genset dapat dinyalakan dan dimatikan dengan baik", "pemeliharaan", "radio", "Ya,Tidak", 1],
    [4, "Pemeriksaan level oli mesin", "pemeliharaan", "radio", "Normal,Kurang", 2],
    [4, "Pemeriksaan level air radiator", "pemeliharaan", "radio", "Normal,Kurang", 3],
    [4, "Pemeriksaan bahan bakar (solar/bensin/gas)", "pemeliharaan", "radio", "Cukup,Kurang", 4],
    [4, "Tidak ada kebocoran oli, bahan bakar, atau air", "pemeliharaan", "radio", "Ya,Tidak", 5],
    [4, "Aki dalam kondisi baik dan terisi penuh", "pemeliharaan", "radio", "Ya,Tidak", 6],
    [4, "Charger aki berfungsi dengan baik", "pemeliharaan", "radio", "Ya,Tidak", 7],
    [4, "Panel kontrol bekerja normal (indikator, volt, Hz, ampere)", "pemeliharaan", "radio", "Ya,Tidak", 8],
    [4, "Tegangan output sesuai spesifikasi", "pemeliharaan", "radio", "Ya,Tidak", 9],
    [4, "Frekuensi (Hz) sesuai standar (50/60 Hz)", "pemeliharaan", "radio", "Ya,Tidak", 10],
    [4, "Pemeriksaan kondisi kabel dan koneksi", "pemeliharaan", "radio", "Baik,Perlu perbaikan", 11],
    [4, "Suara mesin normal, tanpa suara aneh atau getaran berlebih", "pemeliharaan", "radio", "Ya,Tidak", 12],
    [4, "Sistem pendingin (kipas & radiator) berfungsi baik", "pemeliharaan", "radio", "Ya,Tidak", 13],
    [4, "Pemeriksaan dan pengencangan baut/mur", "pemeliharaan", "radio", "Ya,Tidak", 14],
    [4, "Filter udara bersih atau diganti jika perlu", "pemeliharaan", "radio", "Ya,Tidak", 15],
    [4, "Pemeriksaan knalpot, tidak bocor dan tidak tersumbat", "pemeliharaan", "radio", "Ya,Tidak", 16],
    [4, "Jam operasi tercatat (untuk jadwal servis berkala)", "pemeliharaan", "text", null, 17],
    [4, "Ganti oli mesin", "tugas", "radio", "Sudah,Belum", 18],
    [4, "Ganti filter oli", "tugas", "radio", "Sudah,Belum", 19],
    [4, "Ganti filter bahan bakar", "tugas", "radio", "Sudah,Belum", 20],
    [4, "Ganti filter udara", "tugas", "radio", "Sudah,Belum", 21],
    [4, "Flushing radiator", "tugas", "radio", "Sudah,Belum", 22],
    [4, "Apakah perlu pengisian bahan bakar?", "tindak_lanjut", "radio", "Ya,Tidak", 1],
    [4, "Apakah perlu penggantian oli/filter?", "tindak_lanjut", "radio", "Ya,Tidak", 2],
    [4, "Apakah perlu servis teknisi profesional?", "tindak_lanjut", "radio", "Ya,Tidak", 3],
    [4, "Apakah perlu pengecekan ATS/manual switch?", "tindak_lanjut", "radio", "Ya,Tidak", 4],
];

// Matikan pengecekan Foreign Key sementara
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

// Mengosongkan tabel pertanyaan dengan aman
mysqli_query($conn, "TRUNCATE TABLE pertanyaan");

// Nyalakan kembali pengecekan Foreign Key
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

foreach($data_pertanyaan as $p) {
    $cat_id = $p[0];
    $pertanyaan = $p[1];
    $jenis = $p[2];
    $tipe = $p[3];
    $opsi = $p[4];
    $urutan = $p[5];

    $sql = "INSERT INTO pertanyaan (kategori_id, pertanyaan, jenis_pertanyaan, tipe_jawaban, opsi_pilihan, urutan)
            VALUES ($cat_id, '$pertanyaan', '$jenis', '$tipe', '$opsi', $urutan)";
    mysqli_query($conn, $sql);
}
echo "Daftar pertanyaan berhasil dimasukkan!";
?>