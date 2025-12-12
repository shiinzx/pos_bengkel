<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>energi kinetik</title>
</head>
<body>
  <h1>Energi Kinetik</h1>
    <form method="post">
    massa: <input type="number" name="m" id=""> <br></br>
    volume: <input type="number" name="v" id=""> <br></br>
    <button type="submit" name="hitung">Hitung</button>
  </form>
</body>
</html>

<?php
if(isset($_POST['hitung'])) {
  $m = $_POST['m'];
  $v = $_POST['v'];
  $g = 9.8;
  $fa = $g * $m * $v;

  echo "Hasil :".$fa;
}
?>