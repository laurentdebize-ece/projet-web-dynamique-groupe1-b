<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - OMNES BOX</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById("paymentForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Empêcher l'envoi du formulaire par défaut
            // Ici, vous devriez ajouter des vérifications et des traitements de paiement supplémentaires
            window.location.href = "omnes_box.html"; // Rediriger vers la page "J'ai une OmnesBox"
        });
    </script>



    <style>
        body {
            font-family: "Century Gothic", sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(38, 93, 155, 0.5);
            border-color: rgb(38, 93, 155);
        }

        .btn-submit {
            background-color: rgb(211, 128, 115);
            color: white;
            font-size: 20px;
            font-weight: bold;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            cursor: pointer;
            display: block;
            width: 100%;
            margin: 30px auto;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background-color: rgb(38, 93, 155);
            color: white;
        }
    </style>
</head>

<body>
    <div class="container animate__animated animate__fadeIn">
        <h1>Informations de paiement</h1>
        <form>
            <form id="paymentForm">
                <!-- Les autres éléments du formulaire -->
            </form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">Prénom</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Prénom" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Nom</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Nom" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Rue des Exemples" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" id="city" placeholder="Paris" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="state">Pays</label>
                    <select id="state" class="form-control" required>
                        <option selected>France</option>
                        <option>Belgique</option>
                        <option>Suisse</option>
                        <option>Luxembourg</option>
                        <option>Canada</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="zip">Code postal</label>
                    <input type="text" class="form-control" id="zip" placeholder="75000" required>
                </div>
            </div>
            <div class="form-group">
                <label for="cardNumber">Numéro de carte bancaire</label>
                <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="expiration">Date d'expiration</label>
                    <input type="text" class="form-control" id="expiration" placeholder="MM/AA" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="cvv">Code CVV</label>
                    <input type="text" class="form-control" id="cvv" placeholder="123" required>
                </div>
            </div>
            <button type="submit" class="btn-submit">Valider le paiement</button>
        </form>
    </div>
</body>
<?php include("footer.php"); ?>
</html>