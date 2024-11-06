<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$id_siswa = $_POST['id_siswa'];
$nama_siswa = $_POST['nama_siswa'];
$nis = $_POST['nis'];

// Update data siswa
$sql = "UPDATE siswa SET nama_siswa='$nama_siswa', nis='$nis' WHERE id_siswa=$id_siswa";
if ($koneksi->query($sql) === TRUE) {
    echo "Data siswa berhasil diupdate.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
