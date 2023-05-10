<style>


.deconnexion {

border-radius: 15px;

color: white;
font-family: Arial, Helvetica, sans-serif;
font-size: 15x;
font-weight: bold;

}

.deconnexion:hover {


border: #176ad5;
color:white;    
}
</style>

<?php include("verif_session.php") ?>

<script>
    function deconnexion() {
        $_SESSION['connected'] = false ;
        unset($_SESSION['id']) ;
        unset($_SESSION['nom']) ;
        unset($_SESSION['prenom']) ;
        unset($_SESSION['email']) ;
    }
</script>

<nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php.php">
            <img src="Image/logo_omnesBox.png" alt="Logo" class="navbar-brand-img">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown" >
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="cartes_cadeau.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cartes cadeau
                </a>
                
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <div class="dropdown-header">Par montant</div>
                    <a class="dropdown-item" href="cartes_cadeau.php">25€</a>
                    <a class="dropdown-item" href="cartes_cadeau.php">50€</a>
                    <a class="dropdown-item" href="cartes_cadeau.php">100€</a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-header">Par activité</div>
                    <a class="dropdown-item" href="cartes_cadeau.php">Restaurant</a>
                    <a class="dropdown-item" href="cartes_cadeau.php">Spa</a>
                    <a class="dropdown-item" href="cartes_cadeau.php">Aventure</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="panier.php">Panier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link omnes-box" href="omnes_box.php">OmnesBox</a>
            </li>
        </ul>
        
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <?php 
                if($_SESSION['connected']){
                    echo '<a type="button" class="nav-link" Onclick="deconnexion()">Déconnexion</a>';
                }
                ?> 
                </li>
        <li class="nav-item">
                <?php 
                if(!$_SESSION['connected']){
                    echo '<a class="nav-link" href="connexion.php">Connexion</a>' ;
                }
                else {
                    echo '<a class="nav-link" href="mon_compte.php">Mon Compte</a>' ;
                }
                ?>
            </li>
        </ul>
                
    </div>
</nav>