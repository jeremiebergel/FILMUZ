<?php
require "connect.php";
$search = $_GET['recherche'];

//requete sql qui prend champs id et images si la recherche est trouvé dans titre, compositeur ou annee
$stmt = $pdo->prepare("SELECT id, image 
FROM filmuz 
WHERE titre LIKE :search 
OR compositeur LIKE :search 
OR annee LIKE :search");
$stmt->bindValue(':search','%'.$search.'%');
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>FILMUZ // Recherche pour "<?=$search?>"</title>
<link rel="stylesheet" href="css/screen.css">
<link rel="icon" href="img-layout/favicon.png" />
</head>

<body>
<?php include "include/header.php"; ?>

<div class="div-film">
    <section>
        <?php
        //afficher tous les résultats (affiches de film) trouvés
        if($stmt->rowCount() > 0):
            while ($affiche = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div>
                    <a href="song-info.php?id=<?= $affiche['id'] ?>"><img src="<?= $affiche['image'] ?>" alt="<?= $affiche['titre'] ?>" class="affiche"></a>
                </div>
            <?php endwhile;
        //si pas de résultat, afficher message
        else: ?>
            <div class="result">
                <p>pas de résultat</p>
            </div>
        <?php endif; ?>

    </section>
</div>
</body>

</html>