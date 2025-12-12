<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form method="post" action="">
        <h1>Rumus Bola</h1>
        <div class="form-group">
            <label for="jari">Jari-Jari</label>
            <input type="number" name="jari" id=""><br>
        </div>
        <div class="form-group">
            <button type="submit" name="btnHitung">Hitung</button>
            <button type="reset">Reset</button>
        </div>
    </form>
    <?php 
    if(isset($_POST['btnHitung'])){ //isset mengecek keberadaan variabel
        // echo $_POST['jari']; (untuk ngecek pas ngeclick submit muncul tidak)
        $jari = $_POST['jari'];
        $volume = 3/4 * 3.14 * $jari ** 3;
        $lp = 4 * 3.14 * pow($jari,2);
    echo '
    <div class="hasil">
        <h1>Hasil</h1>
      <div>
      Volume : '.number_format($volume,2,',', '.').' cm<sup>3</sup><br>
      Luas Permukaan : '.number_format($lp, 2, ',', '.').' cm<sup>2</sup>'
      .'
      </div>
    </div>';
    }
    ?>
</body>
</html>