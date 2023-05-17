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


if (isset($_POST["theme"], $_POST["description"], $_POST["prix"]) && !empty($_POST["theme"]) && !empty($_POST["prix"]) && !empty($_POST["description"])) {
    //sécurité contre faille XSS
    $Theme = test_input($_POST["theme"]);
    $description = test_input($_POST["description"]);
    $prix = test_input($_POST["prix"]);



    $carteExist = false;
    $verify = "SELECT nom FROM activite";
    $request = mysqli_query($bdd, $verify);
    while ($cartes_bdd = mysqli_fetch_assoc($request)) {
        if (!strcasecmp($Theme, $cartes_bdd['nom'])) {
            $carteExist = true;
        }
    }

    if ($carteExist) {
        echo 'Cette carte existe déjà dans la base de données !';
    } else {
        $theme = ucfirst($Theme) ;
        $add = "INSERT INTO activite
                    VALUES (NULL, '$theme', '$description')";
        if (mysqli_query($bdd, $add)) {
            echo 'Activite ajoutée avec succés !';
            // AJOUTER L'AJOUT DE L'IMAGE A LA BASE 
            header('Location: ajouter_cartes.php');
        }
    }
}
?>
