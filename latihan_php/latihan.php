<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $nama = "Sarah";
    echo "<h1>$nama</h1>"
    ?>
    <h1><?php echo $nama ?></h1>
    <h1><?php= $nama?></h1>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center" >DAFTAR KONTAK</h1>
    <table border="1" width="50%" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Negara</th>
            <th>NO.TELPON</th>
        </tr>

    <?php
    // memanggil data table dari database
    require_once('koneksii.php');
    $data = mysqli_query($koneksii, "SELECT * FROM daftar_kontak");
    
    // tampilkan data siswa
    while($kontak=mysqli_fetch_assoc($data)) : 
    ?>
         <tr>
         <td> <?= $no++; ?> </td>
         <td> <?= $kontak['nama']?> </td>
         <td> <?= $kontak['negara']?></td>
         <td> <?= $kontak['no.telpon']?></td>
         </tr>
     <?php 
     endwhile;
     ?>
    </table>
</body>
</html>