<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur - OMNES BOX</title>
    <?php include("../Users/verif_connexion_bdd.php") ?>
    <link href="../CSS/accueil_admin.css" rel="stylesheet" type="text/css" media="all" />
    <script>
        function show(id1, id2, id3, id4) {
            event.preventDefault();
            document.getElementById("row" + id1).style.display = "block";
            document.getElementById("row" + id2).style.display = "none";
            document.getElementById("row" + id3).style.display = "none";
            document.getElementById("row" + id4).style.display = "none";
        }
    </script>
    <style>
        .btn2 {
            font-size: 16px;
            padding: 7px 15px;
            border: none;
            border-radius: 5px;
            color: white;
            background-color: #ff0000cf;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn2:hover {
            background-color: #b30000;
        }
    </style>
</head>

<body>
    <div class="bouton-container">
        <a class="btn" href='../index.php'>Accueil</a>
    </div>
    <div class="container">
        <div class="bouton-container">
            <div class="row justify-content-end">
                <h1>Administrateur</h1>
            </div>
        </div>
        <br>
        <div class="col">
            <div class="bouton-container">
                <button class="btn" onclick="show('1','2','3','4')">Voir les cartes</button>
                <button class="btn" onclick="show('2','1','3','4')">Ajouter une carte</button>
                <button class="btn" onclick="show('3','1','2','4')">Ajouter un partenaire</button>
                <button class="btn" onclick="show('4','1','2','3')">Voir les partenaires</button>
            </div>
        </div>
    </div>

    <div class="row" id="row1">
        <div class="col" style="height:50%;">
            <div class="panel panel-default">
                <br><br>
                <h2>Voir les Cartes</h2><br>
                <div>
                    <?php
                    $table = "SELECT c.idCarte, c.prix, a.description_activite, a.nom FROM cartes AS c, activite AS a WHERE c.idActivite = a.idActivite";
                    $request = mysqli_query($bdd, $table);
                    while ($row = mysqli_fetch_array($request)) {
                        echo "<div class='carte'>";
                        echo "<h2 class='carte-titre'> ID : " . $row['idCarte'] . "</h2>";
                        echo "<button onclick=\"window.location.href = 'supprimer_cartes.php?id=" . $row['idCarte'] . "';\" class='btn2'>Supprimer</button>";   
                        echo "<br><br>";
                        echo "<p class='carte-description'> Thème : " . $row['nom'] . "</p>";
                        echo "<p class='carte-description'> Prix : " . $row['prix'] . "$</p>";
                        echo "<p class='carte-description'> Description : " . $row['description_activite'] . "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="row2">
        <div class="col" style="height:50%;">
            <div class="panel panel-default" style="height:650px;">
                <br><br>
                <h2>Ajouter une nouvelle carte</h2><br>
                <form action="traitement_cartes.php" method="post">
                    <div class="pieddepage">
                        <p class="text"> Thème :</p>
                    </div>
                    <input class="log" name="theme" id="theme"> </span>

                    <div class="pieddepage">
                        <p class="text"> Prix : </p>
                    </div>
                    <input type="text" class="log" name="prix" id="prix">

                    <div class="pieddepage">
                        <p class="text"> Description : </p>
                    </div>
                    <input type="text" class="log" name="description" id="description">

                    <br>

                    <div class="pieddepage">
                        <p class="text"> Image : </p>
                    </div>
                    <input class="file-label" type="file" accept="image/*" name="image" id="image">
                    <br>
                    <br>
                    <br>
                    <div class="bouton-container">
                        <input class="submit" type="submit" value="Continuer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row" id="row3">
        <div class="col" style="height:50%;">
            <div class="panel panel-default" style="height:650px;">
                <br><br>
                <h2>Ajouter un Partenaire</h2><br>
                <form action="traitement_creation_partenaire.php" method="post">
                    <div class="pieddepage">
                        <p class="text"> Nom :</p>
                    </div>
                    <input class="log" name="nom" id="nom"> </span>
                    <div class="pieddepage">
                        <p class="text"> Email : </p>
                    </div>
                    <input class="log" name="email" id="email">
                    <div class="pieddepage">
                        <p class="text"> Mot de passe : </p>
                    </div>
                    <input class="log" name="mdp" id="mdp">
                    <div class="pieddepage">
                        <p class="text"> Description :</p>
                    </div>
                    <input class="log" name="description" id="description"> </span>
                    <div class="pieddepage">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="bouton-container">
                        <input class="submit" type="submit" value="Continuer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row" id="row4">
        <div class="col" style="height:50%;">
            <div class="panel panel-default">
                <br><br>
                <h2>Voir les Partenaires</h2><br>
                <div>
                    <?php
                    $table = "SELECT * FROM partenaire ";
                    $request = mysqli_query($bdd, $table);
                    while ($row = mysqli_fetch_array($request)) {
                        $idPartenaire = $row['idPartenaire'];
                        $request2 = "SELECT * FROM activer WHERE idPartenaire = $idPartenaire";
                        echo "<div class='carte'>";
                        echo "<h2 class='carte-titre'> ID : " . $row['idPartenaire'] . "</h2>";
                        echo "<button onclick=\"window.location.href = 'supprimer_partenaire.php?id=" . $idPartenaire . "';\" class='btn2'>Supprimer</button>";   
                        echo "<br><br>";
                        echo "<p class='carte-description'> Nom du Partenaire : " . $row['nom'] . "</p>";
                        echo "<p class='carte-description'> Email : " . $row['email'] . "</p>";
                        if (mysqli_num_rows(mysqli_query($bdd, $request2)) > 0) {
                            echo "<p style ='color:red'> En attente d'activation... </p>";
                        }
                        echo "</div>";
                    }
                    ?>
                </div>

            </div>
        </div>
</body>

</html>