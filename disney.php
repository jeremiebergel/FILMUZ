<?php
require_once "connect.php";
$sql_row4 = "SELECT `id`, `titre`, `image` FROM `filmuz` WHERE `type` = 'disney' LIMIT 4;";
$stmt_row4 = $pdo->prepare($sql_row4);
$stmt_row4->execute();
$sql_row4b = "SELECT `id`, `titre`, `image` FROM `filmuz` WHERE `type` = 'disney' LIMIT 4 OFFSET 4;";
$stmt_row4b = $pdo->prepare($sql_row4b);
$stmt_row4b->execute();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>filmuz // western</title>
    <link rel="stylesheet" href="css/screen.css">
</head>

<body>
    <header class="header-disney clearfix">
        <a href="index.php"><img src="img-layout/logo.png" class="logo" alt="logo"></a>
        <nav>
            <ul>
                <li><a href="western.php">western</a></li>
                <li><a href="scifi.php">sci-fi</a></li>
                <li id="active"><a href="disney.php">disney</a></li>
                <li><a href="action.php">action</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <form method="post" action="search.php" />
            <input type="text" name="recherche" id="search" placeholder="rechercher une bo">
            <input type="button" name="bouton" id="bouton" value="OK">
        </div>
    </header>
    <div class="div-film">
        <section class="row4">
            <?php
            while($row4 = $stmt_row4->fetch(PDO::FETCH_ASSOC)):
                ?>
                <div><a href="song-info.php?id=<?=$row4['id']?>"><img src="<?=$row4['image']?>" alt="<?=$row4['titre']?>"></a></div>
            <?php endwhile; ?>
        </section>
        <section class="row4">
            <?php
            while($row4b = $stmt_row4b->fetch(PDO::FETCH_ASSOC)):
                ?>
                <div><a href="song-info.php?id=<?=$row4b['id']?>"><img src="<?=$row4b['image']?>" alt="<?=$row4b['titre']?>"></a></div>
            <?php endwhile; ?>
        </section>
    </div>
</body>

</html>