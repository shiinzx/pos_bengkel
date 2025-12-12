<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kontak</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 40px;
            color: #007bff;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            font-size: 36px;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 85%;
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 14px 16px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e6f7ff;
            transition: 0.3s ease;
        }

        a {
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        a[href*="edit.php"] {
            color: #28a745;
        }

        a[href*="hapus.php"] {
            color: #dc3545;
        }

        a:hover {
            text-decoration: underline;
            opacity: 0.8;
        }

        div {
            text-align: center;
            margin-top: 30px;
        }

        a[href="tambah.php"] {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            font-size: 16px;
            display: inline-block;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
            transition: background-color 0.3s ease;
        }

        a[href="tambah.php"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1 align="center">DAFTAR KONTAK</h1>
    <table border="1" width="50%" cellspacing="0" align="center">
        <tr>
            <th>NO.</th>
            <th>NAMA</th>
            <th>NEGARA</th>
            <th>NO. TELPON</th>
            <th>AKSI</th>
        </tr>

        <?php
        require_once('koneksi.php');
        
        $data = mysqli_query($koneksi, "SELECT * FROM db_kontak");
        $no = 1; 

        while($kontak = mysqli_fetch_assoc($data)) :
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $kontak['nama']; ?></td>
                <td><?= $kontak['negara']; ?></td>
                <td><?= $kontak['no_telepon']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $kontak['id']; ?>">Edit</a> | 
                    <a href="hapus.php?id=<?= $kontak['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus nomor ini?')">Delete</a>
                </td>
            </tr>
        <?php 
        endwhile; 
        ?>
    </table>

    <!-- Tambah Kontak di bawah tabel -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="tambah.php" style="background-color: #28a745; color: white; padding: 10px 20px; border-radius: 4px;">+ Tambah Kontak</a>
    </div>

</body>
</html>
