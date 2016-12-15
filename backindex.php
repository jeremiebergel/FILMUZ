<?php
require_once "connect.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    $id = 1;
}

//requete sql recupere tous les titres de films et id associes dans la table filmuz
//et trie par ordre alphabetique des titres de films
$sql = "SELECT `titre`, `id` FROM `filmuz` ORDER BY `titre`";
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
        <h3 class="adm-titre">ajouter un nouveau film</h3>
        <fieldset>

            <form action="add.php" method="post">

            <div>
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" placeholder="titre du film" required>
            </div>
            <div>
                <label for="type">Type</label>
                <input type="text" name="type" id="type" placeholder="type du film" required>
            </div>
            <div>
                <label for="playlist">Playlist</label>
                <input type="url" name="playlist" id="playlist" placeholder="lien de la musique" required>
            </div>
            <div>
                <label for="image">Image </label>
                <input type="text" name="image" id="image" required>
            </div>
            <div>
                <label for="annee">Année</label>
                <input type="text" name="annee" id="annee" placeholder="année du film" required>
            </div>
            <div>
                <label for="compositeur">Compositeur</label>
                <input type="text" name="compositeur" id="compositeur" placeholder="nom du compositeur" required>
            </div>
            <div>
                <label for="compobio">Biographie</label>
                <textarea rows="10" name="compobio" placeholder="description + anecdote" required></textarea>
            </div>
            <input type="submit" value="Valider">
            </form>

        </fieldset>
    </div>
    <div class="movie-list">
        <h3 class="adm-titre">liste des films</h3>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <ul>
            <li class="titre-film"><?=$row['titre']?> <span class="actions"><a href="change.php?id=<?=$row['id']?>">Modifier</a> / <a href="delete.php?id=<?=$row['id']?>" onclick="return confirm('Êtes vous sur de vouloir supprimer ce film ?')">Supprimer</a></span></li>
            </ul>
        <?php endwhile; ?>

    </div>
</div>
</body>

</html>