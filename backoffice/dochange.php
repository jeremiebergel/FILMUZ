<?php
//connexion base de donnees
require_once "../connect.php";

//modification des champs precises apres SET pour un ID precis
$sql = "UPDATE 
`filmuz` 
SET 
  `id`=:id,
  `type`=:type,
  `titre`=:titre,
  `playlist`=:playlist,
  `image`=:image,
  `annee`=:annee,
  `compositeur`=:compositeur,
  `compobio`=:compobio
WHERE 
id = :id";

$stmt = $pdo->prepare($sql);

//reference vers les valeurs entrees dans formulaire de change.php (parametre POST)
$stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$stmt->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
$stmt->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$stmt->bindValue(':playlist', $_POST['playlist'], PDO::PARAM_STR);
$stmt->bindValue(':image', $_POST['image'], PDO::PARAM_STR);
$stmt->bindValue(':annee', $_POST['annee'], PDO::PARAM_INT);
$stmt->bindValue(':compositeur', $_POST['compositeur'], PDO::PARAM_STR);
$stmt->bindValue(':compobio', $_POST['compobio'], PDO::PARAM_STR);

$stmt->execute();

//retour sur la page de détail du film pour vérifier modification
header('Location: ../song-info.php?type='.$_POST['type'].'&id='.$_POST['id']);
