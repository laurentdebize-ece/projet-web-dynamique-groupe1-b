<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../CSS/modifier_MDP.css" rel="stylesheet" type="text/css" media="all" />
    <?php include("verif_connexion_bdd.php") ?>
    <?php include("verif_session.php") ?>

    <?php

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['id'])) {
        // Rediriger vers la page de connexion
        header("Location: connexion.php");
        exit;
    }

    ?>

    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les valeurs du formulaire
        $ancienMotDePasse = $_POST['ancienMDP'];
        $nouveauMotDePasse = $_POST['nouveauMDP'];
        $confirmationMotDePasse = $_POST['confirmationMDP'];

        // Vérifier si les champs sont vides
        if (empty($ancienMotDePasse) || empty($nouveauMotDePasse) || empty($confirmationMotDePasse)) {
            echo "Veuillez remplir tous les champs.";
        } else {
            // Vérifier si les nouveaux mots de passe correspondent
            if ($nouveauMotDePasse !== $confirmationMotDePasse) {
                echo "Les nouveaux mots de passe ne correspondent pas.";
            } else {
                // Vérifier si l'ancien mot de passe correspond à celui enregistré dans la base de données
                $id = $_SESSION['id']; // ID du compte à modifier (vous devez récupérer cette valeur à partir de votre système)

                $result = mysqli_query($bdd, "SELECT mdp FROM compte WHERE idCompte = $id");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $motDePasseBD = $row['mdp'];

                    if ($ancienMotDePasse === $motDePasseBD) {
                        // Mettre à jour le mot de passe dans la base de données
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
            <div class="col-sm-4"></div>
            <div class="col-sm-4" style="height:50%;">
                <div class="panel panel-default" style="height:500px;">

                    <br><br>
                    <h2 class="text">Modifier Mot De Passe</h2><br>
                    <form action="" method="POST">
                        <div class="pieddepage">
                            <p class="piedgauche"> Ancien Mot de Passe :</p>
                        </div>
                        <p class="log"> <input type="password" name="ancienMDP" id="pwd" required> </span></p>
                        <div class="pieddepage">
                            <p class="text"> Nouveau Mot de Passe : </p>    
                        </div>
                        <p class="log"><input type="password"id="password" name="nouveauMDP" id="pwd" required></p>
                        <div class="pieddepage">
                            <p class="text"> Confirmation Mot de Passe : </p>    
                        </div>
                        <p class="log"><input type="password"id="password" name="confirmationMDP" id="pwd" required></p>
                        <br></br>
                        <p class="log"><input class="submit" type="submit" value="Valider"></p>

                    </form>
                </div>
            </div>
            <div class="col-sm-4 ">
                
                <button onclick="window.location.href = 'mon_compte.php';" class="close-button" aria-label="Case de fermeture" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        </div>
    </div>
    
</body>

</html>