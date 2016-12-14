<?php
//connexion à la base de donnees
require_once "connect.php";

//on récupere le type de films spécifie dans url si existe
$type = $_GET['type'] ?? 0;

//premiere requete pour premiere rangee films (les 4 premiers films)
$sql_row4 = "SELECT `id`, `titre`, `image`, `type` FROM `filmuz` WHERE `type` = :type LIMIT 4;";
$stmt_row4 = $pdo->prepare($sql_row4);
$stmt_row4->bindValue(':type', $type);
$stmt_row4->execute();

//deuxieme requete pour deuxieme rangee films (les 4 films suivants arpès le 4eme)
$sql_row4b = "SELECT `id`, `titre`, `image`, `type` FROM `filmuz` WHERE `type` = :type LIMIT 4 OFFSET 4;";
$stmt_row4b = $pdo->prepare($sql_row4b);
$stmt_row4b->bindValue(':type', $type);
$stmt_row4b->execute();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>FILMUZ // <?=$type?></title>
    <link rel="stylesheet" href="css/screen.css">
    <link rel="icon" href="img-layout/favicon.png" />
</head>

<body>
<!--<header class="header- clearfix">
    <a href="index.php"><img src="img-layout/logo.png" class="logo" alt="logo"></a>
    <nav>
        <ul>
            <li id="active"><a href="genre.php?type=western">western</a></li>
            <li><a href="genre.php?type=sci-fi">sci-fi</a></li>
            <li><a href="genre.php?type=disney">disney</a></li>
            <li><a href="genre.php?type=action">action</a></li>
        </ul>
    </nav>
    <div class="search-bar">
        <form method="post" action="search.php" />
        <input type="text" name="recherche" id="search" placeholder="rechercher une bo ">
        <input type="button" name="bouton" id="bouton" value="OK">
    </div>
</header>-->

<?php include "header.php"; ?>

<div class="div-film">
    <section class="row4">
        <?php
        //afficher toutes les affiches (image) de la premiere rangee
        while($row4 = $stmt_row4->fetch(PDO::FETCH_ASSOC)):
            ?>
            <div><a href="song-info.php?type=<?=$row4['type']?>&id=<?=$row4['id']?>"><img src="<?=$row4['image']?>" alt="<?=$row4['titre']?>"></a></div>
        <?php endwhile; ?>
    </section>
    <section class="row4">
        <?php
        //afficher toutes les affiches (image) de la deuxieme rangee
        while($row4b = $stmt_row4b->fetch(PDO::FETCH_ASSOC)):
            ?>
            <div><a href="song-info.php?type=<?=$row4b['type']?>&id=<?=$row4b['id']?>"><img src="<?=$row4b['image']?>" alt="<?=$row4b['titre']?>"></a></div>
        <?php endwhile; ?>
    </section>
</div>
</body>

</html>