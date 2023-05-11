<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../CSS/accueil.css" rel="stylesheet" type="text/css" media="all" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - OMNES BOX</title>

    <?php include("navbar.php"); ?>
    <!-- ASSURE LA CONNEXION A LA BASE DE DONNEES -->
    <?php include("verif_connexion_bdd.php") ?>
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION["connected"])) {
        $_SESSION["connected"] = false;
    }
    ?>

    <script src="https://kit.fontawesome.com/your-key.js" crossorigin="anonymous"></script>
    <script>
        function showThankYouMessage() {
            event.preventDefault();
            var email = document.getElementById("email").value;
            if (email) {
                document.querySelector("form").style.display = "none";
                document.getElementById("thank-you-message").style.display = "block";
            } else {
                alert("Veuillez entrer une adresse e-mail valide.");
            }
        }
    </script>




</head>

<body>
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../Images/image_1_caroussel.png" width="850" height="600" class="d-block w-100" alt="Image 1">
                <div class="carousel-caption d-none d-md-block">
                    <a href="cartes_cadeau.php" class="btn btn-discover">Découvrir</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../Images/image_2_caroussel.png" width="850" height="600" class="d-block w-100" alt="Image 2">
                <div class="carousel-caption d-none d-md-block">
                    <a href="cartes_cadeau.php" class="btn btn-discover">Découvrir</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../Images/image_3_caroussel.png" width="850" height="600" class="d-block w-100" alt="Image 3">
                <div class="carousel-caption d-none d-md-block">
                    <a href="ca" class="btn btn-discover">Découvrir</a>
                </div>
            </div>
        </div>
        <div class="text-center my-4">
            <a href="professionnel.php" class="btn btn-design" data-toggle="tooltip" data-placement="bottom" title="Cliquez ici si vous êtes un professionnel">Vous êtes un professionnel ?</a>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>

    <div class="content">
        <h2>Bienvenue sur notre site de cartes cadeaux !</h2>
        <p>Nous proposons une large sélection de cartes cadeaux pour toutes les occasions. Que vous souhaitiez offrir un
            cadeau d'anniversaire, de mariage, de Noël ou simplement pour dire merci, vous trouverez la carte cadeau
            idéale sur OmnesBox.</p>
        <hr>
        <h2>Comment ça marche</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3>Choisissez une carte</h3>
                    <p>Parcourez notre sélection de cartes cadeaux et choisissez celle qui correspond le mieux à vos
                        besoins.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-pen"></i>
                    </div>
                    <h3>Personnalisez</h3>
                    <p>Ajoutez un message personnel et choisissez un design pour votre carte cadeau.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Offrez</h3>
                    <p>Envoyez la carte cadeau par e-mail ou imprimez-la pour l'offrir en personne.</p>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Newsletter</h4>
                    <p>Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles et offres spéciales.</p>
                    <form onsubmit="return showThankYouMessage()">
                        <input type="email" class="newsletter-input" id="email" placeholder="Entrez votre adresse e-mail" required>
                        <button type="submit" class="btn btn-newsletter">S'inscrire</button>
                    </form>
                    <div id="thank-you-message" style="display:none;">
                        <h2>Merci de vous être inscrit !</h2>
                        <p>Un e-mail de confirmation a été envoyé à votre adresse. Veuillez le vérifier pour compléter
                            votre inscription.</p>
                    </div>
                </div>
                <div id="thank-you-message" style="display:none;">
                    <h2>Merci de vous être inscrit !</h2>
                    <p>Un e-mail de confirmation a été envoyé à votre adresse. Veuillez le vérifier pour compléter votre
                        inscription.</p>
                </div>
                <script src="newsletter.js"></script>
                <div class="col-md-4">
                    <h4>Liens utiles</h4>
                    <ul class="useful-links">
                        <li><a href="contact.html">Contactez-nous</a></li>
                        <li><a href="mentions_legales.html">Mentions légales</a></li>
                        <li><a href="mentions_legales.html">Politique de confidentialité</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Suivez-nous</h4>

                    <a href="https://www.instagram.com" target="_blank">
                        <img src="../Images/insta.png" alt="Logo 1" width="35" height="35">
                    </a>
                    <a href="https://www.twitter.com" target="_blank">
                        <img src="../Images/twitter_png.png" alt="Logo 2" width="35" height="35">
                    </a>
                    <a href="https://www.linkedin.com" target="_blank">
                        <img src="../Images/logo_linkedin.png" alt="Logo 2" width="35" height="35">
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>