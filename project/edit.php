<?php
require_once('koneksii.php');

// Ambil ID dari parameter GET
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = (int)$_GET['id'];

// Ambil data berdasarkan ID
$query = mysqli_query($koneksii, "SELECT * FROM daftar_kontak WHERE id = $id");
$kontak = mysqli_fetch_assoc($query);

if (!$kontak) {
    echo "Data tidak ditemukan!";
    exit;
}

// Proses update ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($koneksii, $_POST['nama']);
    $negara = mysqli_real_escape_string($koneksii, $_POST['negara']);
    $no_telpon = mysqli_real_escape_string($koneksii, $_POST['no_telpon']);

    $update = mysqli_query($koneksii, "UPDATE daftar_kontak SET 
        nama = '$nama', 
        negara = '$negara', 
        no_telpon = '$no_telpon' 
        WHERE id = $id");

    if ($update) {
        header('Location: index.php');
        exit;
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kontak</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 50px; }
        input { padding: 8px; margin: 10px; width: 250px; }
    </style>
</head>
<body>
    <h2>Edit Kontak</h2>
    <form method="POST">
        <input type="text" name="nama" value="<?= htmlspecialchars($kontak['nama']) ?>" required><br>
        <input type="text" name="negara" value="<?= htmlspecialchars($kontak['negara']) ?>" required><br>
        <input type="text" name="no_telpon" value="<?= htmlspecialchars($kontak['no_telpon']) ?>" required><br>
        <input type="submit" value="Simpan Perubahan">
        <br><br>
        <a href="index.php">Kembali ke Daftar Kontak</a>
    </form>
</body>
</html>
