<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title> OmnesBox </title>
    <link href="../CSS/creationCompte.css" rel="stylesheet" type="text/css" media="all" />
    <?php include("verif_connexion_bdd.php") ?>
    <?php include("verif_session.php") ?>

    <?php

    $email_error = '';
    
    
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST["nom"], $_POST["mdp"], $_POST["email"], $_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["mdp"]) && !empty($_POST["prenom"]) && !empty($_POST["email"])) {
        $nom = test_input($_POST['nom']);
        $prenom = test_input($_POST['prenom']);
        $motDePasse = test_input($_POST['mdp']);
        $email = test_input($_POST['email']);

        $verify = "SELECT * FROM compte WHERE email = '$email'" ;
        $result = mysqli_query($bdd, $verify);

        if (mysqli_num_rows($result) > 0) {
            $email_error =  "Cette email est déjà utilisé";
        } 
        else {
            $add = "INSERT INTO compte (nom, prenom, email, mdp, typeCompte) VALUES ('$nom', '$prenom', '$email', '$motDePasse', 3)";

            if (mysqli_query($bdd, $add)) {
                header('Location: Traitement_Creation.php') ;
            } else {
               $email_error = "Erreur lors de la création du compte : " . mysqli_error($bdd);
            }
        }
    }
    ?>
</head>

<body>
    <style>
        .popup {
            text-align: center;
            position: fixed;
            border-radius: 20px;
            background-color: #9c2b2e;
            border-style: inset;
            border: #e84e4f;
        }

        body img {
            display: block;
            margin: 0 auto;
            margin-top: 10px;
        }
    </style>
    <a href="accueil.php"><img src="../Images/logo_omnesBox.png" width="150" height="40" alt="Logo"></a>

    <h4>
        <div class="container">
            <br><br><br><br>
            <div class='popup'>
                <?php
                if (isset($GLOBALS['EmailError'])) {
                    echo "je suis " . $GLOBALS['EmailError'];
                }
                ?>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="height:50%;">
                    <div class="panel panel-default" style="height:450px">
                        <br><br>
                        <h2 class="text">Création du compte</h2>
                        <br>
                        <form action="CreationCompte.php" method="post">
                            <div class="pieddepage">
                                <div class="piedgauche">
                                    <label class="log" for="nom"> Nom :</label>
                                    <p class="log"> <input type="text" name="nom" id="nom" required></p>
                                    <br>
                                    <label class="log" for="pwd"> Mot de Passe : </label>
                                    <p class="log"><input type="password" name="mdp" id="mdp" required></p>

                                </div>
                                <div class="pieddroit">
                                    <label class="log" for="prenom"> Prénom :</label>
                                    <p class="log"> <input type="text" name="prenom" id="prenom" required></p>
                                    <br>
                                    <label class="log" for="email"> Email :</label>
                                    <p class="log"> <input type="email" name="email" id="email" required></p>
                                    <br>

                                </div>
                                <br>
                                <br>
                                <br>
                                <input class="submit" type="submit" value="Création du compte">
                            </div>
                        </form>
                    </div>
                    <?php  echo "<p style='text-align:center;color:red'>" . $email_error . "</p>" ?>

                </div>
                <div class="col-sm-4 "></div>
                <button onclick="window.location.href = 'accueil.php';" class="close-button" aria-label="Case de fermeture" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        </div>
        </div>
    </h4>
</body>

</html>