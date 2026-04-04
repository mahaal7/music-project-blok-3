<?php
require 'database.php';

$id = $_GET['id'];

// نجيب ألبوم واحد فقط
$album = $pdo->query("SELECT * FROM albums WHERE id = $id")->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Album Detail</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="detail">

    <h1><?= $album['titel'] ?></h1>

    <img src="<?= $album['thumbnail_url'] ?>">

    <p><strong>Artiest:</strong> <?= $album['artiest'] ?></p>
    <p><strong>Genre:</strong> <?= $album['genre'] ?></p>
    <p><strong>Prijs:</strong> €<?= $album['prijs'] ?></p>
    <p><strong>Release:</strong> <?= $album['releasedate'] ?></p>

    <p><?= $album['beschrijving'] ?></p>

    <br>
    <a href="index.php">← Terug</a>

</div>

</body>
</html>