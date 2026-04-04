<?php
require 'database.php';

// القيم
$genre = $_GET['genre'] ?? "";
$artiest = $_GET['artiest'] ?? "";
$sort = $_GET['sort'] ?? "";
$size = $_GET['size'] ?? "normal";

// حماية
if ($size != "small" && $size != "normal" && $size != "large") {
    $size = "normal";
}

// كويري
$query = "SELECT * FROM albums WHERE 1";

if ($genre != "") {
    $query .= " AND genre = '$genre'";
}

if ($artiest != "") {
    $query .= " AND artiest = '$artiest'";
}

if ($sort == "nieuw") {
    $query .= " ORDER BY releasedate DESC";
}
elseif ($sort == "oud") {
    $query .= " ORDER BY releasedate ASC";
}

$albums = $pdo->query($query)->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Albums</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="<?= $size ?>">

<h1>Albums</h1>

<p><?= count($albums) ?> results</p>

<form method="GET">

    <!-- genre -->
    <select name="genre" onchange="this.form.submit()">
        <option value="">All genres</option>
        <option value="Pop" <?= $genre == "Pop" ? "selected" : "" ?>>Pop</option>
        <option value="Rock" <?= $genre == "Rock" ? "selected" : "" ?>>Rock</option>
        <option value="Jazz" <?= $genre == "Jazz" ? "selected" : "" ?>>Jazz</option>
    </select>

    <!-- sort -->
    <select name="sort" onchange="this.form.submit()">
        <option value="">Geen sort</option>
        <option value="nieuw" <?= $sort == "nieuw" ? "selected" : "" ?>>Nieuw → Oud</option>
        <option value="oud" <?= $sort == "oud" ? "selected" : "" ?>>Oud → Nieuw</option>
    </select>

    <!-- artiest -->
    <select name="artiest" onchange="this.form.submit()">
        <option value="">All artists</option>

        <option value="Michael Jackson" <?= $artiest == "Michael Jackson" ? "selected" : "" ?>>Michael Jackson</option>
        <option value="Pink Floyd" <?= $artiest == "Pink Floyd" ? "selected" : "" ?>>Pink Floyd</option>
        <option value="Amy Winehouse" <?= $artiest == "Amy Winehouse" ? "selected" : "" ?>>Amy Winehouse</option>
        <option value="Adele" <?= $artiest == "Adele" ? "selected" : "" ?>>Adele</option>
        <option value="Nirvana" <?= $artiest == "Nirvana" ? "selected" : "" ?>>Nirvana</option>
        <option value="Miles Davis" <?= $artiest == "Miles Davis" ? "selected" : "" ?>>Miles Davis</option>
        <option value="The Beatles" <?= $artiest == "The Beatles" ? "selected" : "" ?>>The Beatles</option>
        <option value="Fleetwood Mac" <?= $artiest == "Fleetwood Mac" ? "selected" : "" ?>>Fleetwood Mac</option>
        <option value="Lauryn Hill" <?= $artiest == "Lauryn Hill" ? "selected" : "" ?>>Lauryn Hill</option>
        <option value="Prince" <?= $artiest == "Prince" ? "selected" : "" ?>>Prince</option>
        <option value="Radiohead" <?= $artiest == "Radiohead" ? "selected" : "" ?>>Radiohead</option>
        <option value="Dr. Dre" <?= $artiest == "Dr. Dre" ? "selected" : "" ?>>Dr. Dre</option>
        <option value="Bruce Springsteen" <?= $artiest == "Bruce Springsteen" ? "selected" : "" ?>>Bruce Springsteen</option>
        <option value="Joni Mitchell" <?= $artiest == "Joni Mitchell" ? "selected" : "" ?>>Joni Mitchell</option>
        <option value="Daft Punk" <?= $artiest == "Daft Punk" ? "selected" : "" ?>>Daft Punk</option>
    </select>

    <!-- font size -->
    <select name="size" onchange="this.form.submit()">
        <option value="small" <?= $size == "small" ? "selected" : "" ?>>Small</option>
        <option value="normal" <?= $size == "normal" ? "selected" : "" ?>>Normal</option>
        <option value="large" <?= $size == "large" ? "selected" : "" ?>>Large</option>
    </select>

</form>

<div class="container">

<?php foreach ($albums as $album): ?>

    <a href="detail.php?id=<?= $album['id'] ?>" class="link">
        
        <div class="card">
            
            <h2><?= $album['titel'] ?></h2>

            <img src="<?= $album['thumbnail_url'] ?>">

            <p><?= $album['artiest'] ?></p>
            <p><?= $album['prijs'] ?> €</p>

        </div>

    </a>

<?php endforeach; ?>

</div>

</body>
</html>