<?php


$bdd = new PDO('mysql:host=localhost;dbname=projetAlimentaire;charset=utf8;port=8889', 'root', 'root');
$request = "SELECT * FROM varietesProduits";
$response = $bdd->query($request);
$produits = $response->fetchAll(PDO::FETCH_ASSOC);

//var_dump($produits);


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

    <div class="container-fluid">
    <div class="row">

        <?php foreach ($produits as $produit) : ?>
            
                <div class="ml-2 mt-5 col-md-2">
                    <div class="card" style="width: 13rem;">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center"><?= $produit["nom"] ?></h5>
                            <p class="card-text">Découvrez cette variété !</p>
                            <a href="show.php?id=<?= $produit["id"] ?>" class="btn btn-primary">Afficher</a>
                            <a href="modifProduit.php?id=<?= $produit["id"] ?>" class="btn btn-primary">Modifier</a>
                            <a href="show.php?id=<?= $produit["id"] ?>" class="btn btn-primary">Supprimer</a>
                        </div>
                    </div>
                </div>
            
        <?php endforeach; ?>

    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>