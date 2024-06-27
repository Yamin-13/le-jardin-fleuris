<?php
session_start(); // 1) démarre une nouvelle session

// Supprime un article

// Lis les informations depuis la requête HTP (id de l'article)
$idArticle = $_GET['id'];

// Ouvre une connexion à la Base de données
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/article.php';

$dbConnection = getConnection($dbConfig);

// Prépare la requête
$query = 'DELETE';
$query .= ' FROM article';
$query .= ' WHERE article.id = :idArticle';
$statement = $dbConnection->prepare($query);
$statement->bindParam(':idArticle', $idArticle);

// Exécute la requête
$successOrFailure = $statement->execute();

$idArticle = $_GET['id'];
$idArticle = $_GET['idUser'];
$idUser = $_SESSION['user']['id'];
$idRole = $_SESSION['user']['idRole'];


$dbConnection = getConnection($dbConfig);

// Vérifier les autorisations
$article = getArticleById($idArticle, $dbConnection);
if ($article && ($article['idUser'] == $idUser || $idRole == '10')) {
    $query = 'DELETE FROM article WHERE id = :id';
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(':id', $idArticle);
    $statement->execute();
    header('Location: /ctrl/article/list.php');
    exit;
}

// Redirige vers la liste des Navires
header('Location: ' . '/ctrl/article/categorieArticle.php');
