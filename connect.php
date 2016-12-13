<?php
try{
    $pdo = new PDO('mysql:dbname=cinebo;host=localhost','root','root');
} catch(PDOException $exception) {
    die($exception->getMessage());
}
$pdo->exec("SET NAMES UTF8");
