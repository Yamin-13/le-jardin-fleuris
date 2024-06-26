<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/article.php';

// Connexion à la base de données
$dbConnection = getConnection($dbConfig);

// Récupérer les derniers articles
$latestArticles = getLatestArticles($dbConnection, 5); // 5 c'est le nombre d'articles à récupérer


$titrePage = "Le Jardin Fleuris";


// rend la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/view/article/display.php';
include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php';