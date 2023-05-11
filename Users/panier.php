<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

    <script>
        function updateCartDisplay() {
            const cartContainer = document.getElementById("cartContainer");
            cartContainer.innerHTML = ""; // Videz le contenu du panier

            cart.forEach(item => {
                const cartItem = document.createElement("div");
                cartItem.innerHTML = `
                    <p>${item.name}</p>
                    <p>${item.price}</p>
                    <p>${item.quantity}</p>
                `;
                cartContainer.appendChild(cartItem);
            });
        }

        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $('.dropdown').hover(function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });
        });
    </script>
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
                    <td><img src="exemple_produit.jpg" alt="Exemple produit"></td>
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
        <a href="caisse.html" class="btn-checkout">Passer à la caisse</a>
    </div>

</body>

</html>

