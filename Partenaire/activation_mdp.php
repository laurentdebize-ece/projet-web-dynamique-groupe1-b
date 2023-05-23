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
</head>

<body>
    <?php include('navbar_partenaire.php') ?>
    <br><hr>
    <div class="container">
        <h2>Activer votre compte</h2>
        <?php echo "<p style='text-align:center;color:red'>" . $email_error . "</p>" ?>
        <form method="post">
            <p>Nouveau Mot de Passe :</p>
            <input type="password" id="nouveauMDP" name="nouveauMDP">
            <p>Confirmer Mot de Passe :</p>
            <input type="password" id="nouveauMDP" name="nouveauMDP">
            <input class="submit" type="submit" value="Connexion">
        </form>
    </div>
          

</body>

</html>