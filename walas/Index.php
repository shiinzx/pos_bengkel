<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa | XI PPLG 1 </title>
</head>

<body>
    <header>
        <h3>Daftar Siswa </h3>
        <h1>XI PPLG 1</h1>
    </header>

    <h4>Menu</h4>
    <nav>
        <ul>
            <li><a href="form-daftar.php">Daftar Baru</a></li>
            <li><a href="list-siswa.php">Terdaftar</a></li>
        </ul>
    </nav>
    <br>

    <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses') {
                echo "Pendaftaran siswa baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
    <?php endif; ?>

</body>
</html>