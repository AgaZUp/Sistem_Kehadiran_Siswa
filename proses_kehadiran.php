<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mengambil data dari formulir
$id_siswa = $_POST['id_siswa'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];

// Menyimpan kehadiran
$sql = "INSERT INTO kehadiran (id_siswa, tanggal, status) VALUES ('$id_siswa', '$tanggal', '$status')";
if ($koneksi->query($sql) === TRUE) {
    echo "Kehadiran berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
