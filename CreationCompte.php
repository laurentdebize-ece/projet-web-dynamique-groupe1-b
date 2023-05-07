<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title> OmnesBox </title>
    <link href="style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="action.js"> </script>

    </head>

    <body>
    <style>
    
    .log {
        text-align:left ;
        margin-left: 50px;
    }
    .text{
        margin-left: 25px;
    }
    .pieddepage
    {
    position:absolute;
    bottom:1;
    width:90%;
    background-color:#FFFFFF;
    }

    .piedgauche
    {
        margin-left: 25px;
        float: left;
        width: 75%;
    text-align:left;
    
    }

    .pieddroit
    {
        margin-right: 65px;
    float: right;
    width: 40%;
    text-align: right;
    margin-top: 6px;
    font-size: 13px;
    }
    .submit{
        border-radius: 15px;
        background-color: #1877f2;
        color: white;
        width:275px;
        height:40px;
        border: #1877f2;
    }
    .submit:hover{
        width:285px;
        height:43px;
        background-color: #176ad5;
        border: #176ad5 ;
    }
    .close-button { 
        position: absolute;
        color: #8a8a8a;   
        cursor: pointer;
        border-radius: 10px;
        margin-left: 350px;
        height: 50px;
        width: 50px;
     
}
    
    
    
    </style>
    
    <h1> OmnesBox </h1>
    <h4>
        <div class="container"> <div class="row">
        <div class="col-sm-3" ></div>
        <div class="panel panel-default" style="height:650px; width: 650px; margin-left: 260px;">
         <div class="col-sm-3" style="height:50%;">
            

                <br><br>
                <h2 class="text">Création de compte</h2><br>
                <form action="index.php" method="post">
                <p class="piedgauche"> Nom :</p>
            <br>
            <br>
                <p class="log"> <input type="text" name="Nom" id="Nom"></p>
                <p class="piedgauche"> Identifiant :</p>
            <br>
            <br>    
                <p class="log"> <input type="text" name="login" id="login"></p>
                <p class="piedgauche"> Mot de Passe : </p>
            <br>
            <br>
                <p class="log"><input type="password" name="pwd" id="pwd"></p>
            </div>
            
            <div class="col-sm-3" style="height:50%; margin-left: 120px; margin-top:150px">
            <br>
            <br>
                <p class="piedgauche"> Prénom :</p>
            <br>
            <br>
                <p class="log"> <input type="text" name="Prenom" id="Prenom"></p>
                
                <p class="piedgauche"> Email :</p>
            <br>
            <br>    
                <p class="log"> <input type="Email" name="Email" id="Email"></p></div></div>
            
                
            <br>
            <br>
                <p class="log"><input class="submit"  type="submit" value="Création du compte" ></p>
                
            </form></div>
            <div class="col-sm-4 " ></div>
            <button class="close-button" aria-label="Case de fermeture" type="button"> 
            <span aria-hidden="true">&times;</span> 
            </button> 
  
            </div></div></div></h4>

   <?php
   
    $utilisateurs = array(
        "Test" => "test"
    );
    $Admin = array(
        "Admin" => "123",

    );

    if (isset($_POST["login"], $_POST["pwd"]) && !empty($_POST["login"]) && !empty($_POST["pwd"])) {
        //sécurité contre faille XSS
        $login = htmlspecialchars($_POST["login"]) ;
        $pwd = htmlspecialchars($_POST["pwd"]) ;

        $pwd_found = false ;
        foreach ($utilisateurs as $login_bdd => $pwd_bdd) {
            if ($login == $login_bdd && $pwd == $pwd_bdd) {
                $pwd_found = true ;
            }
        }
        foreach ($Admin as $loginA_bdd => $pwdA_bdd) {
            if ($login == $loginA_bdd && $pwd == $pwdA_bdd) {
                $pwdA_found = true ;
            }
        }
        if($pwd_found == true ) {
         header('Location: http://localhost:8888/index.html');
        }else if($pwdA_found == true ) {
            header('Location: http://localhost:8888/admin.php');
        
        } else
            echo " <p> Login ou mot de passe incorrect </p>";
    }
    ?>

    </body>
</html>