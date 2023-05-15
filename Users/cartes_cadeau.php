<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <link rel="stylesheet" href="carte_cadeau.css">

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

    <nav class="navbar navbar-expand-lg navbar-dark">
        <!-- Ajoutez ici le code du menu de navigation -->
    </nav>
    <section class="products_list">
    <div class="row">
        <?php 
        //afficher la liste des produits
        $req = mysqli_query($bdd, "SELECT * FROM cartes");
        while($row = mysqli_fetch_assoc($req)){ 
            // Récupération de l'image en base64
            $image_data = base64_encode($row['image']);

            // Détermination du type d'image en fonction des premiers octets de la colonne image
            $mime_type = finfo_buffer(finfo_open(), $row['image'], FILEINFO_MIME_TYPE);
            $image_src = "data:".$mime_type.";base64,".$image_data;
        ?>
        <div class="col-md-4 mb-4">
            <form action="" class="cartes">
                <div class="image_cartes">
                    <img src="<?php echo $image_src?>">
                </div>
                <div class="content">
                    <?php 
                    $req2 = mysqli_query($bdd, "SELECT nom FROM activite JOIN cartes ON activite.idActivite = cartes.idActivite WHERE cartes.idActivite = {$row['idActivite']}");
                    $row2 = mysqli_fetch_assoc($req2);
                    ?>
                    <h4 class="name"><?=$row2['nom']?></h4>
                    <h2 class="price"><?=$row['prix']?>€</h2>
                    <a href="ajouter_panier.php?id=<?=$row['idActivite']?>" class="id_product">Ajouter au panier</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</section>

    
    <?php include("footer.php"); ?>
</body>

</html>