<?php
require_once "connect.php";
$sql = "INSERT INTO `filmuz`(`type`, `titre`, `playlist`, `image`, `annee`, `compositeur`, `compobio`) 
VALUES 
(:type, :titre, :playlist, :image, :annee, :compositeur, :compobio);";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
$stmt->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$stmt->bindValue(':playlist', $_POST['playlist'], PDO::PARAM_STR);
$stmt->bindValue(':image', $_POST['image'], PDO::PARAM_STR);
$stmt->bindValue(':annee', $_POST['annee'], PDO::PARAM_INT);
$stmt->bindValue(':compositeur', $_POST['compositeur'], PDO::PARAM_STR);
$stmt->bindValue(':compobio', $_POST['compobio'], PDO::PARAM_STR);
$stmt->execute();
header('Location: backindex.php');
