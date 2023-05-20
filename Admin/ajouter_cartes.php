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
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    padding: 20px;
}


.container {
    max-width: 500px;
    margin: auto;
}

.panel {
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    padding: 20px;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.05);
}

.titre{
    font-size: 45px;
}

.log {
    width: 100%;
    padding: .375rem .75rem;
    margin-bottom: 1rem;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}

.text {
    color: #212529;
    font-size: 1.25rem;
}

.submit {
    
    border-radius: 15px;
    background-color: #1877f2;
    color: white;
    width: 275px;
    height: 40px;
    border: #1877f2;
}

.submit:hover {
    width: 285px;
    height: 43px;
    background-color: #176ad5;
    border: #176ad5;
}

#row1, #row2 {
    display: none;
}

.pieddepage {
    margin-top: 1rem;
}


.btn {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

.btn:hover {
    background-color: white; 
    color: black; 
    border: 2px solid #007bff;
}
.bouton-container {
    display: flex;
    justify-content: center;
}
.file-input {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.file-label {
    background-color: #007bff;
    color: #fff;
    padding: 5px 10px; 
    border-radius: .25rem;
    cursor: pointer;
    font-size: 0.8rem; 
    transition: background-color .3s;
}
.file-label:hover{
    background-color: #0056b3;
    color: #ddd;
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
    <button class="btn" onclick="show('1','2')">Voir les cartes</button>
    <button class="btn" onclick="show('2','1')">Ajouter une cartes</button>

    <button></button>

    <div class="container">
        <div class="row" id="row1">
            <div class="col-sm-12"></div>
            <div class="col-sm-12" style="height:50%;">
                <div class="panel panel-default" style="height:650px;">
                    <br><br>
                    <h2 >Ajouter une nouvelle carte</h2><br>
                    <form action="traitement_creation_carte.php" method="post">
                        <div class="pieddepage">
                            <p class="text"> Thème :</p>
                        </div>
                         <input class="log" type="activite" name="theme" id="theme"> </span>
                        <div class="pieddepage">
                            <p class="text"> Description : </p>
                        </div>
                        <input class="log" type="description" name="description" id="description">
                        <div class="pieddepage">
                            <p class="text"> Prix :</p>
                        </div>
                        <input class="log" type="prix" name="prix" id="prix"> </span>
                        <div class="pieddepage">
                            
                        </div>
                        <input type="file" accept="image/*" name="image" id="image" class="file-input">
                        <label for="image" class="file-label">Choisir un fichier</label>
                        <br> 
                        <br> 
                        <br> 
                        <div class="bouton-container"> 
                        <input class="submit" type="submit" value="Continuer"></div>
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