<!DOCTYPE html>
<html lang="fr">
    
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CSS/ajoutBeneficiaire.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat - OMNES BOX</title>

    <?php
    
    include("verif_session.php");
    include("verif_connexion_bdd.php");

    // Récupération des clés du panier
    $panier = $_SESSION['panier'];
    $ids = array_keys($panier);

    // Vérification de la soumission du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Traitement des données du formulaire
        $cardNumber = $_POST['card_number'];
        $expirationDate = $_POST['expiration_date'];
        $cvv = $_POST['cvv'];

        // Récupération de l'idCompte de l'acheteur connecté
        $idCompte = $_SESSION['id'];

        // Insertion des données d'achat pour chaque carte dans la table "achat"
        foreach ($ids as $id) {

            $quantite = $panier[$id];

            // Génération d'un identifiant unique pour chaque formulaire
            for ($i = 0; $i < $quantite; $i++) {
                $formId = $id . '_' . $i;

                // Récupération des informations du produit
                $product = mysqli_query($bdd, "SELECT * FROM cartes WHERE idActivite = '$formId'");

                if($product){
                    $product = mysqli_fetch_assoc($product);

                    // Génération d'une clé d'achat aléatoire unique
                    $cleAchat = genererCleAchatUnique($bdd);

                    // Insertion des données d'achat dans la table "achat"
                    $query = "INSERT INTO achat VALUES (NULL, NOW(), '$cleAchat', $idCompte, $idCompte, '$id')";

                    if (mysqli_query($bdd, $query)) {
                        // Succès de l'insertion, effectuer d'autres opérations si nécessaire
                        echo "Succès d'achat";
                    } else {
                        echo "Erreur lors de l'achat de la carte 1 : " . mysqli_error($bdd);
                    }
                }else {
                    echo "Erreur lors de l'achat de la carte 2 : " . mysqli_error($bdd);
                }
            }    
        }
    }



    // Fonction pour générer une clé d'achat aléatoire unique
    function genererCleAchatUnique($bdd) {
        $cleAchat = genererCleAchat();

        // Vérifier si la clé d'achat existe déjà dans la table "achat"
        $queryCleAchat = "SELECT cle_achat FROM achat WHERE cle_achat = '$cleAchat'";
        $resultCleAchat = mysqli_query($bdd, $queryCleAchat);

        if (mysqli_num_rows($resultCleAchat) > 0) {
            // La clé d'achat existe déjà, générer une nouvelle clé
            return genererCleAchatUnique($bdd);
        } else {
            // La clé d'achat est unique, retourner la clé générée
            return $cleAchat;
        }
    }

    // Fonction pour générer une clé d'achat aléatoire
    function genererCleAchat() {
        // Générer une clé d'achat aléatoire
        $length = 8;
        $cleAchat = '';
        
        for ($i = 0; $i < $length; $i++) {
            $chiffre = mt_rand(0, 9);
            $cleAchat .= $chiffre;
        }
        
        return $cleAchat;
    }
    ?>
    

    <script>
    $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.dropdown').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });

    // animation d'entrée
    $('.form-group').each(function (i) {
    $(this).delay(500 * i).animate({
    'opacity': '1',
    'margin-top': '0'
    }, 500);
    });
    });
    </script>
</head>

<body>
    <form method="POST" action="achat.php">
    <?php
    // Boucle sur les produits du panier
    $totalPrice = 0;
    foreach ($ids as $id) {
        // Récupération des informations du produit
        $product = mysqli_query($bdd, "SELECT * FROM cartes WHERE idActivite = $id");
        $product = mysqli_fetch_assoc($product);

        $req = mysqli_query($bdd, "SELECT nom FROM activite JOIN cartes ON activite.idActivite = cartes.idActivite WHERE cartes.idActivite = {$product['idActivite']}");

        if(mysqli_num_rows($req) > 0) {
            $row = mysqli_fetch_assoc($req);

            // Récupération de l'image en base64
            $image_data = base64_encode($product['image']);

            // Détermination du type d'image en fonction des premiers octets de la colonne image
            $mime_type = finfo_buffer(finfo_open(), $product['image'], FILEINFO_MIME_TYPE);
            $image_src = "data:".$mime_type.";base64,".$image_data;

            // Récupération de la quantité du produit dans le panier
            $quantity = $panier[$id];

            // Calcul du prix total pour ce produit
            $productTotalPrice = $product['prix'] * $quantity;
            $totalPrice += $productTotalPrice;

            // Afficher les informations du produit
            ?>
            <div class="cart-container">
                <img src="<?php echo $image_src?>">
                <h2>Carte : <?= isset($row['nom']) ? $row['nom'] : '' ?></h2>
                <p>Prix unitaire : <?=$product['prix']?>€</p>
                <p>Quantité : <?=$quantity?></p>
                <p>Prix total : <?=$productTotalPrice?>€</p>
            </div>
            <?php
        } else {
        }
    }
    ?>

    <div class="form-group">
        <label for="card_number">Numéro de carte</label>
        <input type="text" name="card_number" id="card_number" required class="form-control" placeholder="Numéro de carte">
    </div>
    <div class="form-group">
        <label for="expiration_date">Date d'expiration</label>
        <input type="text" name="expiration_date" id="expiration_date" required class="form-control" placeholder="MM/AA">
    </div>
    <div class="form-group">
        <label for="cvv">CVV</label>
        <input type="text" name="cvv" id="cvv" required class="form-control" placeholder="CVV">
    </div>
    <div class="form-group">
        <label for="total_price">Prix total : <?=$totalPrice?>€</label>
    </div>
    <div class="form-group">
        <input type="submit" class="btn-checkout" value="Payer">
    </div>
    </form>


</body>

</html>
