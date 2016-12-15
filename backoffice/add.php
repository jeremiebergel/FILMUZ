<?php
//connexion bdd
require_once "../connect.php";

//ajouter dans table filmuz les champs entre parentheses
$sql = "INSERT INTO `filmuz`(`type`, `titre`, `playlist`, `image`, `annee`, `compositeur`, `compobio`) 
VALUES (:type, :titre, :playlist, :image, :annee, :compositeur, :compobio);";

$stmt = $pdo->prepare($sql);

//vérification existance de l'image, sinon image doge
if(!file_exists(dirname(__DIR__).$_POST['image'])) {
    $image = 'img-content/default.jpg';
} else {
    $image = $_POST['image'];
}

//recuperation donnees rentrees dans formulaire backindex.php
$stmt->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
$stmt->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$stmt->bindValue(':playlist', $_POST['playlist'], PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR);
$stmt->bindValue(':annee', $_POST['annee'], PDO::PARAM_INT);
$stmt->bindValue(':compositeur', $_POST['compositeur'], PDO::PARAM_STR);
$stmt->bindValue(':compobio', $_POST['compobio'], PDO::PARAM_STR);

$stmt->execute();

//retour backindex.php pour verifier ajout dans "Liste des films"
header('Location: backindex.php');
