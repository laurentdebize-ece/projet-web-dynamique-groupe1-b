<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title> OmnesBox </title>
    <link href="style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="action.js"> </script>

    </head>

    <body>
    <h1> OmnesBox </h1>
    
            <form action="index.php" method="post">
                <label for="login"> Login : </label>
                <input type="text" name="login" id="login">

                <br> <br>

                <label for="pwd"> Mot de Passe : </label>
                <input type="text" name="pwd" id="pwd">
               <br>
                <input  type="submit" value="Connexion">
                
            </form>

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
         header('Location: http://localhost:8888/verif_connexion.php');
        }if($pwdA_found == true ) {
            header('Location: http://localhost:8888/admin.php');
        
        } else
            echo " <p> Login ou mot de passe incorrect </p>";
    }
    ?>

    </body>
</html>