<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
    // Vérifier la valeur de cookie popupShown
    const popupShown = getCookie('popupShown');
    if (!popupShown) {
        // Afficher le popup après 5 secondes
        setTimeout(function() {
            openPopup();
        }, 5000);
    }

    function openPopup() {
        // Afficher le popup
        document.getElementById("popup").style.display = "flex";
    }

    function closePopup() {
        // Fermer le popup
        document.getElementById("popup").style.display = "none";
        // Définir popupShown sur true
        document.cookie = "popupShown=true; expires=" + new Date(Date.now() + 86400000).toUTCString() + "; path=/";
    }

    // Fonction pour récupérer la valeur du cookie
    function getCookie(name) {
        const cookieValue = document.cookie.match('(^|[^;]+)\\s*' + name + '\\s*=\\s*([^;]+)');
        return cookieValue ? cookieValue.pop() : '';
    }
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - OMNES BOX</title>
    <style>
    
        .btn-design {
            background-color: rgb(211, 128, 115);
            color: white;
            font-size: 20px;
            font-weight: bold;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        
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

        #carousel {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            margin: 20px;
        }

        #carousel img {
            max-width: 100%;
            max-height: 100%;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            text-align: center;
            font-weight: bold;
            font-size: 28px;
        }

        .content p {
            text-align: justify;
            font-size: 18px;
        }

        .btn-discover {
            background-color: rgb(38, 93, 155);
            color: white;
            font-size: 20px;
            font-weight: bold;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-discover:hover {
            background-color: rgb(211, 128, 115);
            color: white;
            text-decoration: none;
        }
        /* Style du fond semi-transparent */
        #popup {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 9999; /* Ajoutez un z-index élevé pour que le pop-up soit au-dessus de tout le reste */
}

/* Style du contenu du pop-up */
#popup-content {
  background-color: white;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
  animation: fadeIn 0.5s;
  z-index: 10000; /* Ajoutez un z-index encore plus élevé pour que le contenu du pop-up soit au-dessus du fond semi-transparent */
}

/* Animation d'entrée */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-50px); }
  to { opacity: 1; transform: translateY(0); }
}
    </style>
</head>
<body>

  <!-- Contenu du pop-up -->
  <div id="popup">
    <div id="popup-content">
      <h2>Promotion de 15% sur toutes nos cartes cadeau !</h2>
      <p>Utilisez le code promo "OMNES15" lors de votre achat pour bénéficier de la réduction.</p>
      <button onclick="closePopup()">Fermer</button>
    </div>
  </div>

  <?php include("navbar.php") ?>

<div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Image/image1_caroussel.png" class="d-block w-100" alt="Image 1">
            <div class="carousel-caption d-none d-md-block">
                <a href="cartes_cadeau.php" class="btn btn-discover">Découvrir</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Image/image_2_caroussel.jpeg" class="d-block w-100" alt="Image 2">
            <div class="carousel-caption d-none d-md-block">
                <a href="cartes_cadeau.php" class="btn btn-discover">Découvrir</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://via.placeholder.com/800x300" class="d-block w-100" alt="Image 3">
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
    <p>Nous proposons une large sélection de cartes cadeaux pour toutes les occasions. Que vous souhaitiez offrir un cadeau d'anniversaire, de mariage, de Noël ou simplement pour dire merci, vous trouverez la carte cadeau idéale sur OmnesBox.</p>
    <hr>
    <h2>Comment ça marche</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="step">
                <div class="step-icon">
                    <i class="fas fa-gift"></i>
                </div>
                <h3>Choisissez une carte</h3>
                <p>Parcourez notre sélection de cartes cadeaux et choisissez celle qui correspond le mieux à vos besoins.</p>
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
    
    <style>
        .step {
            text-align: center;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 5px;
            transition: all 0.3s ease;
            background-color: #fcefe9;
           transition: all 0.3s ease !important;
        }
    
        .step:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #f7d9c9;
        }
    
        .step-icon {
            font-size: 50px;
            color: #d38073;
            margin-bottom: 20px;
        }
    
        .step h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    
        .step p {
            font-size: 18px;
        }
    </style>
    
    <script src="https://kit.fontawesome.com/your-key.js" crossorigin="anonymous"></script>
</div>
</div>
</body>
</html>




    


