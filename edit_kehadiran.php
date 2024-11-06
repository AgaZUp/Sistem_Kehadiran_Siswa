<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id_kehadiran = $_GET['id']; // Mendapatkan id_kehadiran dari URL
$query = "SELECT * FROM kehadiran WHERE id_kehadiran = $id_kehadiran";
$result = $koneksi->query($query);
$row = $result->fetch_assoc();

$query_siswa = "SELECT * FROM siswa";
$siswa_result = $koneksi->query($query_siswa);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kehadiran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Kehadiran Siswa</h2>
        <form action="proses_edit_kehadiran.php" method="post">
            <input type="hidden" name="id_kehadiran" value="<?= $row['id_kehadiran'] ?>">

            <label for="id_siswa">Pilih Siswa:</label>
            <select name="id_siswa" required>
                <?php while ($siswa = $siswa_result->fetch_assoc()): ?>
                    <option value="<?= $siswa['id_siswa'] ?>" <?= $row['id_siswa'] == $siswa['id_siswa'] ? 'selected' : '' ?>>
                        <?= $siswa['nama_siswa'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" required>

            <label for="status">Status Kehadiran:</label>
            <select name="status" required>
                <option value="Hadir" <?= $row['status'] == 'Hadir' ? 'selected' : '' ?>>Hadir</option>
                <option value="Tidak Hadir" <?= $row['status'] == 'Tidak Hadir' ? 'selected' : '' ?>>Tidak Hadir</option>
                <option value="Izin" <?= $row['status'] == 'Izin' ? 'selected' : '' ?>>Izin</option>
            </select>

            <button type="submit">Update Kehadiran</button>
        </form>
    </div>
</body>
</html>
