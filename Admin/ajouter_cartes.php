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
    <style>
        #row1 {
            margin-right: 100px;
            display: none;
        }

        #row2 {
            display: none;
            margin-left: 100px;
        }
    </style>
</head>

<body>
    <script>
        function show(id1, id2) {
            event.preventDefault();
            document.getElementById("row" + id1).style.display = "none";
            document.getElementById("row" + id2).style.display = "block";
        }
    </script>

    <?php include("navbar_admin.php") ?>
    <button onclick="show('1','2')">Voir les cartes</button>
    <button onclick="show('2','1')">Ajouter une cartes</button>
    <button></button>

    <div class="container">
        <div class="row" id="row1">
            <div class="col-sm-12"></div>
            <div class="col-sm-12" style="height:50%;">
                <div class="panel panel-default" style="height:500px;">
                    <br><br>
                    <h2 class="text">Ajouter une nouvelle carte</h2><br>
                    <form action="" method="post">
                        <div class="pieddepage">
                            <p class="text"> Thème :</p>
                        </div>
                        <p class="log"> <input type="activite" name="theme" id="theme"> </span></p>
                        <div class="pieddepage">
                            <p class="text"> Description : </p>
                        </div>
                        <div class="pieddepage">
                            <p class="text"> Prix :</p>
                        </div>
                        <p class="log"> <input type="prix" name="prix" id="prix"> </span></p>
                        <div class="pieddepage">
                            <p class="text"> Image : </p>
                            <p> (mettre quelque chose pour charger l'image) </p>

                        </div>
                        <p class="log"><input type="description" name="description" id="description"></p>
                        <p class="log"><input class="submit" type="submit" value="Continuer"></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="row container" id="row2">
            <div class="col-sm-2"></div>
            <div class="panel panel-default" style="height:500px;">
                <br><br>
                <h2 class="text">Voir les cartes</h2><br>

                <div>
                    <?php
                    $table = "SELECT * FROM cartes";
                    $request = mysqli_query($bdd, $table);

                    while ($row = mysqli_fetch_array($request)) {
                        echo "<tr><td>ID : " . $row['idCarte'] . " </td><br><td>Thème : " . $row['theme'] . " </td><br></tr>";
                        echo "<br>";
                        echo "<br>";
                    }

                    ?>
                </div>

            </div>
        </div>

    </div>
</body>

</html>