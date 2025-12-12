<!DOCTYPE html>
<html>
<body>
    <h1>PERPUSTAKAAN PEMINJAMAN BUKU</h1>
    <form method="post">
        <input type="hidden" name="id" values="<?= $edit['id']?? '' ?>">
        <input name="nama" placeholder="Nama" values="<?= $edit['nama']?? '' ?>" required>
        <input name="penulis" placeholder="Penulis" values="<?= $edit['penulis']?? '' ?>" required>
        <input name="penerbit" placeholder="Penerbit" values="<?= $edit['penerbit']?? ''?>" required>
        <button><?= $id?'Update':'Tambah' ?></button>
    </form>

    <table border="1" width="50%" cellspacing="0">
        <th>No</th>
        <th>Nama</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Aksi</th>
    </table>

    <?php
    $no=1;
    foreach(mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC") as $r): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $r['nama'] ?></td>
        <td><?= $r['penulis'] ?></td>
        <td><?= $r['penerbit'] ?></td>
    </tr>
    <?php endforeach ?>
</body>
</html>