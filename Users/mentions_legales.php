<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include("verif_session.php");?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions légales - OMNES BOX</title>
    <style>
        .conteneur-mentions {
            padding: 40px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            max-width: 1200px;
            margin: 40px auto;
        }

        .conteneur-mentions h1 {
            text-align: center;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .conteneur-mentions p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include("navbar.php") ?> 
    <hr>
    <div class="conteneur-mentions">
        <h1>Mentions légales</h1>
        <p>
            Le présent site internet est édité par la société OMNES BOX, Société au capital de
            1 000 000€, dont le siège social est situé 25 Rue de l'Université, 69007 Lyon, France.
        </p>
        <p>
            Directeur de la publication : M. Fares BALY, Président de la société OMNES BOX.
        </p>
        <p>
            Hébergeur : OMNES Education, dont le siège social est situé dans Paris.
        </p>
        <p>
            Pour toute question concernant le site ou les services proposés, veuillez nous contacter par e-mail à
            contact@omnesbox.fr ou par courrier postal à l'adresse suivante : OMNES BOX, 25 Rue de l'Université, 69007 Lyon,
            France.
        </p>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>