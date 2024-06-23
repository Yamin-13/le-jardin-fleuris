<?php
session_start();
$titrePage = "Fleur De Dahlia";

// var_dump($_SESSION['user']);
// =========================================================
$idRole = $_SESSION['user']['idRole'];
if ($idRole == 10){
    include $_SERVER['DOCUMENT_ROOT'] . '/view/login/secret.php';

} else {
    // rend la vue
    header('Location: /ctrl/login/display.php');
}



