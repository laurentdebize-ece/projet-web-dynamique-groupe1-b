<link rel="stylesheet" href="../CSS/accueil.css">
<style>
    nav {
        display: flex;
        justify-content: center;
        background-color: white;
    }

    nav a {
        text-decoration: none;
        padding: 14px 20px;
        display: block;
        color: black !important;
        font-weight: bold;
    }

    nav a:hover {
        background-color: rgba(92, 158, 224, 0.1);
        color: rgb(38, 93, 155) !important;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="accueil.php">
        <img src="../Images/logo_omnesBox.png" alt="Logo" width="150" height="40" class="navbar-brand-img">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="accueil.php">Accueil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="cartes_cadeau.php">
                    Cartes cadeau
                </a>

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
                if (isset($_SESSION['connected']) && $_SESSION['connected']) {
                    echo '<a class="nav-link" href="deconnexion.php">Déconnexion</a>';
                }
                ?>

            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['connected']) && $_SESSION['connected']) {
                    if ($_SESSION['connected'] && $_SERVER['REQUEST_URI']  !=  "/projet-web-dynamique-groupe1-b/Users/mon_compte.php") {
                        if ($_SESSION['type'] != 1) {
                            echo '<a class="nav-link" href="mon_compte.php">Mon Compte</a>';
                        } else if ($_SESSION['type'] == 1) {
                            echo '<a class="nav-link" href="../Admin/accueil_admin.php">Administrateur</a>';
                        }
                    }
                } else if (!$_SESSION['connectedPartenaire']) {
                    echo '<a class="nav-link" href="connexion.php">Connexion</a>';
                }
                ?>
            </li>
        </ul>
    </div>
</nav>