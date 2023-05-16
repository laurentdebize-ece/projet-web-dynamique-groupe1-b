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


if (isset($_POST["theme"]) && !empty($_POST["theme"])) {
    //sécurité contre faille XSS
    $Theme = test_input($_POST["theme"]);
    $carteExist = false;
    $verify = "SELECT theme FROM cartes";
    $request = mysqli_query($bdd, $verify);
    while ($cartes_bdd = mysqli_fetch_assoc($request)) {
        if (!strcasecmp($Theme, $cartes_bdd['theme'])) {
            $carteExist = true;
        }
    }

    if ($carteExist) {
        echo 'Cette carte existe déjà dans la base de données !';
    } else {
        $theme = ucfirst($Theme) ;
        $add = "INSERT INTO cartes
                    VALUES (NULL, '$theme')";
        if (mysqli_query($bdd, $add)) {
            echo 'Carte ajoutée avec succés !';
            header('Location: ajouter_cartes.php');
        }
    }
}
?>
