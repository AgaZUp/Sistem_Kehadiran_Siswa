<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$nama_siswa = $_POST['nama_siswa'];
$nis = $_POST['nis'];

// Insert data siswa
$sql = "INSERT INTO siswa (nama_siswa, nis) VALUES ('$nama_siswa', '$nis')";
if ($koneksi->query($sql) === TRUE) {
    echo "Data siswa berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
