<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center" >DATA SISWA</h1>
    <table border="1" width="50%" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Kota</th>
            <th>Aksi</th>
        </tr>

    <?php
    // memanggil data table dari database
    require_once('koneksi.php');
    $data = mysqli_query($koneksi, "SELECT * FROM table_siswa");
    
    // tampilkan data siswa
    while($siswa=mysqli_fetch_assoc($data)) : 
    ?>
         <tr>
         <td> <?= $siswa['id']; ?> </td>
         <td> <?= $siswa['nama_siswa']?> </td>
         <td> <?= $siswa['umur']?></td>
         <td> <?= $siswa['email']?></td>
         <td><a href="edit-siswa.php?id=<?= $siswa['id']; ?>">update </a>| 
         <a href="hapus-siswa.php?id=<?= $siswa['id']; ?>" 
         onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">delete</a></td>
         </tr>
     <?php 
     endwhile;
     ?>
    </table>
</body>
</html>