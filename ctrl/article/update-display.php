<?php
session_start();

// Modifie un article > Affiche le formulaire

// Définit les clés de dictionnaire de la page
$pageTitle = 'Modifier un Article';

// Lis les informations depuis la requête HTTP
$idArticle = $_GET['id'];

// - Ouvre une connexion à la BDD
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
$dbConnection = getConnection($dbConfig);

// Charge l'article à modifier
$query = '';
$query .= ' SELECT article.id, article.name, article.idUser, article.textOfArticle, article.idCategorie, article.image_filename';
$query .= ' FROM article';
$query .= ' WHERE article.id = :idArticle';
$statement = $dbConnection->prepare($query);
$statement->bindParam(':idArticle', $idArticle);
$successOrFailure = $statement->execute();
$article = $statement->fetch(PDO::FETCH_ASSOC);

// Charge la liste des Types de article
$query = 'SELECT categorie.id, categorie.name';
$query .= ' FROM categorie';
$statement = $dbConnection->prepare($query);
$successOrFailure = $statement->execute();
$listCategorie = $statement->fetchAll(PDO::FETCH_ASSOC);

// Rends la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/article/update.php';
