<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PERSEGI</h1>
    <form action="" method="post">
        <label for="sisi">Sisi</label>
        <input type="number" name="sisi" id="">
        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
    if(isset($_POST['hitung'])){
        $sisi = $_POST['hitung'];
        $luas = $sisi * $sisi;
        $keliling = $sisi * 4;
    }
    echo"Luas :".$luas;
    echo"<br>";
    echo"Keliling :".$keliling;
    ?>
</body>
</html>