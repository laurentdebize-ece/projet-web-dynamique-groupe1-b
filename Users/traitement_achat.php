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
        $idBeneficiaire = $_SESSION['id'];

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
                    $query = "INSERT INTO achat VALUES (NULL, NOW(), '$cleAchat', $idBeneficiaire, $idCompte, '$id')";

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