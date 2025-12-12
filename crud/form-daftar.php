<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru | XI PPLG 2</title>
</head>
<body>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>
    <form action="proses-daftar.php" method="POST">
        <fieldset>
        <p><label for="nis">NIS:</label><input type="text" name="nis" placeholder="nomor indux siswa" /></p>
        <p><label for="nama_siswa">Nama Siswa:</label><input type="text" name="nama siswa" placeholder="nama lengkap" /></p>
        <p><label for="tanggal_lahir">Tanggal Lahir:</label><input type="date" name="tanggal_lahir" /></p>
        <p><label for="alamat">Alamat: </label><textarea name="alamat" placeholder="alamat lengkap"></textarea></p>
        <p><label for="id_kelas">Kelas: </label><select name="id_kelas">
            <?php
            $sql = "SELECT * FROM kelas";
            $query = mysqli_query(mysql: $db, query: $sql);

            while($kelas = mysqli_fetch_array(result: $query)){
                echo "<option value+'".$kelas['id_kelas']."'>".$kelas['nama_kelas']."</option>";
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