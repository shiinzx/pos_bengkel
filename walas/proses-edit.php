<?php

include("config.php");

// apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $id_kelas = $_POST['id_kelas'];

    // buat query update
    $sql = "UPDATE siswa SET nama_siswa='$nama_siswa', tanggal_lahir='$tanggal_lahir', alamat='$alamat', id_kelas='$id_kelas' WHERE nis='$nis'";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>