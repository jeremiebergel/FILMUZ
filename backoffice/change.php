<?php
//connexion base de donnees
require_once "../connect.php";

//si id existe, alors $id = id precise dans url
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
}

$sql = "SELECT `id`, `type`, `titre`, `playlist`, `image`, `annee`, `compositeur`, `compobio`
FROM 
    `filmuz` 
WHERE 
  id = :id
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//si $row n'existe pas, retour à backindex.php
if(!$row){
    header('Location: backindex.php');
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>FILMUZ // Gestion des films</title>
    <link rel="stylesheet" href="../css/screen.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link rel="icon" href="../img-layout/favicon.png">
</head>

<body>
<?php include "../include/backheader.php"?>

        <h3 class="adm-titre">Modifier le film</h3>
        <div class="change-form">
        <fieldset>

            <form action="dochange.php" method="post">
                <input type="hidden" name="id" value="<?=$row['id']?>">
            <div>
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" value="<?=$row['titre']?>" required>
            </div>
            <div>
                <label for="type">Type</label>
                <input type="text" name="type" id="type" value="<?=$row['type']?>" required>
            </div>
            <div>
                <label for="playlist">Playlist</label>
                <input type="url" name="playlist" id="playlist" value="<?=$row['playlist']?>" required>
            </div>
            <div>
                <label for="image">Image </label>
                <input type="text" name="image" id="image" value="<?=$row['image']?>" required>
            </div>
            <div>
                <label for="annee">Année</label>
                <input type="text" name="annee" id="annee" value="<?=$row['annee']?>" required>
            </div>
            <div>
                <label for="compositeur">Compositeur</label>
                <input type="text" name="compositeur" id="compositeur" value="<?=$row['compositeur']?>" required>
            </div>
            <div>
                <label for="compobio">Biographie</label><br/>
                <textarea rows="10" name="compobio" required><?=$row['compobio']?></textarea>
            </div>
            <input type="submit" value="Valider">
            </form>

        </fieldset>
        </div>