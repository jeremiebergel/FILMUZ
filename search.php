<?php
require("filmuz.sql");
$search = $_GET('search');

$stmt = $dbh->prepare("SELECT * FROM  WHERE titre LIKE :search");
$stmt->bindValue(':search','%'.$search.'%');
$stmt->execute();
$filmName = $stmt->fetchAll();

$stmt = $dbh->prepare("SELECT * FROM  WHERE compositeur LIKE :search");
$stmt->bindValue(':search','%'.$search.'%');
$stmt->execute();
$filmComp = $stmt->fetchAll();

$stmt = $dbh->prepare("SELECT * FROM  WHERE annee LIKE :search");
$stmt->bindValue(':search','%'.$search.'%');
$stmt->execute();
$filmYear = $stmt->fetchAll();

$films = [];

if(count($filmName) > 0) {
    foreach($filmName as $name) {
        array_push($films, $name);
    }
}

if(count($filmComp) > 0) {
    foreach($filmComp as $comp) {
        array_push($films, $comp);
    }
}

if(count($filmYear) > 0) {
    foreach($filmYear as $year) {
        array_push($films, $year);
    }
}

