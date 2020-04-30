<?php
var_dump($_GET);
var_dump($_POST);


$bdd = new PDO('mysql:host=localhost;dbname=projetAlimentaire;charset=utf8;port=8889', 'root', 'root');
$request = "UPDATE varietesProduits 
            SET nom = :nom , variete = :variete , quantite = :quantite , pays_origine = :pays_origine 
            WHERE id = :id";

$response = $bdd->prepare($request);
$response->execute([

    "id"            => $_GET["id"],
    "nom"           => $_POST["nom"],
    "variete"       => $_POST["variete"],
    "quantite"      => $_POST["quantite"],
    "pays_origine"  => $_POST["pays_origine"]

]);

header("Location: index.php ");


?>
