<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/article.php';

// Ajoute un Article

// Lis les informations depuis la requête HTTP
$article = [];
$article['name'] = $_POST['name'];
$article['textOfArticle'] = $_POST['textOfArticle'];
$article['image_filename'] = $_POST['image_filename'];
$article['date'] = date('Y-m-d H:i:s'); 
$article['idUser'] = $_POST['idUser'];
$article['idCategorie'] = $_POST['idCategorie'];


// Ouvre une connexion à la Base de données
$dbConnection = getConnection($dbConfig);
$isSuccess = create($article['name'], $article['textOfArticle'], $article['date'], $article['image_filename'], $article['idCategorie'], $article['idUser'], $dbConnection);

// Redirige vers la liste des Articles
header('Location: ' . '/ctrl/article/list.php');
