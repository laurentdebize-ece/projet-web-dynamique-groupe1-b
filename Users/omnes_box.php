<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include("verif_connexion_bdd.php") ?>
    <?php include("verif_session.php") ?>
    <script>
        $(document).ready(function() {
            $('.dropdown').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });
        });
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OmnesBox - OMNES BOX</title>
    <style>
        body {
            font-family: "Century Gothic", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        .omnesbox-info {
            display: flex;
            flex-wrap: wrap;
            margin-top: 40px;
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
        }
        .info-box h3 {
            font-size: 24px;
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
    
    <?php include("navbar.php") ?>

    <div class="container">
        <h1 style="text-align: center; margin-top: 20px;">J'ai une OmnesBox</h1>

        <div class="account-info">
            <div class="info-box">
                <h3>Numéro OmnesBox</h3>
                <p>Entrez votre numéro OmnesBox pour accéder aux offres et réductions disponibles.</p>
                <input type="text" placeholder="Numéro OmnesBox" style="width: 100%; padding: 8px; margin-bottom: 10px;">
                <button class="btn">Valider</button>
            </div>
            <div class="info-box">
                <h3>Offres disponibles</h3>
                <p>Une fois votre numéro OmnesBox validé, vous pourrez consulter les offres et réductions disponibles pour votre box.</p>
            </div>
            <div class="info-box">
                <h3>Comment ça marche ?</h3>
                <p>1. Entrez votre numéro OmnesBox dans le champ ci-dessus et validez.</p>
                <p>2. Consultez les offres et réductions disponibles pour votre box.</p>
                <p>3. Sélectionnez l'offre qui vous intéresse et suivez les instructions pour en profiter.</p>
            </div>
        </div>
    </div>

</body>
</html>



       
