<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/article.php'; 
session_start();

$titrePage = "Le Jardin Fleuris";


// ca récupère l'ID de l'article depuis la requête GET
$articleId = $_GET['id'] ?? null;

if ($articleId) {
    // Ouvre une connexion à la base de données
    $dbConnection = getConnection($dbConfig);
    
    // Récupere les détails de l'article avec l'ID fourni
    $article = getArticleById($articleId, $dbConnection);

    if ($article) {
        // Inclure la vue des détails de l'article
        require $_SERVER['DOCUMENT_ROOT'] . '/view/article/detail.php';
    } else {
        echo "Article pas trouvé.";
    }
} else {
    echo "ID de l'article manquant.";
}

