<?php
// - Ouvre une connexion à la Base de données
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
$dbConnection = getConnection($dbConfig);

session_start();

// Modifier un article > Traite la soumission du formulaire

// Lis les informations depuis la requête HTTP
$article = [];
$article['id'] = $_POST['id'];
$article['name'] = $_POST['name'];
$article['textOfArticle'] = $_POST['textOfArticle'];
$article['image_filename'] = $_FILES['image_filename']['name'] ?? null; 
$article['date'] = date('Y-m-d H:i:s'); 
$article['idUser'] = $_SESSION['user']['id'] ?? null; 
$article['idCategorie'] = $_POST['idCategorie'];

// - Prépare la requête
$query = '';
$query .= ' UPDATE article';
$query .= ' SET';
// $query .= ' ,article.id = :id';
$query .= ' article.name = :name';
$query .= ' ,article.textOfArticle = :textOfArticle';
$query .= ' ,article.textOfArticle = :textOfArticle';
$query .= ' ,article.idUser = :idUser';
$query .= ' ,article.idCategorie = :idCategorie';
$query .= ' WHERE article.id = :idArticle';
$statement = $dbConnection->prepare($query);
$statement->bindParam(':name', $article['name']);
$statement->bindParam(':textOfArticle', $article['textOfArticle']);
$statement->bindParam(':image_filename', $article['image_filename']);
$statement->bindParam(':idCategorie', $article['idCategorie']);
$statement->bindParam(':idUser', $article['idUser']);
$statement->bindParam(':idArticle', $article['id']);

// Vérifie si l'utilisateur existe
$query = 'SELECT id FROM user WHERE id = :idUser';
$statement = $dbConnection->prepare($query);
$statement->bindParam(':idUser', $article['idUser']);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die('Utilisateur non trouvé.');
}

// requête de mise à jour
$query = 'UPDATE article SET name = :name, textOfArticle = :textOfArticle, image_filename = :image_filename, idCategorie = :idCategorie, idUser = :idUser WHERE id = :idArticle';
$statement = $dbConnection->prepare($query);
$statement->bindParam(':name', $article['name']);
$statement->bindParam(':textOfArticle', $article['textOfArticle']);
$statement->bindParam(':image_filename', $article['image_filename']);
$statement->bindParam(':idCategorie', $article['idCategorie']);
$statement->bindParam(':idUser', $article['idUser']);
$statement->bindParam(':idArticle', $article['id']);

// - Exécute la requête et vérifie si elle a réussi
if ($statement->execute()) {
    header('Location: /ctrl/article/details.php?id=' . $article['id']);
    exit;
} else {
    die('La mise à jour a échoué : ' . $statement->errorInfo()[2]);
}

header('Location: ' . '/ctrl/article/details.php');
