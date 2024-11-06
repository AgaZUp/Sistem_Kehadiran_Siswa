<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id_siswa = $_GET['id'];
$query = "SELECT * FROM siswa WHERE id_siswa = $id_siswa";
$result = $koneksi->query($query);
$siswa = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
</head>
<body>
    <h2>Edit Data Siswa</h2>
    <form action="proses_edit_siswa.php" method="post">
        <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa'] ?>">
        
        <label for="nama_siswa">Nama Siswa:</label>
        <input type="text" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" required>
        
        <label for="nis">NIS:</label>
        <input type="text" name="nis" value="<?= $siswa['nis'] ?>" required>
        
        <button type="submit">Update Siswa</button>
    </form>
</body>
</html>
