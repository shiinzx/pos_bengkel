<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | XI PPLG 1</title>
</head>

<body>
    <header>
        <h3>Siswa yang sudah terdaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>
    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT siswa.nis, siswa.nama_siswa, siswa.tanggal_lahir, siswa.alamat, kelas.nama_kelas FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas";
        $query = mysqli_query($db, $sql);
        $no=0;

        while($siswa = mysqli_fetch_array($query)){
            $no++;
            echo "<tr>";

            echo "<td>".$no."</td>";
            echo "<td>".$siswa['nis']."</td>";
            echo "<td>".$siswa['nama_siswa']."</td>";
            echo "<td>".$siswa['tanggal_lahir']."</td>";
            echo "<td>".$siswa['alamat']."</td>";
            echo "<td>".$siswa['nama_kelas']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?nis=".$siswa['nis']."'>Edit</a> | ";
            echo "<a href='hapus.php?nis=".$siswa['nis']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

</body>
</html>