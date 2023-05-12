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
                <div class="panel panel-default" style="height:650px; width: 650px; margin-left: 260px;">
                    <div class="col-sm-3" style="height:50%;">
                        <br><br>
                        <h2 class="text">Création de compte</h2><br>
                        <form action="Traitement_Creation.php" method="post">
                            <p class="piedgauche"> Nom :</p>
                            <br>
                            <br>
                            <p class="log"> <input type="text" name="Nom" id="Nom"></p>

                            <p class="piedgauche"> Mot de Passe : </p>
                            <br>
                            <br>
                            <p class="log"><input type="password" name="pwd" id="pwd"></p>
                    </div>

                    <div class="col-sm-3" style="height:50%; margin-left: 120px; margin-top:150px">
                        <br>
                        <br>
                        <p class="piedgauche"> Prénom :</p>
                        <br>
                        <br>
                        <p class="log"> <input type="text" name="Prenom" id="Prenom"></p>

                        <p class="piedgauche"> Email :</p>
                        <br>
                        <br>
                        <p class="log"> <input type="Email" name="Email" id="Email"> </p>
                    </div>
                </div>


                <br>
                <br>
                <p class="log"><input class="submit" type="submit" value="Création du compte"></p>

                </form>
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