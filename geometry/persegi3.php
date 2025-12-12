<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hitung Persegi | Estetik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Font Quicksand -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.2);
        }

        form {
            background-color: #ffffffcc;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #5f27cd;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-size: 16px;
        }

        button {
            width: 100%;
            background-color: #5f27cd;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #341f97;
        }

        .result {
            margin-top: 25px;
            background-color: #ffe0f7;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .result p {
            margin: 10px 0;
            font-size: 18px;
            color: #2d3436;
        }

        footer {
            margin-top: 40px;
            color: #fff;
            font-size: 0.9em;
            opacity: 0.7;
        }
    </style>
</head>
<body>

    <h1>📐 Kalkulator Persegi</h1>

    <form method="POST">
        <label for="sisi">Masukkan panjang sisi (cm):</label>
        <input type="number" name="sisi" id="sisi" required min="1" step="any">
        <button type="submit" name="hitung">Hitung Sekarang 💫</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $sisi = $_POST['sisi'];
        $luas = $sisi * $sisi;
        $keliling = 4 * $sisi;

        echo "<div class='result'>";
        echo "<p>✨ <strong>Hasil Perhitungan:</strong></p>";
        echo "<p>📏 Luas: <strong>$luas cm²</strong></p>";
        echo "<p>🧮 Keliling: <strong>$keliling cm</strong></p>";
        echo "</div>";
    }
    ?>

    <footer>Build with 💜🤭</footer>

</body>
</html>
