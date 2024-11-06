<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mengambil data dari form
$id_kehadiran = $_POST['id_kehadiran'];
$id_siswa = $_POST['id_siswa'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];

// Update data kehadiran di database
$sql = "UPDATE kehadiran SET id_siswa = '$id_siswa', tanggal = '$tanggal', status = '$status' WHERE id_kehadiran = '$id_kehadiran'";

if ($koneksi->query($sql) === TRUE) {
    // Jika update sukses, kembali ke halaman lihat kehadiran
    header("Location: lihat_kehadiran.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
