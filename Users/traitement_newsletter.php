<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$GLOBALS['EmailError'] = '';
$GLOBALS['creation'] = '';

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    //sécurité contre faille XSS
    $Email = test_input($_POST["email"]);

    $emailExist = false;

    $verify = "SELECT email FROM newsletter";
    $request = mysqli_query($bdd, $verify);
    while ($email_bdd = mysqli_fetch_assoc($request)) {
        if (!strcasecmp($Email, $email_bdd['email'])) {
            $emailExist = true;
        }
    }

    if ($emailExist) {
        $newsletter = 'Cet email existe déjà !';
    } else {
        $add = "INSERT INTO newsletter
                    VALUES (NULL, '$Email')";
        if (mysqli_query($bdd, $add)) {
            $newsletter = 'Vous êtes ajouté à la newsletter !';
        }
    }
} 
?>