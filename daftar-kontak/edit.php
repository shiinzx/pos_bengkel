<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Kontak</title>
</head>
<body>
  <h1>Edit Kontak</h1>

<?php
// Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once('koneksi.php');

    // Ambil data lama
    $query = mysqli_query($koneksi, "SELECT * FROM db_kontak WHERE id = $id") or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($query);
}
?>

<form action="" method="post">
    <input type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo $data['nama']; ?>">
    <input type="text" name="negara" id="negara" placeholder="Negara" value="<?php echo $data['negara']; ?>">
    <input type="number" name="no_telepon" id="no_telepon" placeholder="No. Telepon" value="<?php echo $data['no_telepon']; ?>">
    <button type="submit" name="edit">Edit</button>
</form>

<?php
if (isset($_POST['edit'])) {
    $nama = $_POST['nama']; 
    $negara = $_POST['negara']; 
    $no_telepon = $_POST['no_telepon']; 

    require_once('koneksi.php');

    // PERBAIKAN PADA QUERY UPDATE
    $result = mysqli_query($koneksi, "UPDATE db_kontak 
        SET nama='$nama', negara='$negara', no_telepon='$no_telepon' 
        WHERE id=$id") or die(mysqli_error($koneksi));

    if ($result) {
        echo "<script>window.alert('Data berhasil diedit!'); window.location='index.php';</script>";
    }
}
?>

<br>
<a href="index.php">Kembali ke data</a>
</body>
</html>
