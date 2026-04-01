<?php
require 'database.php';

$id = $_GET['id'];

$result = $pdo->query("SELECT * FROM albums WHERE id = $id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Album Detail</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

<?php foreach ($result as $album): ?>

<div class="detail">

    <h1><?= $album['titel'] ?></h1>

    <img src="images/<?= $album['thumbnail_url'] ?>">

    <p><strong>Artiest:</strong> <?= $album['artiest'] ?></p>
    <p><strong>Genre:</strong> <?= $album['genre'] ?></p>
    <p><strong>Prijs:</strong> €<?= $album['prijs'] ?></p>
    <p><strong>Release:</strong> <?= $album['releasedate'] ?></p>

    <p><?= $album['beschrijving'] ?></p>

    <br>
    <a href="index.php">← Terug</a>

</div>

<?php endforeach; ?>

</body>
</html>