<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Siswa</title>
</head>
<body>
  <h1>Edit Data Siswa</h1>

  <?php
  require_once('koneksi.php');

  // cek apakah form disubmit (POST)
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id    = $_POST['id'];
      $nama  = $_POST['nama_siswa'];
      $umur  = $_POST['umur'];
      $email = $_POST['email'];

      // query update
      $query = "UPDATE table_siswa 
                SET nama_siswa='$nama', umur='$umur', email='$email' 
                WHERE id=$id";

      if (mysqli_query($koneksi, $query)) {
          echo "<p style='color:green;'>Data berhasil diupdate!</p>";
      } else {
          echo "<p style='color:red;'>Error: " . mysqli_error($koneksi) . "</p>";
      }
  }

  // kalau dari GET (baru mau edit), ambil data lama
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $data = mysqli_query($koneksi, "SELECT * FROM table_siswa WHERE id=$id");
      $siswa = mysqli_fetch_assoc($data);
  ?>
      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
        Nama: <input type="text" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>"><br><br>
        Umur: <input type="text" name="umur" value="<?= $siswa['umur'] ?>"><br><br>
        Email: <input type="text" name="email" value="<?= $siswa['email'] ?>"><br><br>
        <button type="submit">Update</button>
      </form>
  <?php
  }
  ?>

  <br>
  <a href="data_siswa.php">Kembali ke Data</a>
</body>
</html>