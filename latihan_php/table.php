<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" width="50%" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Kota</th>
        </tr>

<?php
$siswa = [
    ['nama' => 'Devano',
     'umur' => 18,
     'kota' => 'cianjur'],
    [
     'nama' => 'Aldebaran',
     'umur' => 17,
     'kota' => 'Jakarta'],
    [
     'nama' => 'Nanuna',
     'umur' => 15,
     'kota' => 'Tasik'],
    [
     'nama' => 'Asmara',
     'umur' => 19,
     'kota' => 'Cibaduyut'],
    [
     'nama' => 'Jayapura',
     'umur' => 79,
     'kota' => 'Malioboro'],
];
    $no = 1;
     foreach($siswa as $s) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $s['nama'] . "</td>";
        echo "<td>" . $s['umur'] . "</td>";
        echo "<td>" . $s['kota'] . "</td>";
        echo "</tr>";
     }
     ?>
    </table>
</body>
</html>

<tr>
        <td><?= issset($i) ? ++$i : $i=1; ?></td>
        <td><?= $siswa['nama']; ?></td>
        <td><?= $siswa['umur']; ?></td>
        <td><?= $siswa['kota']; ?></td>
    </tr>