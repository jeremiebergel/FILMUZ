<?php
//connexion base de donnees
require_once "connect.php";

//si id existe, alors $id = id precise dans url, sinon retour backindex.php
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
} else {
    header('Location: backindex.php');
}

//suppression de l'id precise de la table filmuz
$sql = "DELETE FROM `filmuz` WHERE id = :id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
header('Location: backindex.php');
