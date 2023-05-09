<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Connexion - OMNES BOX</title>
    <link href="../CSS/connexion.css" rel="stylesheet" type="text/css" media="all" />
    <script src="action.js"> </script>

    <!-- ASSURE LA CONNEXION A LA BASE DE DONNEES -->
    <?php include("verif_connexion_bdd.php") ?>
    <?php include("verif_session.php") ?>

</head>

<body>
    <?php

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $emailErr = '';
    $sql = "SELECT idCompte, nom, prenom, email, mdp FROM compte";
    $request = mysqli_query($bdd, $sql);
    $users = mysqli_fetch_all($request);
    $id_compte = 0;
    for ($i = 0; $i < sizeof($users); $i++) {
        $utilisateurs[$users[$i][2]] = $users[$i][3];
        $info[$i] = array($users[$i][0], $users[$i][1], $users[$i][2], $users[$i][3],  $users[$i][4]);
    }


    if (isset($_POST["login"], $_POST["pwd"]) && !empty($_POST["login"]) && !empty($_POST["pwd"])) {
        //sécurité contre faille XSS
        $login = test_input($_POST["login"]);
        $pwd = test_input($_POST["pwd"]);

        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }

        $pwd_found = false;
        $pwdA_found = false;

        for ($i = 0; $i < sizeof($users); $i++) {
            $email_login_bdd = $info[$i][3];
            $pwd_bdd = $info[$i][4];
            if ($login ==  $email_login_bdd && $pwd == $pwd_bdd) {
                $pwd_found = true;
                $_SESSION['email'] =  $email_login_bdd;
                $_SESSION['pwd'] = $pwd;
                $_SESSION['id'] = $info[$i][0];
                $_SESSION['nom'] = $info[$i][1];
                $_SESSION['prenom'] = $info[$i][2];
                $_SESSION['connected'] = true;
            }
        }

        if ($pwd_found == true) {
            header('Location: accueil.php');
        } else if ($pwdA_found == true) {
            header('Location: admin.php');
        } else
            //Si le mdp est incorrect
            echo " <p> Login ou mot de passe incorrect </p>";
    }
    ?>

    <img src="logo_omnesBox.png" alt="Logo">
    <h4>
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style="height:50%;">
                    <div class="panel panel-default" style="height:500px;">

                        <br><br>
                        <h2 class="text">Login</h2><br>
                        <form action="connexion.php" method="post">
                            <div class="pieddepage">
                                <p class="piedgauche"> Email :</p><a href="CreationCompte.php" class="pieddroit">Créer un compte</a>
                            </div>
                            <br>
                            <br>
                            <p class="log"> <input type="Email" name="login" id="login"> </span></p>

                            <br> <br>
                            <div class="pieddepage">
                                <p class="text"> Mot de Passe : </p>
                            </div>
                            <br><br>
                            <p class="log"><input type="password" name="pwd" id="pwd"></p>
                            <br></br>
                            <p class="log"><input class="submit" type="submit" value="Connexion"></p>

                        </form>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <button onclick="window.location.href = 'index.php';" class="close-button" aria-label="Case de fermeture" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            </div>
        </div>
    </h4>
</body>

</html>