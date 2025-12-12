<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">KONTAK</h1>
    <table border="1" width="50%" cellspacing="0" align="center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Negara</th>
            <th>No.Telpon</th>
            <th>Aksi</th>
        </tr>

        <?php
        require_once('koneksi.php');
        $data = mysqli_query($koneksi, "SELECT * FROM kontak");
        $no=1;

        while($kontak = mysqli_fetch_assoc($data)) :
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $kontak['nama']; ?></td>
            <td><?= $kontak['negara']; ?></td>
            <td><?= $kontak['no_telpon']; ?></td>
            <td>
                <a href="edit.php?id=<?= $kontak['id']; ?>">Edit</a> | 
                    <a href="hapus.php?id=<?= $kontak['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus nomor ini?')">Delete</a>
            </td>
        </tr>
        <?php
        endwhile;
        ?>
    </table>
    <p>
        <a href="tambah.php">Tambah Kontak</a>
    </p>
</body>
</html>