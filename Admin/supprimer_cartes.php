<?php
include("../Users/verif_connexion_bdd.php");

$idCarte = $_GET['id'] ;
$supprimer_cartes = "DELETE FROM cartes WHERE idCarte = '$idCarte'";
if (mysqli_query($bdd, $supprimer_cartes)) {
    header('Location: accueil_admin.php') ;
}
else{
    echo 'La suppression de la carte a échoué'  . mysqli_error($bdd); ;
}

?>