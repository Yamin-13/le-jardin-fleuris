<?php
session_start();

$titrePage = "Le Jardin Fleuris";


// rend la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/article/display.php';