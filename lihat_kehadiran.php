<?php
// Termasuk header yang berisi menu navigasi
include('header.php');

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sistem_kehadiran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query = "SELECT kehadiran.id_kehadiran, siswa.nama_siswa, kehadiran.tanggal, kehadiran.status
          FROM kehadiran
          JOIN siswa ON kehadiran.id_siswa = siswa.id_siswa";
$result = $koneksi->query($query);
?>

<div class="container">
    <h2>Data Kehadiran Siswa</h2>
    <table>
        <tr>
            <th>ID Kehadiran</th>
            <th>Nama Siswa</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_kehadiran'] ?></td>
                <td><?= $row['nama_siswa'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <a href="edit_kehadiran.php?id=<?= $row['id_kehadiran'] ?>">Edit</a>
                    <a href="hapus_kehadiran.php?id=<?= $row['id_kehadiran'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
