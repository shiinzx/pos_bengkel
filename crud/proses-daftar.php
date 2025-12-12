<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau belum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $id_kelas = $_POST[id_kelas];

    // buat query
    $sql = "INSERT INTO siswa (nis, nama, tanngal_lahir, alamat, id_kelas) VALUES ('nis','nama','tanggal_lahir','alamat','id_kelas')";
    $query = mysqli_query(mysql: $db, query: $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan halaman index.php dengan status=sukses
        header(header: 'Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal
        header(header: 'Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>