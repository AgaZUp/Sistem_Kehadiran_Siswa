<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id_siswa = $_GET['id'];

// Hapus data siswa
$sql = "DELETE FROM siswa WHERE id_siswa = $id_siswa";
if ($koneksi->query($sql) === TRUE) {
    echo "Data siswa berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
