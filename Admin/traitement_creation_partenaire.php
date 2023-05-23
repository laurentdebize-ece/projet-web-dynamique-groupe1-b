<?php
include("../Users/verif_connexion_bdd.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST["nom"], $_POST["mdp"], $_POST["email"], $_POST["description"]) && !empty($_POST["nom"]) && !empty($_POST["mdp"]) && !empty($_POST["description"]) && !empty($_POST["email"])) {
    $nom = test_input($_POST['nom']);
    $description = test_input($_POST['description']);
    $motDePasse = test_input($_POST['mdp']);
    $email = test_input($_POST['email']);

    $verify = "SELECT * FROM partenaire WHERE email = '$email'";
    $result = mysqli_query($bdd, $verify);

    if (mysqli_num_rows($result) > 0) {
        echo  "Cette email est déjà utilisé";
    } else {
        $add = "INSERT INTO partenaire VALUES (NULL, '$email', '$motDePasse', '$nom', '$description')";
        if (mysqli_query($bdd, $add)) {
            $request = mysqli_query($bdd, 'SELECT MAX(idPartenaire) AS max FROM partenaire');
            $idPartenaire;
            while ($partenaires = mysqli_fetch_assoc($request)) {
                $idPartenaire = $partenaires['max'];
            }
            $addActivation = "INSERT INTO activer VALUES('$idPartenaire')";
            if (mysqli_query($bdd, $addActivation)) {
                header('Location: creation_partenaire.php');
            } else echo "Erreur lors de la création de l'activation du compte : " . mysqli_error($bdd);
        } else {
            echo "Erreur lors de la création du compte : " . mysqli_error($bdd);
        }
    }
} else {
    echo  "Remplir les champs !";
}
