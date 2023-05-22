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
    max-width: 800px;
    margin: auto;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); 
    background-color: #fff; 
    border-radius: 10px; 
    padding: 20px;
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
    
    transition: border-color 0.2s;
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
    background-color: #176ad5;
    border-color: #176ad5;
}





.btn {
    font-size: 16px;
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    color: white;
    background-color: #007bff;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

.bouton-container {
    display: flex;
    justify-content: space-around; 
    flex-wrap: wrap; 
    margin-bottom: 20px; 
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
}


</style>


</head>

<body>
    <script>
        function show(id1,id2,id3,id4) {
            event.preventDefault();
            document.getElementById("row" + id1).style.display = "block";
            document.getElementById("row" + id2).style.display = "none";
            document.getElementById("row" + id3).style.display = "none";
            document.getElementById("row" + id4).style.display = "none";
            
        
        }
    </script>

    <?php include("navbar_admin.php") ?>
    <div class="container">
    
    <div class="bouton-container">
    <div class="row justify-content-end">
    <h1>Administrateur</h1></div></div>
    <br>
    
    <div class="col">
    <div class="bouton-container">
    <button class="btn" onclick="show('1','2','3','4')">Voir les Cartes</button>
    <button class="btn" onclick="show('2','1','3','4')">Ajouter un Cartes</button>
    <button class="btn" onclick="show('3','1','2','4')">Ajouter un Partenaire</button>
    <button class="btn" onclick="show('4','1','2','3')">Voir les Partenaires</button>
    
</div>
    
</div>
    </div>

    <div class="container">
    <div class="row" id="row1">
            <div class="col" style="height:50%;">
                <div class="panel panel-default" style="height:650px;">
                    <br><br>
                    <h2>Voir les Cartes</h2><br>
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
        <div class="row" id="row2">
            <div class="col" style="height:50%;">
                <div class="panel panel-default" style="height:650px;">
                    <br><br>
                    <h2 >Ajouter une nouvelle carte</h2><br>
                    <form action="traitement_creation_carte.php" method="post">
                        <div class="pieddepage">
                            <p class="text"> Thème :</p>
                        </div>
                         <input class="log" name="theme" id="theme"> </span>
                        <div class="pieddepage">
                            <p class="text"> Description : </p>
                        </div>
                        <input class="log"  name="description" id="description">
                        <div class="pieddepage">
                            <p class="text"> Prix :</p>
                        </div>
                        <input class="log"  name="prix" id="prix"> </span>
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
    <div class="row" id="row3">
            <div class="col" style="height:50%;">
                <div class="panel panel-default" style="height:650px;">
                    <br><br>
                    <h2 >Ajouter un Partenaire</h2><br>
                    <form action="traitement_creation_partenaire.php" method="post">
                        <div class="pieddepage">
                            <p class="text"> Nom :</p>
                        </div>
                         <input class="log" name="nom" id="nom"> </span>
                        <div class="pieddepage">
                            <p class="text"> Emplacement : </p>
                        </div>
                        <input class="log"name="emplacement" id="emplacement">
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
                        <input class="submit" type="submit" value="Continuer"></div>
                    </form>
                </div>
            </div>
    </div>
    <div class="row" id="row4">
            <div class="col" style="height:50%;">
                <div class="panel panel-default" style="height:650px;">
                    <br><br>
                    <h2>Voir les Partenaires</h2><br>
                    <div>
                    <?php
                    

                    ?>
                </div>
                       
                </div>
            </div>


            
                
        
                



    </div>
</body>

</html>