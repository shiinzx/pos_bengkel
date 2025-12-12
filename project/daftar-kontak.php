<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 30px;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 70%;
        }
        th, td {
            border: 1px solid #999;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr.blocked {
            background-color: #ffe5e5;
            color: #999;
        }
        a {
            color: red;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        form {
            margin-top: 20px;
        }
        input, select {
            padding: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>

    <h1>DAFTAR KONTAK</h1>

    <!-- Form Pencarian -->
    <form method="GET">
        <input type="text" name="keyword" placeholder="Cari nama, negara, atau telpon" value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
        <input type="submit" value="Cari">
        <a href="?" style="margin-left: 10px; color: blue;">Reset</a>
    </form>

    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Negara</th>
            <th>No. Telpon</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        require_once('koneksii.php');

        // Proses pencarian
        $where = "";
        if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
            $keyword = mysqli_real_escape_string($koneksii, $_GET['keyword']);
            $where = "WHERE nama LIKE '%$keyword%' OR negara LIKE '%$keyword%' OR no_telpon LIKE '%$keyword%'";
        }

        $query = "SELECT * FROM daftar_kontak $where";
        $data = mysqli_query($koneksii, $query);
        $no = 1;
        while($kontak = mysqli_fetch_assoc($data)) :
        ?>
        <tr class="<?= $kontak['status'] === 'diblokir' ? 'blocked' : '' ?>">
            <td><?= $no++; ?></td>
            <td><?= $kontak['nama']; ?></td>
            <td><?= $kontak['negara']; ?></td>
            <td><?= $kontak['no_telpon']; ?></td>
            <td><?= $kontak['status']; ?></td>
            <td>
                <?php if ($kontak['status'] === 'aktif'): ?>
                    <a href="blokir.php?id=<?= $kontak['id']; ?>" onclick="return confirm('Yakin ingin memblokir kontak ini?')">Blokir</a>
                <?php else: ?>
                    <a href="unblokir.php?id=<?= $kontak['id']; ?>" onclick="return confirm('Yakin ingin membuka blokir kontak ini?')">Unblokir</a>
                <?php endif; ?>  //endif ini menutup kondisi if di atas.
                | <a href="edit.php?id=<?= $kontak['id']; ?>" style="color: green;">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Tambah Kontak</h2>
    <form action="tambah.php" method="POST">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="negara" placeholder="Negara" required>
        <input type="text" name="no_telpon" placeholder="No. Telpon" required>
        <input type="submit" value="Tambah">
    </form>

</body>
</html>
