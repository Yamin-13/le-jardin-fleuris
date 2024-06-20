<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/article.php'; 

$titrePage = "Le Jardin Fleuris";

// ca récupère l'ID de l'article depuis la requête GET
$articleId = $_GET['id'] ?? null;

if ($articleId) {
    $dbConnection = getConnection($dbConfig);
    // ca assure que getArticleById est mise à jour pour inclur la jointure avec la table categorie
    $article = getArticleById($articleId, $dbConnection);

    if ($article) {
        require $_SERVER['DOCUMENT_ROOT'] . '/view/article/detail.php';
    } else {
        echo "Article pas trouvé.";
    }
} else {
    echo "ID de l'article manquant.";
}

