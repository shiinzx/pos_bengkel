<?php
require_once('koneksi.php');

//cek apakah ada id yang dikirim
if(!isset($_GET[$id])){
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM table_siswa WHERE id = $id");

// jika data berhasil di hapus
if($query) {
    echo"<script>
    alert('Data berhasil di hapus.');
    window.location.href= 'data-siswa.php';
    </script>";
}

} else{
    echo"<script>
    alert('Data id tidak ada.');
    window.location.href= 'data-siswa.php';
    </script>";
}
?>


if (isset($_GET['id'])) 
    $id = $_GET['id'];
    $query = "DELETE FROM daftar_kontak WHERE id = $id";
    mysqli_query($koneksii, $query);
