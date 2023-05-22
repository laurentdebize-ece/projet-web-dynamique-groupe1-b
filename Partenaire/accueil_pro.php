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
    <?php include("../Users/verif_connexion_bdd.php") ?>
    <?php include("../Users/verif_session.php") ?>
</head>

<body>
    <link href="../CSS/accueil_Pro.css" rel="stylesheet" type="text/css" media="all" />
    <header class="header">
        <h1>Bienvenue dans l'Espace Partenaires</h1>
        <?php
        if (isset($_SESSION['connectedPartenaire']) && $_SESSION['connectedPartenaire'] == true) {
            echo '<button class="boutton" onclick="location.href=\'tableau_de_bord.php\';">Mon compte partenaire</button>';
        } else if (isset($_SESSION['connected']) && $_SESSION['connected'] == false) {
            echo '<button class="boutton" onclick="location.href=\'connexion_partenaire.php\';">Connexion</button>';
        }
        ?>
    </header>
    <br>
    <hr>

    <main>
        <div class="container">
            <h2 class="section-title">Informations utiles pour les partenaires</h2>
            <div class="row" >
                <div class="col-md-4" >
                    <div class="infos" data-aos="fade-up">
                        <img src="../Images/image2.jpg" alt="Image 1" v>
                        <h3>Devenir partenaire</h3>
                        <p>Tout savoir sur comment devenir partenaire et profiter des avantages de notre plateforme.</p>
                        <a href="devenir_partenaire.php">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="infos" data-aos="fade-up" data-aos-delay="200">
                        <img src="../Images/image3.jpg" alt="Image 2">
                        <h3>Support et assistance</h3>
                        <p>Accédez à notre support en ligne et trouvez les réponses à vos questions.</p>
                        <a href="#">En savoir plus</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="infos" data-aos="fade-up" data-aos-delay="400">
                        <img src="../Images/image1.jpg" alt="Image 3">
                        <h3>Revenir à l'accueil</h3>
                        <p>Accédez aux cartes cadeaux.</p>
                        <a href="../index.php">Accueil</a>
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