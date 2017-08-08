<?php
//connexion base de donnees
require_once "connect.php";

if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
}

$sql = "SELECT `type`, `titre`, `playlist`, `image`, `annee`, `compositeur`, `compobio` FROM `filmuz` WHERE `id` = :id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); // associer un nom (:) a ma variable ($), au type de valeur (PDO).
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>FILMUZ // <?=$row['titre']?></title>
    <link rel="stylesheet" href="css/screen.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link rel="icon" href="img-layout/favicon.png" />
</head>

<body>
    <?php include "include/header.php"?>
    <div class="film-info clearfix">
        <div class="film-medias">
            <img src="<?=$row['image']?>" alt="" class="affiche">
        </div>
        <div class="film-text">
                <h3 class="h3-<?=$row['type']?>"><?=$row['titre']?></h3>
                <span class="type-info">écouter la bande originale</span>
                <iframe src="<?=$row['playlist']?>&theme=white" width="340" height="280" frameborder="0" allowtransparency="true"></iframe>
                <span class="type-info">date de sortie du film</span>
                <p><?=$row['annee']?></p>
                <span class="type-info">compositeur</span>
                <p><?=$row['compositeur']?></p>
                <span class="type-info">à propos du compositeur</span>
                <p><?=$row['compobio']?></p>
        </div>
     </div>
    <?php include "include/footer.html"; ?>
</body>

</html>