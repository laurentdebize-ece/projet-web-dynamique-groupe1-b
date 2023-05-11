<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace personnel - OMNES BOX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include("verif_connexion_bdd.php") ?>
    <?php include("verif_session.php") ?>
    <link href="../CSS/espace_perso.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
    <?php include("navbar.php") ?>
    <hr>

    <div class="cartes-container">
        <h1>Espace personnel</h1>
        <div class="carte">
            <h2>Carte cadeau Restaurant - 25€</h2>
            <p>Validité : 25/12/2023</p>
            <p>Code : ABCDE12345</p>
        </div>
        <div class="carte">
            <h2>Carte cadeau Spa - 50€</h2>
            <p>Validité : 01/03/2024</p>
            <p>Code : FGHIJ67890</p>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>