<?php
require_once "connect.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    $id = 1;
}

$sql = "SELECT `type`, `titre`, `playlist`, `image`, `annee`, `compositeur`, `compobio` FROM `filmuz` WHERE `id` = :id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>filmuz // <?=$row['titre']?></title>
    <link rel="stylesheet" href="css/screen.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"> </head>

<body>
    <header class="header-home clearfix">
       <a href="index.php"><img src="img-layout/logo.png" class="logo" alt="logo"></a>
       <nav>
            <ul>
                <li><a href="western.php">western</a></li>
                <li><a href="scifi.php">sci-fi</a></li>
                <li><a href="disney.php">disney</a></li>
                <li><a href="action.php">action</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <form method="post" action="search.php" />
                <input type="text" name="recherche" id="search" placeholder="rechercher une bo">
                <input type="button" name="bouton" id="bouton" value="OK">
        </div>
    </header>
    <div class="film-info clearfix">
        <div class="film-medias">
            <img src="<?=$row['image']?>" alt="" class="affiche">
        </div>
        <div class="film-text">
                <h3 class="h3-western"><?=$row['titre']?></h3>
                <span class="type-info">écouter bande originale</span>
                <iframe src="<?=$row['playlist']?>&theme=white" width="340" height="280" frameborder="0" allowtransparency="true"></iframe>
                <span class="type-info">date de sortie du film</span>
                <p><?=$row['annee']?></p>
                <span class="type-info">compositeur</span>
                <p><?=$row['compositeur']?></p>
                <span class="type-info">à propos du compositeur</span>
                <p><?=$row['compobio']?></p>
        </div>
     </div>
</body>

</html>