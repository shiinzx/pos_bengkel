<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $mood = $_POST['mood'];
    $category = $_POST['category'];
    $lyrics = $_POST['lyrics'];
    $note = $_POST['note'];

    $sql = "INSERT INTO songs (title, artist, mood, category, lyrics, personal_note)
            VALUES ('$title', '$artist', '$mood', '$category', '$lyrics', '$note')";
    $conn->query($sql);

    header("Location: index.php");
}
?>

<h2>Tambah Lagu 🎵</h2>
<form method="post">
    Judul: <input type="text" name="title" required><br>
    Artis: <input type="text" name="artist" required><br>
    Mood: <input type="text" name="mood"><br>
    Kategori: <input type="text" name="category"><br>
    Lirik: <textarea name="lyrics"></textarea><br>
    Catatan Pribadi: <textarea name="note"></textarea><br>
    <button type="submit">Simpan</button>
</form>
<a href="index.php">← Kembali</a>
