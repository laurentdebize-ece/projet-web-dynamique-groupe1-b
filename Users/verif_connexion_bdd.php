<?php

$database = 'omnes_box';
$bdd = mysqli_connect('localhost', 'root', 'root', $database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

?>