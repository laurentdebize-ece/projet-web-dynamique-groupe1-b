<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include('verif_session.php') ;?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - OMNES BOX</title>
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
    </style>
</head>

<body>

    <?php include("navbar.php") ?>
    <hr>

    <div class="cart-container">
        <h1>Votre panier</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Description</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Ajoutez ici les lignes correspondant aux articles de votre panier -->
                <tr>
                    <td><img src="../Images/image_carte_apple.jpeg" alt="Exemple produit"></td>
                    <td>Exemple de produit</td>
                    <td>25€</td>
                    <td>
                        <input type="number" min="1" value="1" class="form-control" style="width: 80px;">
                    </td>
                    <td>25€</td>
                </tr>
            </tbody>
        </table>
        <div class="cart-summary">
            <p><strong>Total :</strong></p>
            <p>25€</p>
        </div>
        <a href="caisse.php" class="btn-checkout">Passer à la caisse</a>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>