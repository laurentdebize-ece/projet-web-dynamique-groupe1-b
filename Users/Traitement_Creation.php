<?php

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $GLOBALS['EmailError'] = '' ;
    $GLOBALS['creation'] = '';

    if (isset($_POST["Nom"], $_POST["pwd"], $_POST["Email"], $_POST["Prenom"]) && !empty($_POST["Nom"]) && !empty($_POST["pwd"]) && !empty($_POST["Prenom"]) && !empty($_POST["Email"])) {
        //sécurité contre faille XSS
        $Nom = test_input($_POST["Nom"]);
        $Prenom = test_input($_POST["Prenom"]);
        $Email = test_input($_POST["Email"]);
        $pwd = test_input($_POST["pwd"]);
        $type = 3;

        $emailExist = false ;
        
        $verify = "SELECT email FROM compte";
        $request = mysqli_query($bdd, $verify);
        while($email_bdd = mysqli_fetch_assoc($request)){
            if(!strcasecmp($Email, $email_bdd['email'])) {
                $emailExist = true ;
            }
        }
    
        if ($emailExist) {
            $GLOBALS['EmailError'] = 'Cet email existe déjà !' ;
            header('Location: CreationCompte.php');
        } 
        else {
            $add = "INSERT INTO compte
                    VALUES (NULL, '$Nom', '$Prenom' , '$Email', '$pwd', $type)";
            if (mysqli_query($bdd, $add)) {
                header('Location: connexion.php');
                $GLOBALS['creation'] = 'Compte crée avec succés !' ;
                $_SESSION['page'] = 'PHP_SELF' ;
            } 
        }
    }
    else {
        $GLOBALS['EmailError'] = 'Veuillez remplir les champs !' ;
        header('Location: CreationCompte.php');
    }
?>