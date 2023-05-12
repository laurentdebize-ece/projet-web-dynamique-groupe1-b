<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include("verif_connexion_bdd.php") ?>
    <?php include("verif_session.php") ?>
    <link href="../CSS/omnes_box.css" rel="stylesheet" type="text/css" media="all" />
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
    <title>OmnesBox - OMNES BOX</title>
</head>

<body>

    <?php include("navbar.php") ?>

    <div class="container2">
        <h1 style="text-align: center; margin-top: 20px;">J'ai une OmnesBox</h1>

        <div class="account-info">
            <div class="info-box">
                <h3>Numéro OmnesBox</h3>
                <p>Entrez votre numéro OmnesBox pour accéder aux offres et réductions disponibles.</p>
                <form method="POST" action="traiement_OMNESBOX.php">
                    <input type="text" name="omnesbox" placeholder="Numéro OmnesBox" style="width: 100%; padding: 8px; margin-bottom: 10px;">
                    <button type="submit" class="btn" formmethod="POST" formaction="traiement_OMNESBOX.php">Valider</button>
                </form>

            </div>
            <div class="info-box">
                <h3>Offres disponibles</h3>
                <p>Une fois votre numéro OmnesBox validé, vous pourrez consulter les offres et réductions disponibles pour votre box.</p>
            </div>
            <div class="info-box">
                <h3>Comment ça marche ?</h3>
                <p>1. Entrez votre numéro OmnesBox dans le champ ci-dessus et validez.</p>
                <p>2. Consultez les offres et réductions disponibles pour votre box.</p>
                <p>3. Sélectionnez l'offre qui vous intéresse et suivez les instructions pour en profiter.</p>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>