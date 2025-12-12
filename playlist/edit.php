<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM songs WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $mood = $_POST['mood'];
    $category = $_POST['category'];
    $lyrics = $_POST['lyrics'];
    $note = $_POST['note'];

    $sql = "UPDATE songs SET
        title='$title',
        artist='$artist',
        mood='$mood',
        category='$category',
        lyrics='$lyrics',
        personal_note='$note'
        WHERE id=$id";

    $conn->query($sql);
    header("Location: index.php");
}
?>

<h2>Edit Lagu</h2>
<form method="post">
    Judul: <input type="text" name="title" value="<?= $row['title'] ?>"><br>
    Artis: <input type="text" name="artist" value="<?= $row['artist'] ?>"><br>
    Mood: <input type="text" name="mood" value="<?= $row['mood'] ?>"><br>
    Kategori: <input type="text" name="category" value="<?= $row['category'] ?>"><br>
    Lirik: <textarea name="lyrics"><?= $row['lyrics'] ?></textarea><br>
    Catatan: <textarea name="note"><?= $row['personal_note'] ?></textarea><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">← Kembali</a>
