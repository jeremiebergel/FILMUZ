<?php
//connexion bdd
require_once "../connect.php";

//ajouter dans table filmuz les champs entre parentheses
$sql = "INSERT INTO `filmuz`(`type`, `titre`, `playlist`, `image`, `annee`, `compositeur`, `compobio`) 
VALUES (:type, :titre, :playlist, :image, :annee, :compositeur, :compobio);";

$stmt = $pdo->prepare($sql);

//recuperation donnees rentrees dans formulaire backindex.php
$stmt->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
$stmt->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$stmt->bindValue(':playlist', $_POST['playlist'], PDO::PARAM_STR);
$stmt->bindValue(':image', $_POST['image'], PDO::PARAM_STR);
$stmt->bindValue(':annee', $_POST['annee'], PDO::PARAM_INT);
$stmt->bindValue(':compositeur', $_POST['compositeur'], PDO::PARAM_STR);
$stmt->bindValue(':compobio', $_POST['compobio'], PDO::PARAM_STR);

$stmt->execute();

if($_POST['image'] !== '') {
    $_POST['image'] = 'img-content/default.png';
}

//retour backindex.php pour verifier ajout dans "Liste des films"
header('Location: backindex.php');
