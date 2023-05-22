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

    <?php

    include("../Users/verif_connexion_bdd.php");
    include("../Users/verif_session.php");


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $carteExist = false;
    $messageErreur = '';
    $suppressionErreur = '';
    $idPartenaire = $_SESSION['idPartenaire'];


    if (isset($_POST["activite"], $_POST["description"],$_POST["prix"], $_POST["duree"]) && !empty($_POST["activite"]) && !empty($_POST["description"]) && !empty($_POST["prix"]) && !empty($_POST["duree"])) {
        //sécurité contre faille XSS
        $activite = test_input($_POST["activite"]);
        $description = test_input($_POST["description"]);
        $duree = test_input($_POST["duree"]);
        $prix = test_input($_POST["prix"]);

        $formuleExist = false;
        $verify = "SELECT a.nom, f.prix, f.description
                FROM formule AS f, cartes AS c, partenariat AS p, activite AS a 
                WHERE p.idFormule = f.idFormule AND p.idCarte = c.idCarte AND c.idActivite = a.idActivite AND p.idPartenaire = '$idPartenaire'";
        $request = mysqli_query($bdd, $verify);
        if ($request != false) {
            while ($formule = mysqli_fetch_assoc($request)) {
                if (!strcasecmp($activite, $formule['nom']) && $prix == $formule['prix'] && $description == $formule['description']) {
                    $formuleExist = true;
                    break;
                }
            }
        }

        if ($formuleExist) {
            $messageErreur =  'Cette formule existe déjà dans la base de données.';
        } else {
            //CHERCHER l'ID de la CARTE CADEAU
            $request = mysqli_query($bdd, "SELECT c.idCarte FROM cartes AS c JOIN activite AS a ON a.idActivite = c.idActivite WHERE a.nom = '$activite'");
            $idCarte;
            while ($cartes = mysqli_fetch_assoc($request)) {
                $idCarte = $cartes['idCarte'];
            }
            //ID DU PARTENAIRE DANS LA SESSION
            $addFormule = "INSERT INTO formule
                            VALUES (NULL, '$duree', '$description', '$prix')";
            //Ajout de la formule
            if (mysqli_query($bdd, $addFormule)) {
                    $messageErreur = 'ERREUR : Formule non ajoutée';
            } else {
            }

            //ID DE LA FORMULE AJOUTEE
            $request = mysqli_query($bdd, 'SELECT MAX(idFormule) AS max FROM formule');
            $idFormule;
            while ($formules = mysqli_fetch_assoc($request)) {
                $idFormule = $formules['max'];
            }
            //AJOUT DANS LA TABLE PARTENARIAT

            if (mysqli_query($bdd, "INSERT INTO partenariat VALUES (NULL, '$idCarte', '$idPartenaire', '$idFormule')")) {
                $messageErreur =  'Formule ajoutée avec succès !';
            }
        }
    }
    if (isset($_POST["supprimer"]) && !empty($_POST["supprimer"])) {
        //sécurité contre faille XSS
        $activite = test_input($_POST["supprimer"]);    
        $idFormule = test_input(substr($activite, 5, 3));
        $supprimer_partenariat = "DELETE FROM partenariat WHERE idFormule = '$idFormule'";
        $supprimer_formule = "DELETE FROM formule WHERE idFormule = '$idFormule'";
        if (mysqli_query($bdd, $supprimer_partenariat) && mysqli_query($bdd, $supprimer_formule)) {
            $suppressionErreur = 'Suppression réussie !';
        }
    }
    ?>
</head>

<body>
    <link href="../CSS/formule.css" rel="stylesheet" type="text/css" media="all" />
    <div class="container">
        <section class="section">
            <h1>Espace Partenaire - Cartes Cadeaux</h1>
            <h2>Créez vos formules de cartes cadeaux</h2>
            <form action='' method="post">
                <div class="form-group">
                    <label>Sélectionnez une activité disponible</label>
                    <select class="form-control" name="activite" id="activite">
                        <?php
                        $table = "SELECT nom FROM activite";
                        $request = mysqli_query($bdd, $table);
                        while ($row = mysqli_fetch_array($request)) {
                            echo "<option>" . $row['nom'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Prix de la formule (en $)</label>
                    <select class="form-control" name="prix" id="prix">
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                        <option>200</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description de la formule</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Durée de l'activité (Rentrez 0 si pas de durée)</label>
                    <input type="text" name="duree" class="form-control" id="duree">
                </div>
                <input type="submit" value='Créer la formule' class="btn boutton"></input>
            </form>
        </section>
        <?php echo '<p>' . $messageErreur . '</p>' ?>
        <section class="section">
            <h1>Espace Partenaire - Cartes Cadeaux</h1>
            <h2>Supprimer vos formules de cartes cadeaux</h2>
            <form action='' method="post">
                <div class="form-group">
                    <label>Sélectionnez la formule que vous voulez supprimer</label>
                    <select class="form-control" name="supprimer" id="supprimer">
                        <?php
                        $idPartenaire = $_SESSION['idPartenaire'];
                        $table = "SELECT f.idFormule, a.nom, f.prix FROM formule AS f, activite AS a, cartes AS c, partenariat as p WHERE p.idCarte = c.idCarte AND p.idFormule = f.idFormule AND c.idActivite = a.idActivite AND p.idPartenaire = '$idPartenaire';";
                        $request = mysqli_query($bdd, $table);
                        while ($row = mysqli_fetch_array($request)) {
                            echo "<option>ID : " . $row['idFormule'] . " -- Thème : " . $row['nom'] . " -- Prix : " . $row['prix'] . "$</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" value='Supprimer la formule' class="btn boutton"></input>
            </form>
        </section>
        <?php echo '<p>' . $suppressionErreur . '</p>' ?>   
    </div>

    <footer style="padding: 0; text-align: center; background-color: #000; color: #d0d0d0; margin-top: 50px;">
        <a href="tableau_de_bord.php" class="btn boutton">Tableau de Bord</a>
        <br><br>
        <p>&copy; OMNES BOX 2023 | Tous droits réservés.</p>
    </footer>
</body>

</html>