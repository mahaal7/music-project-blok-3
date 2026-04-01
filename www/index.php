<?php
require 'database.php';

// ophalen van alle albums
$result = $pdo->query("SELECT * FROM albums");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Albums</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

<h1>Albums Overzicht</h1>

<div class="container">
<?php foreach ($result as $album): ?>
    
    <div class="card">
        <h3>
            <a href="detail.php?id=<?= $album['id'] ?>">
                <?= $album['titel'] ?>
            </a>
        </h3>

        <p><?= $album['artiest'] ?></p>

        <img src="images/<?= $album['thumbnail_url'] ?>">
    </div>

<?php endforeach; ?>
</div>

</body>
</html>