<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Partenaires - Accueil</title>
    <style>
        body {
            font-family: "Century Gothic", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background-image: url('background_pro.jpeg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .header h1 {
            color: white;
            font-size: 4em;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            border-radius: 5px;
            padding: 2em;
        }

        .section-title {
            font-weight: bold;
            font-size: 2em;
            margin-bottom: 1em;
            text-align: center;
        }

        .info-card {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            border-radius: 5px;
            padding: 1em;
            margin-bottom: 1em;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.25), 0 6px 20px rgba(0, 0, 0, 0.19);
        }

        .info-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
        }

        .info-card h3 {
            font-weight: bold;
            font-size: 1.5em;
            margin-top: 1em;
        }

        .info-card p {
            margin-bottom: 0;
        }

        .info-card a {
            display: inline-block;
            background-color: rgb(38, 93, 155);
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin-top: 1em;
            text-decoration: none;
        }

        .info-card a:hover {
            background-color: rgb(211, 128, 115);
            color: white;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>Bienvenue dans l'Espace Partenaires</h1>
    </header>
    <main>
        <div class="container">
            <h2 class="section-title">Informations utiles pour les partenaires</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="info-card" data-aos="fade-up">
                        <img src="image1.jpg" alt="Image 1">
                        <h3>Devenir partenaire</h3>
                        <p>Tout savoir sur comment devenir partenaire et profiter des avantages de notre plateforme.</p>
                        <a href="#">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card" data-aos="fade-up" data-aos-delay="200">
                        <img src="image2.jpg" alt="Image 2">
                        <h3>Conditions générales</h3>
                        <p>Consultez les conditions générales pour les partenaires et leurs responsabilités.</p>
                        <a href="#">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card" data-aos="fade-up" data-aos-delay="400">
                        <img src="image3.jpg" alt="Image 3">
                        <h3>Support et assistance</h3>
                        <p>Accédez à notre support en ligne et trouvez les réponses à vos questions.</p>
                        <a href="#">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

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