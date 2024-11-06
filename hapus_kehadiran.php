<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id_kehadiran = $_GET['id']; // Mendapatkan id_kehadiran dari URL

// Hapus data kehadiran berdasarkan id_kehadiran
$sql = "DELETE FROM kehadiran WHERE id_kehadiran = $id_kehadiran";

if ($koneksi->query($sql) === TRUE) {
    // Jika hapus sukses, kembali ke halaman lihat kehadiran
    header("Location: lihat_kehadiran.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
