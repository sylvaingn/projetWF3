<?php

var_dump($_GET);


$bdd = new PDO('mysql:host=localhost;dbname=projetAlimentaire;charset=utf8;port=8889', 'root', 'root');
$request = "DELETE FROM varietesProduits where id = :id";

$response = $bdd->prepare($request);
$response->execute([

    "id"           => $_GET["id"],

]);


header("Location: index.php");



?>