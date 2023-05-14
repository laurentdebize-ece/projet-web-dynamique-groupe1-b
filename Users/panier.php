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
    <link href="../CSS/panier.css" rel="stylesheet" type="text/css" media="all" />

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