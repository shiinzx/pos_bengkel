<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">GEOMETRY</h1>
    <form action="" method="post">
        <label for="sisi">Sisi</label>
        <input type="number" name="sisi" id=""><br>
        <button type="submit" name="hitung">Hitung</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['hitung'])){
    $sisi = $_POST['sisi'];
    $luas = $sisi * $sisi;
    $keliling = $sisi * 4;

    echo "Luas :".$luas;
    echo "<br>";
    echo "Keliling :".$keliling;
}
?>