<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Daftar Kontak</h1>

<form action="" method="post">
    <input type="text" name="nama" id="nama" placeholder="Nama">
    <input type="text" name="negara" id="negara" placeholder="Negara">
    <input type="number" name="no_telepon" id="no_telepon" placeholder="No. Telepon">
    <button type="submit" name="tambah">Tambah</button>
</form>

<?php
if(isset($_POST['tambah'])) {
    $nama = $_POST['nama']; 
    $negara = $_POST['negara']; 
    $no_telepon = $_POST['no_telepon']; 

    require_once('koneksi.php');

    $result = mysqli_query($koneksi, "INSERT INTO db_kontak 
    VALUES ('','$nama','$negara','$no_telepon')") or die (mysqli_error($koneksi));

    if($result) {
        echo "<script>window.alert('data berhasil ditambahkan!')</script>";
    }
}
?>
<br>
<a href="index.php">Kembali ke data</a>
</body>
</html>
