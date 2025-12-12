<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <label for="panjang">Panjang</label>
    <input type="number" name="panjang" id=""><br>
    <label for="lebar">Lebar</label>
    <input type="number" name="lebar" id=""><br>
    <button type="submit" name="hitung">Hitung</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['hitung'])) {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $luas = $panjang * $lebar;
    $keliling = 2 * ($panjang + $lebar);

    echo " Luas : ".$luas;
    echo "<br>";
    echo "Keliling".$keliling;
}
?>