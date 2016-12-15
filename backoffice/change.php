<?php
//connexion base de donnees
require_once "../connect.php";

//si id existe, alors $id = id precise dans url
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
}

//selectionner tous les champs dans filmuz a l'id specifiee
$sql = "SELECT `id`, `type`, `titre`, `playlist`, `image`, `annee`, `compositeur`, `compobio`
FROM 
    `filmuz` 
WHERE 
  id = :id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//si $row n'existe pas, retour à backindex.php
if(!$row){
    header('Location: backindex.php');
}

//selectionner tous les types differents dans filmuz (pour liste deroulante)
$sql2 = "SELECT DISTINCT `type` FROM `filmuz`;";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
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

        <h3 class="adm-titre">modifier le film</h3>
        <div class="change-form">
        <fieldset>

            <form action="dochange.php" method="post">
                <input type="hidden" name="id" value="<?=$row['id']?>">
            <div>
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" value="<?=$row['titre']?>" required>
            </div>
            <div>
                <label for="type">Genre</label>
                <select id="type" name="type" id="type">
                    <?php while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
                        <option value="<?=$row2['type']?>"><?=$row2['type']?></option>
                    <?php endwhile; ?>
                </select>

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