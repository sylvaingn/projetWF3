<?php



?>

<!doctype html>
<html lang="en">
<head>
    <title>Les petits paniers</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
<?php include("fix/navbar.php")?>


<form action="createdProduit.php" method="POST" enctype="multipart/form-data">

    <div class="form-group">
    <label for="formName">Nom du produit :</label>
    <input name="nom" type="text" class="form-control" id="formName" maxlength="45" required>
    </div>

    <div class="form-group">
    <label for="formVariete">Sélectionnez la variété :</label>
    <select name="variete" class="form-control" id="formVariete" required>
        <option>Fruit</option>
        <option>Légume</option>
        <option>Légumineuse</option>
    </select>
    </div>

    <div class="form-group">
    <label for="formQuantite">Quantité (kg) :</label>
    <input name="quantite" type="text" class="form-control" id="formQuantite" required>
    </div>

    <div class="form-group">
    <label for="formPays">Pays d'origine :</label>
    <input name="pays_origine" type="text" class="form-control" id="formPays" required>
    </div>

    <div class="form-group">
    <label for="formPhoto">Photo :</label>
    <input name="photo" type="file" class="form-control" id="formPhoto" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter ce produit !</button>
</form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>