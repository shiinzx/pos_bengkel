<?php
require_once('koneksii.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $koneksii->prepare("UPDATE daftar_kontak SET status = 'diblokir' WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: daftar-kontak.php"); // atau index.php, sesuai nama file kamu
exit;
?>
