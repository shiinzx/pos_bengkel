<?php
$conn = mysqli_connect('localhost','root','','nama_database') or die ('Gagal koneksi!');

$id = $_GET['edit'] ?? null;

if ($_POST) {
    $a = $_POST;
    $sql = $a['id']
        ?"UPDATE nama_table SET nama='$a[nama]', jurusan='$a[jurusan]', nis=$a[nis] WHERE id=$a[id]"
        :"INSERT INTO nama_table(nama,jurusan,nis) VALUES ('$a[nama]','$a[jurusan]',$a[nis])";
    mysqli_query($conn,$sql);
}

if(isset($_GET['hapus'])) mysqli_query($conn,"DELETE FROM nama_table WHERE id=$_GET[hapus]");

$edit=$id?mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM nama_table WHERE id=$id")):[];
?>

<!DOCTYPE html><html><body>

<h2>Data Mahasiswa</h2>

<form method="action">
    <input type="hidden" name="id" value="<?= $edit['id']??'' ?>">
    <input name="nama" placeholder="Nama" value="<?= $edit['nama']??'' ?>" required>
    <input name="jurusan" placeholder="Jurusan" value="<?= $edit['jurusan']??'' ?>" required>
    <input name="nis" type="number" placeholder="NIS" value="<?= $edit['nis']??'' ?>" required>
    <button><?= $id?'Update':'Tambah' ?></button>
</form><br>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>NIS</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    foreach(mysqli_query($conn,"SELECT * FROM nama_table ORDER BY id DESC") as $r): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>$r['nama']?></td>
            <td>$r['jurusan']?></td>
            <td>$r['nis']?></td>
            <td><a href="?edit=<?= $r['id'] ?>">Edit</a> | <a href="?hapus=<?= $r['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a></td>
        </tr>
    <?php endforeach ?>
</table>
</body></html>