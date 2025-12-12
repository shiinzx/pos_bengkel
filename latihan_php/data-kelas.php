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
            <th>Tingkat</th>
            <th>Jurusan</th>
            <th>Rombel</th>
        </tr>

    <?php
    // memanggil data table dari database
    require_once('koneksi.php');
    $data = mysqli_query($koneksi, "SELECT * FROM table_kelas");
    
    // tampilkan data siswa
    while($siswa=mysqli_fetch_assoc($data)) : 
    ?>
         <tr>
         <td> <?= $no++; ?> </td>
         <td> <?= $siswa['tingkat']?> </td>
         <td> <?= $siswa['jurusan']?></td>
         <td> <?= $siswa['kelas']?></td>
         </tr>
     <?php 
     endwhile;
     ?>
    </table>
</body>
</html>