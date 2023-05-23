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


if (isset($_POST["theme"], $_POST["prix"], $_POST["image"], $_POST["description"]) && !empty($_POST["theme"]) && !empty($_POST["prix"]) && !empty($_POST["description"]) && !empty($_POST["image"])) {
    //sécurité contre faille XSS
    $Theme = test_input($_POST["theme"]);
    $theme = ucfirst($Theme);
    $description = htmlspecialchars($_POST["description"]);
    $prix = test_input($_POST['prix']);
    $image =  $_POST['image'];

    $carteExist = false;
    $activiteExist = false;

    $verify = "SELECT idActivite, nom AS n FROM activite";
    $request = mysqli_query($bdd, $verify);
    while ($cartes_bdd = mysqli_fetch_assoc($request)) {
        if (!strcasecmp($theme, $cartes_bdd['n'])) {
            $verify = "SELECT prix FROM cartes ";
            $request = mysqli_query($bdd, $verify);
            $idActiviteee =  $cartes_bdd['idActivite'];
            $verifierPrix = "SELECT prix AS c FROM cartes WHERE idActivite = '$idActiviteee' ";
            $requestPrix = mysqli_query($bdd, $verifierPrix);
            $prixbdd;
            while ($cartas = mysqli_fetch_assoc($requestPrix)) {
                $prixbdd = $cartas['c'];
            }
            if ($prix == $prixbdd) {
                $carteExist = true;
                break;
            } else {
                $activiteExist = true;
            }
        }
    }
    if ($carteExist) {
        echo 'Cette carte existe déjà dans la base de données !';
    } else if ($activiteExist) {
        $request = mysqli_query($bdd, "SELECT idActivite FROM activite WHERE nom = '$theme'");
        $idActivite;
        while ($activites = mysqli_fetch_assoc($request)) {
            $idActivite = $activites['idActivite'];
        }
        $ajouter_cartes = "INSERT INTO cartes
                            VALUES (NULL, '$image', '$idActivite', '$prix')";
        if (mysqli_query($bdd, $ajouter_cartes)) {
            header('Location: creation_cartes.php');
        }
    } else {
        $add = "INSERT INTO activite
                VALUES (NULL, '$theme', '$description')";
        if (mysqli_query($bdd, $add)) {
            $request = mysqli_query($bdd, 'SELECT MAX(idActivite) AS max FROM activite');
            $idActivite;
            while ($activites = mysqli_fetch_assoc($request)) {
                $idActivite = $activites['max'];
            }
            $ajouter_cartes = "INSERT INTO cartes
                                VALUES (NULL, '$image', '$idActivite', '$prix')";
            if (mysqli_query($bdd, $ajouter_cartes)) {
                header('Location: creation_cartes.php');
            }
        } else {
            echo 'Erreur de création de cette activité. La description est peut-être trop longue.';
        }
    }
}
