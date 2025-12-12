<?php
echo "lalapan kamboja";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Siswa</title>
</head>
<body>
  <h1>Tambah Data Siswa</h1>

  <form action="" method="post">
    <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Isi Nama ...">
    <input type="number" name="umur" id="umur" placeholder="Isi Umur ...">
    <input type="email" name="email" id="email" placeholder="Isi Email...">
    <button type="submit" name="tambah">Tambah</button>
  </form>

  <?php
  //mengambil data dari form
  //echo $_POST['nama_siswa'];
  if(isset($_POST['tambah'])) {
    $nama = $_POST['nama_siswa'];
    $umur = $_POST['umur'];
    $email = $_POST['email'];


    //koneksi ke database
    require_once('koneksi.php');

    //insert data
    $result = mysqli_query($koneksi, "INSERT INTO tabel_siswa VALUES ('','$nama','$umur','$email')") or die (mysqli_error($koneksi));

    //cek apabila berhasil di input
    if($result) {
      echo "<script>window.alert('data berhasil ditambahkan!')</script>";
    }
  }
  ?>
</body>
</html>