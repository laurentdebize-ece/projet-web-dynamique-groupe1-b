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
        text-align:center ;
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
        width: 30%;
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
    
    <img src="logo_omnesBox.png" alt="Logo">
    <h4>
        <div class="container"> <div class="row">
        <div class="col-sm-4" ></div>
         <div class="col-sm-4" style="height:50%;">
            <div class="panel panel-default" style="height:500px;">

                <br><br>
                <h2 class="text">Login</h2><br>
                <form action="index.php" method="post">
                <div class="pieddepage">
                <p class="piedgauche"> Email :</p><a  href="CreationCompte.php"class="pieddroit">Créer un compte</a>
            </div>
            <br>
            <br>    
                <p class="log"> <input type="Email" name="login" id="login"></p>

                <br> <br>
                <div class="pieddepage">
                <p class="text"> Mot de Passe : </p></div>
                <br><br>
                <p class="log"><input type="password" name="pwd" id="pwd"></p>
                <br></br>
                <p class="log"><input class="submit"  type="submit" value="Connexion" ></p>
                
            </form></div>
            </div><div class="col-sm-4 " >
            <button onclick="window.location.href = 'index.html';" class="close-button" aria-label="Case de fermeture" type="button"> 
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