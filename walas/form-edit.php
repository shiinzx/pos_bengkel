<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("config.php");

// kalau tidak ada nis di query string
if( !isset($_GET['nis']) ){
    header('Location: list-siswa.php');
}

// ambil nis dari query string
$nis = $_GET['nis'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM siswa WHERE nis='$nis'";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Pendaftaran Siswa | XI PPLG 1</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Pendaftaran Siswa</h3>
    </header>

    <form action="proses-edit.php" method="POST">
        <fieldset>

            <input type="hidden" name="nis" value="<?php echo $siswa['nis'] ?>" />

        <p>
            <label for="nis">nis: </label>
            <input type="text" name="nis" placeholder="nomor induk siswa" value="<?php echo $siswa['nis'] ?>" readonly />
        </p>
        <p>
            <label for="nama_siswa">Nama Siswa: </label>
            <input type="text" name="nama_siswa" placeholder="nama lengkap" value="<?php echo $siswa['nama_siswa'] ?>" />
        </p>
        <p>
            <label for="tanggal_lahir">Tanggal Lahir: </label>
            <input type="date" name="tanggal_lahir" value="<?php echo $siswa['tanggal_lahir'] ?>" />
        </p>
        <p>
            <label for="alamat">Alamat: </label>
            <textarea name="alamat" placeholder="alamat lengkap"><?php echo $siswa['alamat'] ?></textarea>
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
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>
    </form>

</body>
</html>