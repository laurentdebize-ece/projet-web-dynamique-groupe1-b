<!DOCTYPE html>


<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../CSS/modifier_MDP.css" rel="stylesheet" type="text/css" media="all" />

    <?php include("verif_connexion_bdd.php") ?>
    <?php include("verif_session.php") ?>

    <?php

    if (!isset($_SESSION['id'])) {
        header("Location: connexion.php");
        exit;
    }

    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ancienMotDePasse = $_POST['ancienMDP'];
        $nouveauMotDePasse = $_POST['nouveauMDP'];
        $confirmationMotDePasse = $_POST['confirmationMDP'];

        if (empty($ancienMotDePasse) || empty($nouveauMotDePasse) || empty($confirmationMotDePasse)) {
            echo "Veuillez remplir tous les champs.";
        } else {
            if ($nouveauMotDePasse !== $confirmationMotDePasse) {
                echo "Les nouveaux mots de passe ne correspondent pas.";
            } else {
                $id = $_SESSION['id']; 
                $result = mysqli_query($bdd, "SELECT mdp FROM compte WHERE idCompte = $id");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $motDePasseBD = $row['mdp'];

                    if ($ancienMotDePasse === $motDePasseBD) {
                        $sqlUpdate = "UPDATE compte SET mdp = '$nouveauMotDePasse' WHERE idCompte = $id";

                        if (mysqli_query($bdd, $sqlUpdate)) {
                            header("Location: mon_compte.php");
                        } else {
                            echo "Erreur lors de la mise à jour du mot de passe : " . mysqli_error($bdd);
                        }
                    } else {
                        echo "L'ancien mot de passe est incorrect.";
                    }
                } else {
                    echo "Compte introuvable.";
                }
            }
        }
    }
    ?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte - OMNES BOX</title>
</head>

<body>
<a href="accueil.php">
        <img src="../Images/logo_omnesBox.png" width="150" height="40" alt="Logo">
    </a>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="height:50%;">
                <div class="panel panel-default" style="height:550px;">
                    <br><br>
                    <h2 class="text">Modification Mot de Passe</h2><br>
                    <form action="" method="post">
                    <div class="pieddepage">
                            <h4><p class="piedgauche"> Ancien Mot de Passe :</p></h4>
                        </div>
                        <br>
                        <br>
                        <p class="log"> <input class="formu" type="password" name="ancienMDP" id="pwd" required></p>
                        <br>
                        
                        <div class="pieddepage">
                            <h4><p class="piedgauche"> Nouveau Mot de Passe :</p></h4>
                        </div>
                        <br>
                        <br>
                        <p class="log"> <input class="formu" type="password"id="password" name="nouveauMDP" id="pwd" required></p>


                        <br> <br>
                        <div class="pieddepage">
                            <h4><p class="text"> Confirmation Mot de Passe : </p></h4>
                        </div>
                        <br><br>
                        <p class="log"><input class="formu" type="password"id="password" name="confirmationMDP" id="pwd" required></p>
                        <br></br>
                        <p class="log"><input class="submit" type="submit" value="Connexion"></p>

                    </form>
                </div>
            </div>
            <div class="col-sm-3 "></div>
                
                <button onclick="window.location.href = 'accueil.php';" class="close-button" aria-label="Case de fermeture" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>

            
        </div>
    </div>
    
</body>

</html>