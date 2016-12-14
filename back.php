<?php
require_once "connect.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    $id = 1;
}

$sql = "SELECT `titre` FROM `filmuz` ORDER BY `titre`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>FILMUZ // Gestion des films</title>
    <link rel="stylesheet" href="css/screen.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link rel="icon" href="img-layout/favicon.png" />
</head>

<body>
<?php include "header.php"?>

<div class="adm-index clearfix">
    <div class="add-form">
        <h3 class="adm-titre">Ajouter un nouveau film</h3>
        <!-- METTRE LE FORMULAIRE -->
    </div>
    <div class="movie-list">
        <h3 class="adm-titre">Liste des films</h3>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <ul>
            <li class="titre-film"><?=$row['titre']?> <span class="actions"><a href="modifier.php">Modifier</a> / <a href="supp.php">Supprimer</a></span></li>
            </ul>
        <?php endwhile; ?>

    </div>
</div>
</body>

</html>