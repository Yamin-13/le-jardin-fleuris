<?php

// Supprime un article

// Lis les informations depuis la requête HTP (id de l'article)
$idArticle = $_GET['id'];

// Ouvre une connexion à la Base de données
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
$dbConnection = getConnection($dbConfig);

// Prépare la requête
$query = 'DELETE';
$query .= ' FROM article';
$query .= ' WHERE article.id = :idArticle';
$statement = $dbConnection->prepare($query);
$statement->bindParam(':idArticle', $idArticle);

// Exécute la requête
$successOrFailure = $statement->execute();



// Redirige vers la liste des Navires
header('Location: ' . '/ctrl/article/list.php');
