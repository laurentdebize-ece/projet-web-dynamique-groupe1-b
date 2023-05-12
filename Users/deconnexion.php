<?php
session_start();

// Déconnexion de l'utilisateur
$_SESSION = array();
session_destroy();

// Redirection vers la page d'accueil
header('Location: accueil.php');
exit;
?>
