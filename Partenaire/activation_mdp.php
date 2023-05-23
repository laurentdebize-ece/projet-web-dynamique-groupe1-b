<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../CSS/modifier_MDP.css" rel="stylesheet" type="text/css" media="all" />
    <?php include("../Users/verif_connexion_bdd.php") ?>
    <?php include("../Users/verif_session.php") ?>

    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email_error = '';
    if (isset($_POST["nouveauMDP"], $_POST["confirmationMDP"]) && !empty($_POST["nouveauMDP"]) && !empty($_POST["confirmationMDP"])) {
        $nouveauMotDePasse = test_input($_POST['nouveauMDP']);
        $confirmationMotDePasse = test_input($_POST['confirmationMDP']);

        if ($nouveauMotDePasse !== $confirmationMotDePasse) {
            $email_error = "Les nouveaux mots de passe ne correspondent pas.";
        } else {
            $id = $_SESSION['idPartenaire'];
            $result = mysqli_query($bdd, "SELECT mdp FROM partenaire WHERE idPartenaire = '$id'");
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $sqlUpdate = "UPDATE partenaire SET mdp = '$nouveauMotDePasse' WHERE idPartenaire = '$id'";
                if (mysqli_query($bdd, $sqlUpdate)) {
                    $sqlActivation = "DELETE FROM activer WHERE idPartenaire = '$id'";
                    if (mysqli_query($bdd, $sqlActivation)) {
                        header("Location: tableau_de_bord.php");
                    } else {
                        $email_error =  "Erreur lors de la suppression de l'activation : " . mysqli_error($bdd);
                    }
                } else {
                    $email_error =  "Erreur lors de la mise à jour du mot de passe : " . mysqli_error($bdd);
                }
            }
        }
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte - OMNES BOX</title>
    <style>
        .container {
            max-width: 960px;
            margin: 50px auto;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            border-radius: 5px;
        }

        .btn {
            background-color: rgb(38, 93, 155);
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #f0cb64;
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include('navbar_partenaire.php') ?>
    <br><hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="height:50%;">
                <div class="panel panel-default" style="height:450px">
                    <br><br>
                    <h2 class="text">Activer votre compte</h2>
                    <?php echo "<p style='text-align:center;color:red'>" . $email_error . "</p>" ?>
                    <form action="" method="post">
                        <div class="pieddepage">
                            <p class="text"> Nouveau mot de passe :</p>
                        </div>
                        <input class="log" name="nouveauMDP" id="nouveauMDP"> </span>
                        <br>                        <br>

                        <div class="pieddepage">
                            <p class="text"> Confirmer votre mot de passe : </p>
                        </div>
                        <input class="log" name="confirmationMDP" id="confirmationMDP">
                        <br>
                        <input class="btn" type="submit" value="Connexion"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>