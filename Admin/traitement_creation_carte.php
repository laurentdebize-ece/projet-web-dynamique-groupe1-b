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


if (isset($_POST["theme"], $_POST["image"], $_POST["description"], $_POST["prix"]) && !empty($_POST["theme"]) && !empty($_POST["prix"]) && !empty($_POST["description"]) && !empty($_POST["image"])) {
    //sécurité contre faille XSS
    $Theme = test_input($_POST["theme"]);
    $theme = ucfirst($Theme);
    $description = test_input($_POST["description"]);
    $prix = test_input($_POST["prix"]);
    $image = $_POST['image'] ;

    $carteExist = false;
    $activiteExist = false ;

    $verify = "SELECT a.nom AS n, c.prix AS c FROM activite AS a JOIN cartes AS c ON c.idActivite = a.idActivite";
    $request = mysqli_query($bdd, $verify);
    while ($cartes_bdd = mysqli_fetch_assoc($request)) {
        if (!strcasecmp($theme, $cartes_bdd['n'])) {
            if ($prix == $cartes_bdd['c']) {
                $carteExist = true;
                break ;
            }
            else{
                $activiteExist = true ;
                break ;
            }
        }
    }

    if ($carteExist) {
        echo 'Cette carte existe déjà dans la base de données !';
    }
    else if($activiteExist){
        $request = mysqli_query($bdd, "SELECT idActivite FROM activite WHERE nom = '$theme'");
        $idActivite;
        while ($activites = mysqli_fetch_assoc($request)) {
            $idActivite = $activites['idActivite'];
        }
        $ajouter_cartes = "INSERT INTO cartes
                            VALUES (NULL, '$image', '$idActivite', '$prix')";
                            echo'caca';
        if (mysqli_query($bdd, $ajouter_cartes)) {
            echo 'Activite ajoutée avec succés !';
            // AJOUTER L'AJOUT DE L'IMAGE A LA BASE 
            header('Location: ajouter_cartes.php');
        }
    }
    else {
        $add = "INSERT INTO activite
                    VALUES (NULL, '$theme', '$description')";
        mysqli_query($bdd, $add);

        $request = mysqli_query($bdd, 'SELECT MAX(idActivite) AS max FROM activite');
        $idActivite;
        while ($activites = mysqli_fetch_assoc($request)) {
            $idActivite = $activites['max'];
        }
        $ajouter_cartes = "INSERT INTO cartes
                            VALUES (NULL, '$image', '$idActivite', '$prix')";
        if (mysqli_query($bdd, $ajouter_cartes)) {
            echo 'Activite ajoutée avec succés !';
            // AJOUTER L'AJOUT DE L'IMAGE A LA BASE 
            header('Location: ajouter_cartes.php');
        }
    }
} else {
    echo 'caca';
}