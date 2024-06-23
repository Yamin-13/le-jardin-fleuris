<?php
$titrePage = "Le Jardin Fleuris";

// Ouvre une connexion à la BDD
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
$dbConnection = getConnection($dbConfig);
session_start();

// - Prépare la requête
$query = 'SELECT categorie.id, categorie.name';
$query .= ' FROM categorie';
$statement = $dbConnection->prepare($query);
// - Exécute la requête
$successOrFailure = $statement->execute();
$listCategorie = $statement->fetchAll(PDO::FETCH_ASSOC);

// rend la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/article/add.php';