<?php
session_start(); // ca initialise une session et permet à $_SESSION de fonctionner (de stocker dans les coockies) 

$titrePage = "Login - Le Jardin Fleuri";

// rend la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/login/display.php';