<?php
require_once('koneksi.php');

if(isset($_GET['id'])){
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM db_kontak WHERE id = $id");

if($query) {
    echo"<script>
    alert('Nomor berhasil di hapus.');
    window.location.href= 'index.php';
    </script>";
}

} else{
    echo"<script>
    alert('Nomor id tidak ada.');
    window.location.href= 'index.php';
    </script>";
}
?>