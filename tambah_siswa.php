<?php
// Termasuk header yang berisi menu navigasi
include('header.php');

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_siswa = $_POST['nama_siswa'];
    $nis = $_POST['nis'];

    // Menyimpan data siswa ke database
    $sql = "INSERT INTO siswa (nama_siswa, nis) VALUES ('$nama_siswa', '$nis')";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "<p>Siswa berhasil ditambahkan!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $koneksi->error . "</p>";
    }
}
?>

<div class="container">
    <h2>Tambah Siswa</h2>
    <form action="tambah_siswa.php" method="post">
        <label for="nama_siswa">Nama Siswa:</label>
        <input type="text" name="nama_siswa" required>

        <label for="nis">NIS:</label>
        <input type="text" name="nis" required>

        <button type="submit">Tambah Siswa</button>
    </form>
</div>
