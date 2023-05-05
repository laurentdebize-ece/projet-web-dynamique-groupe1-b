<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix du type de compte - OMNES BOX</title>
    <style>
        body {
            background-color: rgb(246, 246, 246);
            font-family: "Century Gothic", sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: white;
            margin-bottom: -16px;
        }

        nav a {
            text-decoration: none;
            padding: 14px 20px;
            display: block;
            color: black !important;
            font-weight: bold;
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px);
            padding: 20px;
        }

        .card {
            border-radius: 10px;
            width: 300px;
            padding: 20px;
            margin: 0 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card a {
            display: inline-block;
            padding: 10px 20px;
            background-color: rgb(38, 93, 155);
            color: white;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .card a:hover {
            background-color: rgb(211, 128, 115);
        }

        .separator {
            height: 2px;
            background-color: black;
            margin: 0 -20px;
        }
    </style>
</head>
<body>

    <?php include("navbar.php") ?> 
    <hr>

    <div class="separator"></div>

    <div class="container">
        <div class="card">
            <h3 class="card-title">Administrateur</h3>
            <p>Accédez à l'interface d'administration pour gérer les comptes et les fonctionnalités du site.</p>
            <a href="connexion_administrateur.html">Se connecter</a>
        </div>
        <div class="card">
            <h3 class="card-title">Partenaire</h3>
            <p>Accédez à l'interface dédiée aux partenaires pour gérer vos offres et suivre vos ventes.</p>
            <a href="connexion_partenaire.html">Se connecter</a>
        </div>
        <div class="card">
            <h3 class="card-title">Utilisateur</h3>
            <p>Accédez à votre compte utilisateur pour consulter vos commandes et gérer vos informations personnelles.</p>
            <a href="connexion_utilisateur.html">Se connecter</a>
        </div>
    </div>

</body>
</html>

