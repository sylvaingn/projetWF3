<?php
var_dump($_GET);
var_dump($_POST);
var_dump($_FILES);

function checkFile($file)
{
    $pathInfoData = pathinfo($file["name"]);
    $fileExtension = $pathInfoData["extension"];

    if ($fileExtension != "jpg" && $file["type"] != "image/jpeg") {
        return "Le format n'est pas respecté";
    }
    if ($file["size"] > 3145728) {
        return "Le fichier est trop volumineux";
    }

    return null;
}

function saveFile($file)
{
    $pathInfoData = pathinfo($file["name"]);
    $fileName = $pathInfoData["filename"];
    $fileExtension = $pathInfoData["extension"];

    $nouveauNom = $fileName . uniqid() . "." . $fileExtension;
    move_uploaded_file($file["tmp_name"], __DIR__ . "/uploads/" . $nouveauNom);

    return $nouveauNom;
}

function updateProduit($nomFichier)
{
    $bdd = new PDO('mysql:host=localhost;dbname=projetAlimentaire;charset=utf8;port=8889', 'root', 'root');
    $request = "UPDATE varietesProduits 
                SET nom = :nom , variete = :variete , quantite = :quantite , pays_origine = :pays_origine , photo = :photo
                WHERE id = :id";

    $response = $bdd->prepare($request);
    $response->execute([

        "id"            => $_GET["id"],
        "nom"           => $_POST["nom"],
        "variete"       => $_POST["variete"],
        "quantite"      => $_POST["quantite"],
        "pays_origine"  => $_POST["pays_origine"],
        "photo"         => $nomFichier
    ]);
}

if (empty($_FILES)) {

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
} else {

    if (!empty($_FILES["photo"]["name"])) {
        checkFile($_FILES["photo"]);
        $nom = saveFile($_FILES["photo"]);
        updateProduit($nom);
    }
}




header("Location: index.php");




