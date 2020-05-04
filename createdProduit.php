<?php

//var_dump($_POST);
//var_dump($_FILES);

function checkForm()
{
    if (
        empty($_POST["nom"])
        or empty($_POST["variete"])
        or empty($_POST["quantite"])
        or empty($_POST["pays_origine"])
        or empty($_POST["photo"])
    )
    return "Un des champs est vide";

}


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

function insertProduit($nomFichier)
{
    $bdd = new PDO('mysql:host=localhost;dbname=projetAlimentaire;charset=utf8;port=8889', 'root', 'root');
    $request = "INSERT INTO varietesProduits (nom, variete, quantite, pays_origine, photo)
                VALUES (:nom, :variete, :quantite, :pays_origine, :photo)";

    $response = $bdd->prepare($request);
    $response->execute([

        "nom"           => $_POST["nom"],
        "variete"       => $_POST["variete"],
        "quantite"      => $_POST["quantite"],
        "pays_origine"  => $_POST["pays_origine"],
        "photo"         => $nomFichier
    ]);
}


/*if (!empty($_POST) && !empty($_FILES["photo"])){
    checkFile($_FILES["photo"]);
    $nom = saveFile($_FILES["photo"]);
    insertProduit($nom);
    echo"Réussite";
}
*/





?>

<!doctype html>
<html lang="en">

<head>
    <title>Les petits paniers</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php include("fix/navbar.php") ?>


    <?php if (
        empty($_POST["nom"])
        or empty($_POST["variete"])
        or empty($_POST["quantite"])
        or empty($_POST["pays_origine"])
        or empty($_FILES["photo"])
    ) : ?>

        <h2>Un des champs est manquant.</h2>
        <a href="addProduit.php">Retour en arrière</a>

    <?php else : ?>

        <?php 
        checkFile($_FILES["photo"]);
        $nom = saveFile($_FILES["photo"]);
        insertProduit($nom);
        ?>

        <h2>Bravo, vous venez d'ajouter un élément !</h2>
        <br>
        <h4>Récapitulatif :</h4>
        <br>
        <ul>
            <li>Nom : <?= $_POST["nom"] ?></li>
            <li>Variété : <?= $_POST["variete"] ?></li>
            <li>Quantité (kg) : <?= $_POST["quantite"] ?></li>
            <li>Pays d'origine : <?= $_POST["pays_origine"] ?></li>
            <li>Pays d'origine : <?= $nom ?></li>
        </ul>

        <a href="index.php" class="btn btn-secondary">Retour à la page d'accueil !</a>

    <?php endif; ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>