<link href="../CSS/footer.css" rel="stylesheet" type="text/css" media="all" />
<?php include("verif_connexion_bdd.php") ?>


<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$newsletter = '' ;

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    //sécurité contre faille XSS
    $Email = test_input($_POST["email"]);

    $emailExist = false;

    $verify = "SELECT email FROM newsletter";
    $request = mysqli_query($bdd, $verify);
    while ($email_bdd = mysqli_fetch_assoc($request)) {
        if (!strcasecmp($Email, $email_bdd['email'])) {
            $emailExist = true;
        }
    }

    if ($emailExist) {
        $newsletter = '<h5>Cet email existe déjà ! Veuillez en rentrer un nouveau</h5>';

    } else {
        $add = "INSERT INTO newsletter
                    VALUES (NULL, '$Email')";
        if (mysqli_query($bdd, $add)) {
            $newsletter = '<h3>Merci de vous êtes inscrit !</h3>
                            Un email de confirmation a été envoyé à votre adresse.' ;
            
        }
    }
    $_POST = array() ;
} 
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Newsletter</h4>
                <p>Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles et offres spéciales.</p>


                <form method="post">
                    <input type="email" class="newsletter-input" name="email" id="email" placeholder="Entrez votre adresse e-mail" required>
                    <input class="submit btn btn-newsletter" type="submit" value="S'inscrire">
                </form>

                
                <div>
                    <?php echo "<br>" . $newsletter ; ?>
                </div>
                
            </div>
            <div class="col-md-4">
                <h4>Liens utiles</h4>
                <ul class="useful-links">
                    <li><a href="contact.php">Contactez-nous</a></li>
                    <li><a href="mentions_legales.php">Mentions légales</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Suivez-nous</h4>

                <a href="https://www.instagram.com" target="_blank">
                    <img src="../Images/insta.png" alt="Logo 1" width="35" height="35">
                </a>
                <a href="https://www.twitter.com" target="_blank">
                    <img src="../Images/twitter_png.png" alt="Logo 2" width="35" height="35">
                </a>
                <a href="https://www.linkedin.com" target="_blank">
                    <img src="../Images/logo_linkedin.png" alt="Logo 2" width="35" height="35">
                </a>
            </div>
        </div>
    </div>
</footer>