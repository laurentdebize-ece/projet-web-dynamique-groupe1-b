<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte cadeau partenaire - OMNES BOX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
            background-color: #000000;
            color: #FFFFFF;
        }

        .header {
            background-image: url('header.jpg');
            height: 500px;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
        }

        .header h1 {
            position: relative;
            font-size: 50px;
            z-index: 1;
        }

        .card {
            background-color: #FFFFFF;
            color: #000000;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .card:hover {
            transform: scale(1.05);
            transition: transform 0.5s ease;
        }

        .card img {
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
        }

        .btn {
            background-color: #f0cb64;
            color: #000000;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #c6a537;
            color: #000000;
            text-decoration: none;
        }

        .btn-dashboard {
            background-color: #c6a537;
            color: #000000;
            transition: all 0.3s ease;
            margin-top: 20px;
            display: block;
            width: 100%;
        }

        .btn-dashboard:hover {
            background-color: #f0cb64;
            color: #000000;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="header text-center">
        <h1>Carte cadeau partenaire</h1>
    </div>
    <div class="container">
        <h2 class="my-4">Choisissez les activités pour votre carte cadeau :</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                <div class="card">
                    <img src="resto.jpg" alt="Restaurant" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Restaurant</h5>
                        <p class="card-text">Ajoutez l'option restaurant à votre carte cadeau.</p>
                        <a href="#" class="btn btn-primary">Choisir</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                <div class="card">
                    <img src="spa.jpg" alt="Spa" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Spa</h5>
                        <p class="card-text">Ajoutez l'option Spa à votre carte cadeau.</p>
                        <a href="#" class="btn btn-primary">Choisir</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                <div class="card">
                    <img src="aventure.jpg" alt="Aventure" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Aventure</h5>
                        <p class="card-text">Ajoutez l'option Aventure à votre carte cadeau.</p>
                        <a href="#" class="btn btn-primary">Choisir</a>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="my-4">Choisissez le montant pour votre carte cadeau :</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                <div class="card">
                    <img src="25euros.jpg" alt="25 euros" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">25€</h5>
                        <p class="card-text">Ajoutez l'option 25€ à votre carte cadeau.</p>
                        <a href="#" class="btn btn-primary">Choisir</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                <div class="card">
                    <img src="50euros.jpg" alt="50 euros" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">50€</h5>
                        <p class="card-text">Ajoutez l'option 50€ à votre carte cadeau.</p>
                        <a href="#" class="btn btn-primary">Choisir</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                <div class="card">
                    <img src="100euros.jpg" alt="100 euros" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">100 €</h5>
                        <p class="card-text">Ajoutez l'option 100€ à votre carte cadeau.</p>
                        <a href="#" class="btn btn-primary">Choisir</a>
                    </div>
                </div>
            </div>
        </div>

        <a href="tableau_de_bord.html" class="btn btn-dashboard">Retourner au tableau de bord</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>

</html>