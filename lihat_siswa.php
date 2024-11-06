<?php
// Termasuk header yang berisi menu navigasi
include('header.php');

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query = "SELECT * FROM siswa";
$result = $koneksi->query($query);
?>

<div class="container">
    <h2>Data Siswa</h2>
    <table>
        <tr>
            <th>ID Siswa</th>
            <th>Nama Siswa</th>
            <th>NIS</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_siswa'] ?></td>
                <td><?= $row['nama_siswa'] ?></td>
                <td><?= $row['nis'] ?></td>
                <td>
                    <a href="edit_siswa.php?id=<?= $row['id_siswa'] ?>">Edit</a>
                    <a href="hapus_siswa.php?id=<?= $row['id_siswa'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
