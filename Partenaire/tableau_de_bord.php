<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php      include("../Users/verif_session.php") ?>
    <title>Tableau de Bord</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: white;
            background-image: url(../Images/background_pro.jpeg);
        }


        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 2em;
            background-color: black;
        }

        .affichage {
            background: rgba(251, 251, 251, 0.1);
            border: none;
            border-radius: 10px;
            padding: 1.5em;
            margin-bottom: 2em;
            color: white;
            transition: all 0.3s ease;
        }

        .affichage:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .affichage h3 {
            font-size: 1.5em;
            margin-bottom: 0.5em;
        }

        .affichage p {
            margin-bottom: 1em;
        }

        a {
            display: inline-block;
            background-color: rgb(38, 93, 155);
            color: white;
            font-size: 12px;
            font-weight: bold;
            border: none;
            padding: 7px 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin-top: 1em;
            text-decoration: none;
        }

        a:hover {
            background-color: rgb(221, 188, 100);
            color: black;
        }
        
        footer {
            color: #fff;
            background-color: #000;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>

    <header class="container">
        <a data-aos="fade-up" href='../Users/deconnexion.php'>Déconnexion</a>
        <h1 style="text-align: center; padding: 20px 0;">Tableau de Bord</h1>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="affichage" data-aos="fade-up">
                        <h3>Cartes Cadeau</h3>
                        <p>Gérez vos offres de cartes cadeau et suivez leur utilisation.</p>
                        <a href="#">Voir les détails</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="affichage" data-aos="fade-up" data-aos-delay="200">
                        <h3>Formules</h3>
                        <p>Consultez et gérez vos formules d'abonnement et de partenariat.</p>
                        <a href="formule.php">Voir les détails</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="affichage" data-aos="fade-up" data-aos-delay="400" style="text-align: center">
                        <h3>Statistiques</h3>
                        <p>Consultez les statistiques de votre partenariat et optimisez vos performances.</p>
                        <a href="#">Voir les détails</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12" style='text-align:center'>
                <a style='text-align:center' href="../index.php">Retour sur le site</a>
            </div>
            <footer>
                <p>&copy; 2023 - OMNES BOX | Tous droits réservés.</p>
            </footer>
        </div>

    </main>



    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>

</html>