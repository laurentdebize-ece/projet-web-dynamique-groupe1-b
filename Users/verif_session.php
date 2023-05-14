<?php

session_start();
if (!isset($_SESSION["connected"])) {
    $_SESSION["connected"] = false;
}
if (!isset($_SESSION['connectedPartenaire'])) {
    $_SESSION["connectedPartenaire"] = false;
}
?>

