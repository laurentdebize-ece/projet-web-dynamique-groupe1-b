<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  include("../Users/verif_session.php") ?>
    <link href="../CSS/tableau_bord.css" rel="stylesheet" type="text/css" media="all" />
    <title>Tableau de Bord</title>
</head>

<body>

    <header class="container">
        <a data-aos="fade-up" href='../Users/deconnexion.php'>Déconnexion</a>
        <h1 style="text-align: center; padding: 20px 0;">Tableau de Bord</h1>
    </header>
    <main>
        <div class="container">
            <div class="row" style="text-align: center">
                <div class="col-lg-12">
                    <div class="affichage" data-aos="fade-up" data-aos-delay="200">
                        <h3>Formules</h3>
                        <p>Consultez et gérez vos formules d'abonnement et de partenariat.</p>
                        <a href="formule.php">Voir les détails</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="affichage" data-aos="fade-up" data-aos-delay="400" >
                        <h3>Statistiques</h3>
                        <p>Consultez les statistiques de votre partenariat et optimisez vos performances.</p>
                        <a href="statistiques.php">Voir les détails</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12" style='text-align:center'>
                <a style='text-align:center' href="../index.php">Retour sur le site</a>
            </div>
            <footer>
                <p>&copy; 2023 - OMNES BOX | Tous droits réservés.</p>
            </footer>
        </div>

    </main>



    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>

</html>