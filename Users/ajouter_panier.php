<?php
//inclure la page de connexion
include('verif_connexion_bdd.php');
//verifier si une session existe
if (!isset($_SESSION)) {
    //si non demarer la session
    session_start();
}
//creer la session
if (!isset($_SESSION['panier'])) {
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['panier'] = array();
}
//récupération de l'id dans le lien
if (isset($_POST['id'], $_POST['prix'])) { //si un id a été envoyé alors :
    $id = $_POST['id'];
    $prix = $_POST['prix'] ;
    //verifier grace a l'id si le produit existe dans la base de  données
    $produit = mysqli_query($bdd, "SELECT * FROM cartes WHERE idActivite = $id AND prix = $prix");
    if (empty(mysqli_fetch_assoc($produit))) {
        //si ce produit n'existe pas
        die("Ce produit n'existe pas");
    }
    //ajouter le produit dans le panier ( Le tableau)
    
    if (isset($_SESSION['panier'][$id])) { // si le produit est déjà dans le panier
        $_SESSION['panier'][$id]++; //Représente la quantité 
    } else {
        //si non on ajoute le produit
        $_SESSION['panier'][$id] = 1;
    }

    //redirection vers la page index.php
    header("Location:cartes_cadeau.php");
}
