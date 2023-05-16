

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
    color: #c7d6ec ;
    font-weight: bold;
}

nav a:hover {
    background-color: rgba(92, 158, 224, 0.1);
    color: rgb(38, 93, 155) !important;
}

</style>

<nav class="navbar navbar-expand-lg bg-dark">
    <a class="navbar-brand" href="../index.php">
        <img src="../Images/logo_admin.jpg" width="150" height="40" alt="Autre Logo" class="navbar-brand-img">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ajouter_cartes.php" onclick="notLoggedIn()">Cartes Cadeaux</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ajouter_partenaire.php" onclick="notLoggedIn()">Partenaires</a>
            </li>
        </ul>
    </div>
</nav>