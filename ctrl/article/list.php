<?php
// Liste les Articles

// Ouvre une connexion à la BDD
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/article.php';
$dbConnection = getConnection($dbConfig);

session_start();
$pageTitle = 'Liste des Articles';

// Prépare la requête
$query = 'SELECT article.id, article.name, article.image_filename, article.date, article.textOfArticle ';
$query .= ' FROM article';
$statement = $dbConnection->prepare($query);

// Exécute la requête
$successOrFailure = $statement->execute();
$listArticle = $statement->fetchAll(PDO::FETCH_ASSOC);

// Rends la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/Article/list.php';