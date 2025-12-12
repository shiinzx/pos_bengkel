<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru | XI PPLG 1 </title>
</head>
<body>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>

    <form action="proses-daftar.php" method="POST">
        <fieldset>
        <p>
            <label for="nis">NIS: </label>
            <input type="text" name="nis" placeholder="nomor induk siswa" />
        </p>
        <p>
            <label for="nama_siswa">Nama Siswa: </label>
            <input type="text" name="nama_siswa" placeholder="nama lengkap" />
        </p>
        <p>
            <label for="tanggal_lahir">Tanggal Lahir: </label>
            <input type="date" name="tanggal_lahir" />
        </p>
        <p>
            <label for="alamat">Alamat: </label>
            <textarea name="alamat" placeholder="alamat lengkap"></textarea>
        </p>
        <p>
            <label for="id_kelas">Kelas: </label>
            <select name="id_kelas">
            <?php
                $sql = "SELECT * FROM kelas";
                $query = mysqli_query($db, $sql);
                while($kelas = mysqli_fetch_array($query)){
                    echo "<option value=" . $kelas['id_kelas'] . ">" . $kelas['nama_kelas'] . "</option>";
                }
            ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Daftar" name="daftar" />
        </p>

        </fieldset>
    </form>

</body>
</html>