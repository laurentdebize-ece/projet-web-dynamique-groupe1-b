<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - OMNES BOX</title>
    <?php include("verif_session.php");?>

    <style>
        body {
            font-family: "Century Gothic", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .omnes-box:hover {
            background-color: rgba(232, 183, 176, 0.1);
            color: rgb(211, 128, 115) !important;
        }

        .contact {
            padding: 40px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            max-width: 1200px;
            margin: 40px auto;
        }

        .contact h1 {
            text-align: center;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            margin-bottom: 20px;
        }

        .btn-submit {
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

        .btn-submit:hover {
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
    <?php include("navbar.php"); ?>
    <hr>
    <div class="contact">
        <h1>Contactez-nous</h1>
        <form class="contact-form">
            <input type="text" placeholder="Votre nom" required>
            <input type="email" placeholder="Votre adresse e-mail" required>
            <input type="text" placeholder="Objet" required>
            <textarea rows="5" placeholder="Votre message" required></textarea>
            <button type="submit" class="btn-submit">Envoyer</button>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>