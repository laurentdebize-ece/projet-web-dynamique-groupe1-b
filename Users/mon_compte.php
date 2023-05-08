<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include("navbar.php") ?>
    <?php include("verif_connexion_bdd.php") ?>
    <?php include("verif_session.php") ?>
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
    <style>
        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body {
            font-family: "Century Gothic", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1.custom-title {
            text-align: center;
            margin-top: 70px;
            padding-top: 30px;
            font-weight: bold;
            animation: fadeInDown 1s ease;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: white;
            margin-bottom: -15px;
        }


        nav a {
            text-decoration: none;
            padding: 14px 20px;
            display: block;
            color: black !important;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;

        }

        nav a:hover {
            background-color: rgba(92, 158, 224, 0.1);
            color: rgb(38, 93, 155) !important;
        }

        .omnes-box:hover {
            background-color: rgba(232, 183, 176, 0.1);
            color: rgb(211, 128, 115) !important;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            border-radius: 5px;
        }

        .account-info {
            display: flex;
            flex-wrap: wrap;
            margin-top: 150px !important;
        }

        .info-box {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
            margin: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .info-box:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.16), 0 4px 6px rgba(0, 0, 0, 0.23);
            transform: scale(1.05);
        }

        .info-box h3 {
            font-size: 24 px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info-box p {
            font-size: 16px;
            line-height: 1.5;
        }

        .info-box ul {
            list-style-type: none;
            padding: 0;
        }

        .info-box li {
            margin-bottom: 10px;
        }

        .info-box a {
            color: rgb(38, 93, 155);
            text-decoration: none;
        }

        .info-box a:hover {
            text-decoration: underline;
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
        }

        .btn:hover {
            background-color: rgb(211, 128, 115);
            color: white;
            text-decoration: none;
        }
    </style>
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
                <button class="btn btn-modifier-infos">Modifier les informations</button>
            </div>
            <div class="info-box">
                <h3>Mot de passe</h3>
                <p>Le mot de passe n'est pas affiché pour des raisons de sécurité. Vous pouvez le modifier en cliquant sur le bouton ci-dessous.</p>
                <button class="btn" data-toggle="tooltip" data-placement="top" title="le MDP peut être modifié à l'infini">
                    Modifier le mot de passe
                </button>
            </div>
            <div class="info-box">
                <h3>Type de compte</h3>
                <?php
                $id = $_SESSION['id'] ;
                $sql = "SELECT type FROM compte WHERE idCompte=$id" ;
                $request = mysqli_query($bdd, $sql) ;
                $type = mysqli_fetch_object($request) ;
                if($type->type == 1) {
                    echo '<li>Type de compte : Administrateur </li>';
                }
                else if($type->type  == 2) {
                    echo '<li>Type de compte : Partenaire </li>';
                }
                else if($type->type  == 3) {
                    echo '<li>Type de compte : Client </li>';
                }
            
                ?>
                <p>Les types de comptes disponibles sont : utilisateur (client ou bénéficiaire), partenaire et administrateur.</p>
            </div>
        </div>
    </div>

</body>

</html>