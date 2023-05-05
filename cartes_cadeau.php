<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <title>Cartes cadeau - OMNES BOX</title>
    <style>
    
        body {
            font-family: "Century Gothic", sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(246, 246, 246);
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

        .gift-card-container {
            padding: 40px;
        }

        .gift-card-container h1 {
            text-align: center;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .gift-card-container .row {
            margin-bottom: 20px;
        }

        .gift-card-container .card {
            width: 100%;
            transition: all 0.3s ease;
        }

        .gift-card-container .card:hover {
            transform: translateY(-5px);
        }

        .gift-card-container .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .gift-card-container .card .card-body {
            text-align: center;
        }

        .gift-card-container .card .card-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .gift-card-container .card .card-text {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .gift-card-container .card .btn-add-to-cart {
    
            height: 40px !important;
            background-color: rgb(38, 93, 155);
            padding-bottom: -15px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            padding: 8px 16px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .gift-card-container .card .btn-add-to-cart:hover {
            background-color: rgb(211, 128, 115);
            color: white;
            text-decoration: none;
        }

        .filter-container {
            margin-bottom: 20px;
        }

        .filter-container h3 {
            margin-bottom: 10px;
        }

        .filter-container select {
            width: 100%;
            padding: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <?php include("navbar.php") ?>
    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <!-- Ajoutez ici le code du menu de navigation -->
    </nav>

    <div class="gift-card-container">
        <h1>Cartes cadeau</h1>
        <div class="filter-container">
            <h3>Filtres</h3>
            <div class="row">
                <div class="col-md-4">
                    <select id="filter-price">
                        <option value="">Prix</option>
                        <option value="25">25€</option>
                        <option value="50">50€</option>
                        <option value="100">100€</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select id="filter-activity">
                        <option value="">Activité</option>
                        <option value="restaurant">Restaurant</option>
                        <option value="spa">Spa</option>
                        <option value="adventure">Aventure</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary">Appliquer les filtres</button>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Ajoutez ici les cartes cadeaux en utilisant la structure de la carte ci-dessous -->
            <div class="col-md-4">
                <div class="card">
                    <img src="image_carte_apple.jpeg" alt="Exemple de carte cadeau">
                    <div class="card-body">
                        <h5 class="card-title">Carte cadeau Apple 25€</h5>
                        <p class="card-text">Offrez un accessoire apple dans un App sélectionné.</p>
                        <div id="quantity-input" style="margin-top: 30px !important;"></div>
                        <a href="#" class="btn btn-add-to-cart" id="add-to-cart-btn">Ajouter au panier</a>
                        <select class="form-control select-quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

