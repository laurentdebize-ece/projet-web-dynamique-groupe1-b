<?php

$DB_DSN = 'mysql:host=localhost;dbname=omnes_box; charset=utf8';
$DB_USER = 'root';
$DB_PASS = 'root';

try
{
    $db = new PDO($DB_DSN, $DB_USER, $DB_PASS);
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$omnesbox = $_POST['omnesbox'];

$query = "SELECT * FROM cartes WHERE idCarte = :omnesbox";
$stmt = $db->prepare($query);
$stmt->bindParam(':omnesbox', $omnesbox);
$stmt->execute();

// Vérifier si la clé existe dans la base de données
if ($stmt->rowCount() > 0) {
    // Si la clé existe, afficher un message de succès
    echo "Félicitations, votre clé est valide !";
} else {
    // Si la clé n'existe pas, afficher un message d'erreur
    echo "Désolé, votre clé est invalide.";
}

?>

