
<?php include("verif_session.php") ?>


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


<nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="accueil.php">
            <img src="Image/logo_omnesBox.png" alt="Logo" class="navbar-brand-img">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown" >
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="accueil.php">Accueil</a>
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
                // vérifier si l'utilisateur est connecté
                if(isset($_SESSION['connected']) && $_SESSION['connected']){
                    echo '<a class="nav-link" href="deconnexion.php">Déconnexion</a>';
                }
            ?>
            
                </li>
        <li class="nav-item">
            <?php
                if(isset($_SESSION['connected']) && $_SESSION['connected']){
                    if ($_SESSION['connected'] && $_SERVER['REQUEST_URI']  !=  "/projet-web-dynamique-groupe1-b/Users/mon_compte.php") {
                        echo '<a class="nav-link" href="mon_compte.php">Mon Compte</a>';
                    }                }
                else {
                    echo '<a class="nav-link" href="connexion.php">Connexion</a>' ;
                }
            ?>
            </li>
        </ul>   
    </div>
</nav>