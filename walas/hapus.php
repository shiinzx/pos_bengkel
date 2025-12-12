<?php

include("config.php");

if( isset($_GET['nis']) ){

    $nis = $_GET['nis'];

    $sql = "DELETE FROM siswa WHERE nis='$nis'";
    $query = mysqli_query($db, $sql);


    if( $query ){
        header('Location: list-siswa.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>