<?php
require "connect.php";
$search = $_GET['recherche'];

//$stmt = $pdo->prepare("SELECT image FROM filmuz WHERE titre LIKE :search");
$stmt = $pdo->prepare("SELECT id, image FROM filmuz WHERE titre LIKE :search OR compositeur LIKE :search OR annee LIKE :search");
$stmt->bindValue(':search','%'.$search.'%');
$stmt->execute();

$films = [];
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
        //afficher toutes les affiches (image) de la premiere rangee
        if($stmt->rowCount() > 0) {
            while ($affiche = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div>
                    <a href="song-info.php?id=<?= $affiche['id'] ?>"><img src="<?= $affiche['image'] ?>" alt="<?= $affiche['titre'] ?>" class="affiche"></a>
                </div>
            <?php endwhile;
        } else { ?>
            <div class="result">
                <p>pas de résultat</p>
            </div>
        <?php } ?>

    </section>
</div>
</body>

</html>