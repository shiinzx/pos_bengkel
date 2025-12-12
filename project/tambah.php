<?php
require_once('koneksii.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $negara = $_POST['negara'];
    $no_telpon = $_POST['no_telpon'];

    $query = "INSERT INTO daftar_kontak (nama, negara, no_telpon) 
              VALUES ('$nama', '$negara', '$no_telpon')";
    mysqli_query($koneksii, $query);
}

header("Location: daftar-kontak.php");
exit;
