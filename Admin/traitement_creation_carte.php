<?php
include("../Users/verif_connexion_bdd.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$carteExist = false;
$activiteExist = false;


if (isset($_POST["theme"], $_FILES["image"], $_POST["description"]) && !empty($_POST["theme"]) && !empty($_POST["description"]) && !empty($_FILES["image"])) {
    //sécurité contre faille XSS
    $Theme = test_input($_POST["theme"]);
    $theme = ucfirst($Theme);
    $description = test_input($_POST["description"]);
    $image = $_FILES['image'];

    $carteExist = false;
    $activiteExist = false;

    $verify = "SELECT a.nom AS n FROM activite AS a JOIN cartes AS c ON c.idActivite = a.idActivite";
    $request = mysqli_query($bdd, $verify);
    while ($cartes_bdd = mysqli_fetch_assoc($request)) {
        if (!strcasecmp($theme, $cartes_bdd['n'])) {
            $carteExist = true;
            break;
        }
    }

    if ($carteExist) {
        echo 'Cette carte existe déjà dans la base de données !';
    } else {
        $add = "INSERT INTO activite
                    VALUES (NULL, '$theme', '$description')";
        mysqli_query($bdd, $add);

        $request = mysqli_query($bdd, 'SELECT MAX(idActivite) AS max FROM activite');
        $idActivite;
        while ($activites = mysqli_fetch_assoc($request)) {
            $idActivite = $activites['max'];
        }
        $ajouter_cartes = "INSERT INTO cartes
                            VALUES (NULL, '$image', '$idActivite')";
        if (mysqli_query($bdd, $ajouter_cartes)) {
            echo 'Carte ajoutée avec succès !';
            header('Location: ajouter_cartes.php');
        }
    }
} else {
    echo 'fdp';
}
