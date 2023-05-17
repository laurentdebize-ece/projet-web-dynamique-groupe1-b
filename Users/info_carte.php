<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <link rel="stylesheet" href="info_carte.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include("verif_connexion_bdd.php") ?>
    <?php include("verif_session.php") ?>

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartes cadeau - OMNES BOX</title>
    
</head>

<body>

    <?php include("navbar.php") ?>
    <?php

    if (isset($_GET['id'])) {
        $idActivite = $_GET['id'];
        $req = mysqli_query($bdd, "SELECT * FROM cartes WHERE idActivite = $idActivite");
        $row = mysqli_fetch_assoc($req);
        $req2 = mysqli_query($bdd, "SELECT * FROM activite JOIN cartes ON activite.idActivite = cartes.idActivite WHERE cartes.idActivite = {$row['idActivite']}");
        $row2 = mysqli_fetch_assoc($req2);
        if ($row) {
            // Récupération de l'image en base64
            $image_data = base64_encode($row['image']);

            // Détermination du type d'image en fonction des premiers octets de la colonne image
            $mime_type = finfo_buffer(finfo_open(), $row['image'], FILEINFO_MIME_TYPE);
            $image_src = "data:".$mime_type.";base64,".$image_data;
    
    ?>
            <!-- Affichage des informations de la carte-->
            <div class="content">
                <img src="<?php echo $image_src?>">
                <h4 class="name"><?=$row2['nom']?></h4>
                <h2 class="price"><?=$row['prix']?>€</h2>
                <p class="description"><?=$row2['description_activite']?></p>
            </div>
    <?php
        } else {
            echo "Carte non trouvée.";
        }
    } else {
        echo "ID de la carte non spécifié.";
    }
    ?>

    
    <?php include("footer.php"); ?>
</body>

</html>

