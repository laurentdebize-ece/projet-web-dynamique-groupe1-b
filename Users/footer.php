
<link href="../CSS/footer.css" rel="stylesheet" type="text/css" media="all" />

<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Newsletter</h4>
                    <p>Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles et offres spéciales.</p>
                    <form onsubmit="return showThankYouMessage()">
                        <input type="email" class="newsletter-input" id="email" placeholder="Entrez votre adresse e-mail" required>
                        <button type="submit" class="btn btn-newsletter">S'inscrire</button>
                    </form>
                    <div id="thank-you-message" style="display:none;">
                        <h2>Merci de vous être inscrit !</h2>
                        <p>Un e-mail de confirmation a été envoyé à votre adresse. Veuillez le vérifier pour compléter
                            votre inscription.</p>
                    </div>
                </div>
                <div id="thank-you-message" style="display:none;">
                    <h2>Merci de vous être inscrit !</h2>
                    <p>Un e-mail de confirmation a été envoyé à votre adresse. Veuillez le vérifier pour compléter votre
                        inscription.</p>
                </div>
                <script src="newsletter.js"></script>
                <div class="col-md-4">
                    <h4>Liens utiles</h4>
                    <ul class="useful-links">
                        <li><a href="contact.php">Contactez-nous</a></li>
                        <li><a href="mentions_legales.php">Mentions légales</a></li>
                        <li><a href="mentions_legales.html">Politique de confidentialité</a></li>
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