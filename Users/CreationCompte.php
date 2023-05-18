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
    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les valeurs du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $motDePasse = $_POST['mdp'];
        $email = $_POST['email'];

        // Échapper les caractères spéciaux pour éviter les injections SQL
        $nom = mysqli_real_escape_string($bdd, $nom);
        $prenom = mysqli_real_escape_string($bdd, $prenom);
        $email = mysqli_real_escape_string($bdd, $email);

        // Hacher le mot de passe
        //$motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);

        $result = mysqli_query($bdd, "SELECT * FROM compte WHERE email = '$email'");

        if (mysqli_num_rows($result) > 0) {
            echo "Cette email est déjà utilisé";
        } else {
            $sqlInsert = "INSERT INTO compte (nom, prenom, email, mdp, typeCompte) VALUES ('$nom', '$prenom', '$email', '$motDePasse', 3)";

            if (mysqli_query($bdd, $sqlInsert)) {
                echo "Le compte a été créé avec succès.";
            } else {
                echo "Erreur lors de la création du compte : " . mysqli_error($bdd);
            }
        }
    }
    ?>
</head>

<body>
    <style>
        
        .popup{
            text-align: center;
            position: fixed;
            border-radius: 20px;
            background-color: #9c2b2e;
            border-style: inset ;
            border: #e84e4f ; 
        }
        body img{
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
                if(isset($GLOBALS['EmailError'])) {
                    echo "je suis ". $GLOBALS['EmailError'] ;
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
                            <label class="log" for="email" > Email :</label>
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