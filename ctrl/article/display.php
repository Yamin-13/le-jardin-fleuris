<?php
session_start(); // 1) démarre une nouvelle session
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php'; // 2) Inclut le fichier de fonctions pour la base de données
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/article.php'; // 3) Inclut le fichier de fonctions pour les articles

// Connexion à la base de données
$dbConnection = getConnection($dbConfig); // 4) ca ppelle la fonction getConnection() avec la configuration de la base de données pour établir une connexion

// Récupérer les derniers articles
$latestArticles = getLatestArticles($dbConnection, 5); // 5) ca appelle la fonction getLatestArticles() pour récupérer les 5 derniers articles à partir de la base de données


$titrePage = "Le Jardin Fleuris";


// rend la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/view/article/display.php';
include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php';