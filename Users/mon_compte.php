<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../CSS/mon_compte.css" rel="stylesheet" type="text/css" media="all" />
    <?php include("navbar.php") ?>
    <?php include("verif_connexion_bdd.php") ?>
    
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['id'])) {
        // Rediriger vers la page de connexion
        header("Location: connexion.php");
        exit;
        }
    ?>

    <script>
        $(document).ready(function() {
            $('.dropdown').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });
            $('[data-toggle="tooltip"]').tooltip();
            $('.btn-modifier-infos').click(function() {
                // Code pour afficher une fenêtre modale avec un formulaire pour modifier les informations
            });
        });
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte - OMNES BOX</title>
</head>

<body>

    <div class="container">
        <h1 class="custom-title">Mon compte</h1>

        <div class="account-info">
            <div class="info-box">
                <h3>Informations personnelles</h3>
                <ul>
                    <?php
                    echo '<li>Nom : ' . $_SESSION['nom'] . '</li>';

                    echo '<li>Prénom : ' . $_SESSION['prenom'] . '</li>';

                    echo '<li>Email : ' . $_SESSION['email'] . '</li>';
                    ?>
                </ul>
                <button class="btn btn-modifier-infos"  Onclick="location.href='modifier_info.php' ">Modifier les informations</button>
            </div>
            <div class="info-box">
                <h3>Mot de passe</h3>
                <p>Le mot de passe n'est pas affiché pour des raisons de sécurité. Vous pouvez le modifier en cliquant sur le bouton ci-dessous.</p>
                <button class="btn" data-toggle="tooltip" data-placement="top" title="le MDP peut être modifié à l'infini">
                    Modifier le mot de passe </button>
                
            </div>
            <div class="info-box">
                <h3>Type de compte</h3>
                <?php
                $id = $_SESSION['id'];
                $sql = "SELECT type FROM compte WHERE idCompte=$id";
                $request = mysqli_query($bdd, $sql);
                $type = mysqli_fetch_object($request);
                if ($type->type == 1) {
                    echo '<li>Type de compte : Administrateur </li>';
                } else if ($type->type  == 2) {
                    echo '<li>Type de compte : Partenaire </li>';
                } else if ($type->type  == 3) {
                    echo '<li>Type de compte : Client </li>';
                }

                ?>
                <p>Les types de comptes disponibles sont : utilisateur (client ou bénéficiaire), partenaire et administrateur.</p>
            </div>
        </div>
    </div>

</body>

</html>