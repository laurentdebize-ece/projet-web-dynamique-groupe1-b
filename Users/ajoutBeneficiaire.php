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
    <title>Bénéficiaire - OMNES BOX</title>

    <?php
    include("verif_session.php");
    include("verif_connexion_bdd.php");

    // Récupération des clés du panier
    $panier = $_SESSION['panier'];
    $ids = array_keys($panier);

    // Vérification de la soumission du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        foreach ($ids as $id) {
            // Récupération de la quantité de cartes
            $quantite = $panier[$id];

            // Génération d'un identifiant unique pour chaque formulaire
            for ($i = 0; $i < $quantite; $i++) {
                $formId = $id . '_' . $i;

                // Récupération des valeurs des champs
                $beneficiaire_nom = $_POST['beneficiaire_nom_' . $formId];
                $beneficiaire_prenom = $_POST['beneficiaire_prenom_' . $formId];
                $beneficiaire_email = $_POST['beneficiaire_email_' . $formId];

                // Enregistrez les données du bénéficiaire pour chaque carte ici
                // Utilisez les valeurs $id, $beneficiaire_nom, $beneficiaire_prenom, $beneficiaire_email

                // Génération d'une clé bénéficiaire aléatoire unique
                $cleBeneficiaire = genererCleBeneficiaireUnique($bdd);

                // Exemple d'insertion dans la base de données
                $query = "INSERT INTO beneficiaire VALUES (NULL, '$beneficiaire_nom', '$beneficiaire_prenom', '$beneficiaire_email', '$cleBeneficiaire')";

                
                if (mysqli_query($bdd, $query)) {
                    echo "Le compte a été créé avec succès.";
                } else {
                    echo "Erreur lors de la création du compte : " . mysqli_error($bdd);
                }
            }

        }

        // Redirection vers la page du panier après avoir traité les données
        header("Location: panier.php");
        exit();
    }

    // Fonction pour générer une clé bénéficiaire aléatoire unique
    function genererCleBeneficiaireUnique($bdd) {
        $cleBeneficiaire = genererCleBeneficiaire();

        // Vérifier si la clé bénéficiaire existe déjà dans la table "beneficiaire"
        $reqCle = "SELECT cle_beneficiaire FROM beneficiaire WHERE cle_beneficiaire = '$cleBeneficiaire'";
        $resultCle = mysqli_query($bdd, $reqCle);

        if (mysqli_num_rows($resultCle) > 0) {
            // La clé bénéficiaire existe déjà, générer une nouvelle clé
            return genererCleBeneficiaireUnique($bdd);
        } else {
            // La clé bénéficiaire est unique, retourner la clé générée
            return $cleBeneficiaire;
        }
    }

    // Fonction pour générer une clé bénéficiaire aléatoire
    function genererCleBeneficiaire() {
        // Générer une clé bénéficiaire aléatoire
        $length = 8;
        $cleBeneficiaire = '';
        
        for ($i = 0; $i < $length; $i++) {
            $chiffre = mt_rand(0, 9);
            $cleBeneficiaire .= $chiffre;
        }

        return $cleBeneficiaire;
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
    <!-- Le reste du code HTML -->

    <form method="POST" action="ajoutBeneficiaire.php">
        <?php
        // Boucle sur les produits du panier
        foreach ($ids as $id) {

            // Récupération de la quantité de cartes
            $quantite = $panier[$id];

            // Génération d'un identifiant unique pour chaque formulaire
            for ($i = 0; $i < $quantite; $i++) {
                $formId = $id . '_' . $i;

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


            // Afficher les informations du produit et les champs pour le bénéficiaire
            ?>
            <div class="cart-container">
                <img src="<?php echo $image_src?>">
                <h2>Carte : <?= isset($row['nom']) ? $row['nom'] : '' ?></h2>
                <p>Prix : <?=$product['prix']?>€</p>
                <div class="form-group">
                    <label for="beneficiaire_email_<?=$formId?>">Adresse e-mail</label>
                    <input type="email" name="beneficiaire_email_<?=$formId?>" id="beneficiaire_email_<?=$formId?>" required class="form-control" placeholder="prenom@example.com">
                </div>
                <div class="form-group">
                    <label for="beneficiaire_nom_<?=$formId?>">Nom</label>
                    <input type="text" name="beneficiaire_nom_<?=$formId?>" id="beneficiaire_nom_<?=$formId?>" required class="form-control" placeholder="nom">
                </div>
                <div class="form-group">
                    <label for="beneficiaire_prenom_<?=$formId?>">Prénom</label>
                    <input type="text" name="beneficiaire_prenom_<?=$formId?>" id="beneficiaire_prenom_<?=$formId?>" required class="form-control" placeholder="prenom">
                </div>
            </div>

            <?php
                } else {
                }
            }
        }
        ?>
        <div class="form-group">
        <input type="submit" class="btn-checkout" value="Valider">
        </div>

    </form>

    <!-- Le reste du code HTML -->
</body>

</html>