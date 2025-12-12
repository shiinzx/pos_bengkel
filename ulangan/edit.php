<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TAMBAH</h1>
    <form action="" method="post">
        <input type="text" name="nama" id="nama" placeholder="isi nama...">
        <input type="number" name="umur" id="umur" placeholder="isi umur...">
        <input type="email" name="email" id="email" placeholder="isi email...">
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    require_once('koneksi.php');

    $result = mysqli_query($koneksi, "UPDATE contoh SET('','nama','umur','email')") or die (mysqli_error($koneksi));
    
    if($result) {
        echo "<script>window.alert('data berhasil ditambahkan!')</script>"
    }
    ?>
</body>
</html>