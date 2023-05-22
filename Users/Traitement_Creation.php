<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php include("verif_session.php") ?>

    <meta http-equiv="refresh" content="5;url=../index.php">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REDIRECTION - OMNES BOX</title>
    <style>
        body {
            background-color: #f2f2f2;
            margin: 25vh;
          
        }

        .containeur {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .succes {
            background-color: #4CAF50;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .succes-tic {
            font-size: 48px;
            color: #fff;
            margin-bottom: 20px;
        }

        .succes-texte {
            color: #fff;
            font-size: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="containeur">
        <div class="succes">
            <span class="succes-tic">✔</span>
            <p class="succes-texte">Le compte a été créé avec succès.</p>
            <p class="succes-texte">Vous serez redirigé vers l'accueil dans 5 secondes...</p>
        </div>
    </div>
</body>

</html>