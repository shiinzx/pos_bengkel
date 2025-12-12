<?php
ini_set(option: 'display_errors', value: 1);
ini_set(option: 'display_startup_errors', value: 1);
error_reporting(error_level: E_ALL);
include("config.php"); ?>
<!DOCTYPE html>
<html><head><title>Pendaftaran Siswa Baru | XI PPLG 2</title></head>
<body>
    <header>
        <h3>Siswa yang sudah terdaftar</h3>
    </header>
    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>
    <br>
    <table border="1">
    <thead>
        <tr>
            <th>Nis</th>
            <th>Nama Siswa</th>
            
        </tr>
    </thead>
    </table>
</body>
</html>