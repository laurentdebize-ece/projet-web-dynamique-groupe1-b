<?php

include("verif_connexion_bdd.php");
include("verif_session.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $omnesbox = $_POST['omnesbox'];
    $idCompte = $_SESSION['id'];

    $query = "SELECT * FROM achat WHERE cle_achat = '$omnesbox'";
    $result1 = mysqli_query($bdd, $query);

    // Vérifier si la clé existe dans la base de données
    if (mysqli_num_rows($result1) > 0) {
        // Si la clé existe, rediriger l'utilisateur vers la page mon_compte.php
        $req = "UPDATE achat SET idBeneficiaire = $idCompte WHERE cle_achat = '$omnesbox'";

        $result2 = mysqli_query($bdd, $req);

        if ($result2 && mysqli_affected_rows($bdd) > 0) {
            header("Location: mon_compte.php");
            exit();
        } else {
            // Si la mise à jour a échoué, afficher un message d'erreur
            echo "<script>alert('Erreur lors de la mise à jour de l'idBeneficiaire.');</script>";
            header("Location: omnes_box.php");
            exit(); 
        }
    } else {
        // Si la clé n'existe pas, afficher un message d'erreur en popup
        echo "<script>alert('Désolé, votre clé est invalide.');</script>";
        header("Location: omnes_box.php");
        exit(); 
    }
}

?>

