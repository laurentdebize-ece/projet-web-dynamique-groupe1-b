<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../CSS/partenaire.css" rel="stylesheet" type="text/css" media="all" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Partenaire - OMNES BOX</title>

</head>

<body>
    <?php include('navbar_partenaire.php');
    include("../Users/verif_connexion_bdd.php");
    include("../Users/verif_session.php");

    ?>

    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $emailErr = '';
    $sql = "SELECT idPartenaire, email, mdp FROM partenaire";
    $request = mysqli_query($bdd, $sql);
    $users = mysqli_fetch_all($request);
    $id_compte = 0;
    for ($i = 0; $i < sizeof($users); $i++) {
        $info[$i] = array($users[$i][0], $users[$i][1], $users[$i][2]);
    }

    if (isset($_POST["entreprise"], $_POST["pwd"]) && !empty($_POST["entreprise"]) && !empty($_POST["pwd"])) {
        //sécurité contre faille XSS
        $login = test_input($_POST["entreprise"]);
        $pwd = test_input($_POST["pwd"]);

        $pwd_found = false;

        for ($i = 0; $i < sizeof($users); $i++) {
            $email_login_bdd = $info[$i][1];
            $pwd_bdd = $info[$i][2];
            if (!strcasecmp($login, $email_login_bdd) && $pwd == $pwd_bdd) {
                $activation = false;
                $idPartenaire = $info[$i][0];
                $sql = "SELECT * FROM activer WHERE idPartenaire = $idPartenaire";
                $verifierActivation = mysqli_query($bdd, $sql);
                if (mysqli_num_rows($verifierActivation) > 0) {
                    $_SESSION['idPartenaire'] = $info[$i][0];
                    $_SESSION['connectedPartenaire'] = true;
                    header('Location: activation_mdp.php');
                } else {
                    $pwd_found = true;
                    $_SESSION['idPartenaire'] = $info[$i][0];
                    $_SESSION['connectedPartenaire'] = true;
                }
            }
        }

        if ($pwd_found == true) {
            header('Location: tableau_de_bord.php');
        } else
            $emailErr = '*Login ou mot de passe incorrect';
    }
    ?>
    <div class="container">
        <h1 class="custom-title">Espace Partenaire</h1>
        <br>
        <?php echo "<p style='text-align:center; color: red'>" . $emailErr . "</p>" ?>
        <form class="login-form" method="post">
            <label>Email :</label>
            <input type="email" id="entreprise" name="entreprise" placeholder="Entrez le nom de votre entreprise">
            <label>Mot de passe :</label>
            <input type="password" id="pwd" name="pwd" placeholder="Entrez votre mot de passe">
            <input class="btn" type="submit" value="Connexion"></input>
        </form>
    </div>

    <footer style="text-align: center; padding: 20px;">
        <p>&copy; 2023 - OMNES BOX | Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>

</html>