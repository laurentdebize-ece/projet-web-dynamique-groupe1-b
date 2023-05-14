<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Partenaire - Cartes Cadeaux</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <?php include("../Users/verif_connexion_bdd.php") ?>
    <style>
        
    </style>
</head>

<body>    
    <link href="../CSS/formule.css" rel="stylesheet" type="text/css" media="all" />
    <div class="container">
        <section class="section">
            <h1>Espace Partenaire - Cartes Cadeaux</h1>
            <h2>Créez vos formules de cartes cadeaux</h2>

            <form action="traitement_formule.php" method="post">
                <div class="form-group">
                    <label>Sélectionnez une activité disponible</label>
                    <select class="form-control" id="activite">
                        <?php
                        $table = "SELECT theme FROM cartes";
                        $request = mysqli_query($bdd, $table);

                        while ($row = mysqli_fetch_array($request)) {
                            echo "<option>" . ucfirst($row['theme']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Valeur de la carte cadeau (en €)</label>
                    <input type="number" class="form-control" id="prix">
                </div>
                <div class="form-group">
                    <label>Durée de l'activité (Rentrez 0 si pas de durée)</label>
                    <input type="text" class="form-control" id="duree">
                </div>
                <div class="form-group">
                    <label>Description de la formule</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn boutton">Créer la formule</button>
            </form>
        </section>
    </div>
    <footer style="padding: 20px 0; text-align: center; background-color: #000; color: #d0d0d0; margin-top: 50px;">
        <a href="tableau_de_bord.php" class="btn boutton">Tableau de Bord</a>
        <br><br>
        <p>&copy; OMNES BOX 2023 | Tous droits réservés.</p>
    </footer>
</body>

</html>