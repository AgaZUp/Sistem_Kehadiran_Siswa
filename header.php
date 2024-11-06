<!-- header.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Kehadiran Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Sistem Kehadiran Siswa</h1>
            <button class="navbar-toggle" onclick="toggleMenu()">☰ Menu</button>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="tambah_siswa.php">Tambah Siswa</a></li>
                    <li><a href="lihat_siswa.php">Lihat Data Siswa</a></li>
                    <li><a href="input_kehadiran.php">Input Kehadiran</a></li>
                    <li><a href="lihat_kehadiran.php">Lihat Kehadiran</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <script>
        // JavaScript untuk toggle menu di perangkat mobile
        function toggleMenu() {
            var nav = document.querySelector('nav');
            nav.classList.toggle('active');
        }
    </script>
</body>
</html>
