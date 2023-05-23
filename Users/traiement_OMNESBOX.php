<?php

include("verif_connexion_bdd.php");
include("verif_session.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $omnesbox = $_POST['omnesbox'];
    $idCompte = $_SESSION['id'];

    $query = "SELECT * FROM achat WHERE cle_achat = '$omnesbox'";
    $result1 = mysqli_query($bdd, $query);

    if (mysqli_num_rows($result1) > 0) {
        $req = "UPDATE achat SET idBeneficiaire = $idCompte WHERE cle_achat = '$omnesbox'";

        $result2 = mysqli_query($bdd, $req);

        if ($result2 && mysqli_affected_rows($bdd) > 0) {
            header("Location: mon_compte.php");
            exit();
        } else {
            echo "<script>alert('Erreur lors de la mise à jour de l'idBeneficiaire.');</script>";
            header("Location: omnes_box.php");
            exit(); 
        }
    } else {
        echo "<script>alert('Désolé, votre clé est invalide.');</script>";
        header("Location: omnes_box.php");
        exit(); 
    }
}

?>

