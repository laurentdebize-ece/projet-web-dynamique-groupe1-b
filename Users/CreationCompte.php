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
    </style>
    <h1> OmnesBox </h1>
    <h4>
        <div class="container">
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
                            <label class="log" for="Nom"> Nom :</label>
                            <p class="log"> <input type="text" name="Nom" id="Nom"></p>
                            <br>
                            <label class="log" for="pwd"> Mot de Passe : </label>
                            <p class="log"><input type="password" name="pwd" id="pwd"></p>

                        </div>
                        <div class="pieddroit">
                            <label class="log" for="Prenom"> Prénom :</label>
                            <p class="log"> <input type="text" name="Prenom" id="Prenom"></p>
                            <br>
                            <label class="log" for="Email" > Email :</label>
                            <p class="log"> <input type="Email" name="Email" id="Email">  </p>
                            <span> <?php echo $emailError ?> </span>
                        </div>
                        <br>
                        <br>
                <input class="submit" type="submit" value="Création du compte">
                </div>
                </form>
                    
                </div>
            </div>
            <div class="col-sm-4 "></div>
            <button class="close-button" aria-label="Case de fermeture" type="button">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
        </div>
        </div>
    </h4>
</body>

</html>