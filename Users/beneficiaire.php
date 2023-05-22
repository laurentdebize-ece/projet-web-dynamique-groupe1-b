<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();

            $('.dropdown').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });

            // animation d'entrée
            $('.form-group').each(function(i) {
                $(this).delay(500 * i).animate({
                    'opacity': '1',
                    'margin-top': '0'
                }, 500);
            });
        });
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bénéficiaire - OMNES BOX</title>
    <style>
        body {
            font-family: "Century Gothic", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
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

        .cart-container {
            padding: 40px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            max-width: 1200px;
            margin: 40px auto;
        }

        .cart-container h1 {
            text-align: center;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th {
            background-color: rgb(38, 93, 155);
            color: white;
            padding: 10px;
            font-weight: bold;
        }

        .cart-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .cart-table img {
            width: 100px;
            border-radius: 5px;
        }

        .cart-summary {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
        }

        .cart-summary p {
            margin-bottom: 0;
        }

        .cart-summary strong {
            font-size: 20px;
        }

        .btn-checkout {
            margin-top: 30px;
            background-color: rgb(211, 128, 115);
            color: white;
            font-size: 20px;
            font-weight: bold;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            transition: all 0.3s ease;
            text-align: center;
            display: block;
            width: 50%;
            margin: 0 auto;
            cursor: pointer;
        }

        .btn-checkout:hover {
            background-color: rgb(38, 93, 155);
            color: white;
            text-decoration: none;
        }

        .navbar-separator {
            height: 10px;
            background-color: rgb(232, 183, 176);
        }

        .form-control {
            transition: box-shadow 0.2s ease-in-out;
        }

        .form-control:focus {
            box-shadow: 0 0 0.5rem rgba(38, 93, 155, 0.25);
        }

        .form-group {
            opacity: 0;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar en php -->

    <div class="cart-container">
        <h1>Informations du bénéficiaire</h1>
        <form>
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" class="form-control" id="email" placeholder="prenom@example.com">
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="nom" class="form-control" id="nom" placeholder="nom">
            </div>
            <div class="form-group">
                <label for="nom">Prénom</label>
                <input type="prenom" class="form-control" id="prenom" placeholder="prenom">
            </div>
            <div class="form-group">
                <label for="postal">Code postal</label>
                <input type="text" class="form-control" id="postal" placeholder="12345">
            </div>
            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="tel" class="form-control" id="phone" placeholder="0612345678">
            </div>
            <div class="form-group">
                <button type="submit" class="btn-checkout">Soumettre</button>
            </div>
        </form>
    </div>

</body>

</html>