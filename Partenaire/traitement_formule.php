<?php
include("../Users/verif_connexion_bdd.php") ;

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$carteExist = false;


if (isset($_POST["activte"], $_POST["prix"], $_POST["description"],  $_POST["duree"]) && !empty($_POST["activite"]) && !empty($_POST["prix"]) && !empty($_POST["description"]) && !empty($_POST["duree"])) {
    //sécurité contre faille XSS
    $activite = test_input($_POST["activite"]);
    $description = test_input($_POST["description"]);
    $prix = test_input($_POST["prix"]);
    $duree = test_input($_POST["duree"]);

    $formuleExist = false;
    $verify = "SELECT activite, prix FROM formule";
    $request = mysqli_query($bdd, $verify);
    while ($cartes_bdd = mysqli_fetch_assoc($request)) {
        if (!strcasecmp($Theme, $cartes_bdd['theme'])) {
            $carteExist = true;
        }
    }

    if ($carteExist) {
        echo 'Cette formule existe déjà dans la base de données !';
    } else {
        $add = "INSERT INTO cartes
                    VALUES (NULL, '$Theme')";
        if (mysqli_query($bdd, $add)) {
            echo 'Carte ajoutée avec succés !';
            header('Location: ajouter_cartes.php');
        }
    }
}
?>
