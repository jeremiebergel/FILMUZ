<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FILMUZ</title>
    <link rel="stylesheet" href="css/screen.css">
    <link rel="icon" href="img-layout/favicon.png" />
</head>
<body>
<?php
//appel de header.php
include "include/header.php";

//connexion a la base de donnees
require_once "connect.php";

//on selectionne tous les types presents (uniquement si differents) dans la bdd
$sql = "SELECT DISTINCT `type` FROM `filmuz`;";
$stmt = $pdo->prepare($sql);
$stmt->execute();?>

    <nav class="nav-big">
        <ul>
            <?php
            //pour tous les types resultant de la requete sql, on affiche un 'li'
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
            ?>
            <li><a href="genre.php?type=<?=$row['type']?>"><img src="img-content/<?=$row['type']?>.jpg" alt=""><div class="nav-genre"><span><?=$row['type']?></span></div></a></li>
            <?php endwhile; ?>
        </ul>
    </nav>
</body>
</html>
