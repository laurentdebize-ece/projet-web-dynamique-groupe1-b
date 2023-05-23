<?php
include("../Users/verif_connexion_bdd.php");

$idPartenaire = $_GET['id'] ;
$supprimer_partenaire = "DELETE FROM partenaire WHERE idPartenaire = '$idPartenaire'";
if (mysqli_query($bdd, $supprimer_partenaire)) {
    header('Location: accueil_admin.php') ;
}
else{
    echo 'La suppression de la carte a échoué'  . mysqli_error($bdd); ;
}

?>