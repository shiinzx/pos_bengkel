<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <label for="alas">Alas</label>
    <input type="number" name="alas" id=""><br>
    <label for="tinggi">Tinggi</label>
    <input type="number" name="tinggi" id=""><br>
    <label for="sisi">Sisi</label>
    <input type="number" name="sisi" id=""><br>
    <button type="submit" name="hitung">Hitung</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['hitung'])) {
    $alas = $_POST['alas'];
    $tinggi = $_POST['tinggi'];
    $sisi = $_POST['sisi'];
    $luas = 1/2 * ($alas * $tinggi);
    $keliling = $sisi * $sisi * $sisi;

    echo " Luas : ".$luas;
    echo "<br>";
    echo "Keliling".$keliling;
}
?>