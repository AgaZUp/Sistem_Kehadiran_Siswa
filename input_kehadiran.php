<?php
// Termasuk header yang berisi menu navigasi
include('header.php');

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query_siswa = "SELECT * FROM siswa";
$siswa_result = $koneksi->query($query_siswa);
?>

<div class="container">
    <h2>Input Kehadiran Siswa</h2>
    <form action="proses_kehadiran.php" method="post">
        <label for="id_siswa">Pilih Siswa:</label>
        <select name="id_siswa" required>
            <?php while ($siswa = $siswa_result->fetch_assoc()): ?>
                <option value="<?= $siswa['id_siswa'] ?>"><?= $siswa['nama_siswa'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required>

        <label for="status">Status Kehadiran:</label>
        <select name="status" required>
            <option value="Hadir">Hadir</option>
            <option value="Tidak Hadir">Tidak Hadir</option>
            <option value="Izin">Izin</option>
        </select>

        <button type="submit">Input Kehadiran</button>
    </form>
</div>
