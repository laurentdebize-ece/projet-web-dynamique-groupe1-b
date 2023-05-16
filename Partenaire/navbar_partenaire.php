
<style> 
nav {
    display: flex;
    justify-content: center;
    background-color: #f0cb64;
}

nav a {
    text-decoration: none;
    padding: 14px 20px;
    display: block;
    color: white  ;
    font-weight: bold;
    
}

nav li:hover {
    color: white  ;
    text-decoration: underline;   
}

</style>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="../index.php">
        <img src="../Images/logo_pro.png" width="150" height="40" alt="Autre Logo" class="navbar-brand-img">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Accueil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Formules</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Statistiques</a>
            </li>
        </ul>
    </div>
</nav>