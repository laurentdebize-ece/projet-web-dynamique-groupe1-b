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
    <?php 
    include("verif_connexion_bdd.php");
    include("verif_session.php");
    ?>
    <link href="../CSS/espace_perso.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
    <?php include("navbar.php") ?>
    <hr>
    <div class="cartes-container">
        <h1>Espace personnel</h1>

        <?php
            // Récupération de l'idCompte de l'acheteur connecté
            $idCompte = $_SESSION['id'];

            $query = "SELECT cartes.*, activite.nom AS nomCarte FROM cartes JOIN achat ON cartes.idCarte = achat.idCarte JOIN activite ON cartes.idActivite = activite.idActivite WHERE achat.idBeneficiaire = $idCompte";
            $result = mysqli_query($bdd, $query);


            // Vérification des résultats de la requête
            if ($result) {
                // Parcours des résultats
                while ($row = mysqli_fetch_assoc($result)) {
                    // Accès aux informations de la carte
                    $nomCarte = $row['nomCarte'];

                    // Récupération de l'image en base64
                    $image_data = base64_encode($row['image']);

                    // Détermination du type d'image en fonction des premiers octets de la colonne image
                    $mime_type = finfo_buffer(finfo_open(), $row['image'], FILEINFO_MIME_TYPE);
                    $image_src = "data:".$mime_type.";base64,".$image_data;

                    ?>
                <div class="carte">
                    <img src="<?php echo $image_src?>">
                    <h2>Carte : <?= isset($row['nomCarte']) ? $row['nomCarte'] : '' ?></h2>
                    <p>Prix : <?=$row['prix']?>€</p>
                </div>

        <?php            
                }
            } else {
                // Gestion de l'erreur
                echo "Erreur lors de la récupération des informations de la carte : " . mysqli_error($bdd);
            }
        ?>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>