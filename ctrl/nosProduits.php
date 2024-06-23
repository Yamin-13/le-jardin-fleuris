<?php
session_start();
$titrePage = "Fleur De Dahlia";

// isset vérifie si la variable est null...
if (!isset($_SESSION['user'])) {
    // ...pour rediriger vers display.php
    header('Location: /ctrl/login/display.php');
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header-2.php';
include $_SERVER['DOCUMENT_ROOT'] . '/view/nosProduits.php';
// include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php';