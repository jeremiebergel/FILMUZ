<?php
//connexion à la base de donnees
require_once "connect.php";

//on récupere le type de films spécifie dans url si existe
$type = $_GET['type'] ?? 0;

//requete des films en fonction du type (parametre get)
$sql_row4 = "SELECT `id`, `titre`, `image`, `type` FROM `filmuz` WHERE `type` = :type;";
$stmt_row4 = $pdo->prepare($sql_row4);
$stmt_row4->bindValue(':type', $type, PDO::PARAM_STR);
$stmt_row4->execute();

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
<?php include "header.php"; ?>

<div class="div-film">
    <section>
        <?php
        //afficher toutes les affiches ('image' dans la bdd)
        while($row4 = $stmt_row4->fetch(PDO::FETCH_ASSOC)):

            ?>
            <div>
                <a href="song-info.php?type=<?=$row4['type']?>&id=<?=$row4['id']?>"><img src="<?=$row4['image']?>" alt="<?=$row4['titre']?>" class="affiche"></a>
            </div>

        <?php endwhile; ?>

    </section>
</div>
</body>

</html>