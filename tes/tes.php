<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'nama_tabel') or die ("Gagal koneksi");

$id = $_GET['edit'] ?? null;

if ($_POST) {
    $a = $_POST;
    $sql = $a['id']
    ?"UPDATE nama_tabel SET nama='$a[nama]', jurusan='$a[jurusan]', nis=$a[nis] WHERE id=$a[id]"
    :"INSERT INTO nama_tabel(nama,jurusan,nis) VALUES ('$a[nama]','$a[jurusan]', $a[nis])";
    mysqli_query($koneksi, $sql);
}

if (isset($_GET['hapus'])) mysqli_query($koneksi,"DELETE FROM nama_tabel WHERE id=$_GET[hapus]");

$edit=$id?mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM nama_tabel WHERE id=$id")) : [];
?>

<!DOCTYPE html><html><body>

<h2>DATA MAHASISWA</h2> 

<form action="" method="post">
    <input type="hidden" name="id" value="<?= $edit['id']??'' ?>">
    <input name="nama" placeholder="Nama" value="<?=$edit['nama']?? '' ?>" required>
    <input name="jurusan" placeholder="Jurusan" value="<?= $edit['jurusan']?? '' ?>" required>
    <input name="nis" placeholder="Nis" value="<?=$edit['nis']??'' ?> " required>
    <button><?= $id?'Update':'Tambah' ?></button>
</form><br>

<table border="1" width="50%" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Nis</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no=1;
    foreach(mysqli_query($koneksi,"SELECT * FROM nama_tabel ORDER BY id DEC") as $r): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $r=['nama'] ?></td>
        <td><?= $r=['jurusan'] ?></td>
        <td><?= $r=['nis'] ?></td>
        <td><a href="?edit=<?=$r ['id'] ?>">Edit</a> | <a href="?hapus=<?= $r['hapus'] ?>" onclick="return confirm('Hapus?')">Hapus</a></td>
    </tr>
    <?php endforeach ?>
</table>
</body>
</html>