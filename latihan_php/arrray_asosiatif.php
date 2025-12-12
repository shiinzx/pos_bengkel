<?php
// array asosiatif > array yang memiliki index berupa string
$siswa = [
    'nama' => 'Nisa',
    'umur' => 16,
    'email' => 'nisa@gmail.com'
];

// cara menampilkan satu elemen
echo $siswa['nama'] . '<br>';

// cara menampilkan semua elemen
foreach ($siswa as $s)

// menampilkan banyak
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

    foreach ($siswa as $s)
?>