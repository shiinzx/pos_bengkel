<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <label for="rusuk">rusuk</label>
    <input type="number" name="rusuk" id=""><br>
    <button type="submit" name="hitung">Hitung</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['hitung'])) {
    $rusuk = $_POST['rusuk'];
    $volume = $rusuk ** 3;
    $luas = 4 * $rusuk ** 2;

    echo " Volume : ".$volume;
    echo "<br>";
    echo "Luas : ".$luas;
}
?>