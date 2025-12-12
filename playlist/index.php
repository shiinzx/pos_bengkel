<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'db.php'; ?>
<h1>🎧 Playlist Kamu</h1>
<a href="add.php">+ Tambah Lagu</a>
<table border="1">
    <tr>
        <th>Judul</th>
        <th>Artis</th>
        <th>Mood</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM songs ORDER BY created_at DESC");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['title']}</td>
            <td>{$row['artist']}</td>
            <td>{$row['mood']}</td>
            <td>{$row['category']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> | 
                <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Yakin?\")'>Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>
</body>
</html>