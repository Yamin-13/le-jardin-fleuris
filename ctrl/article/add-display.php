<?php

// Définit les clés de dictionnaire de la page
$pageTitle = 'Ajouter un article';

// Liste les Navires disponibles
// - Ouvre une connexion à la Base de données

// Ouvre une connexion à la BDD
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
$dbConnection = getConnection($dbConfig);

// - Prépare la requête
// $query = 'SELECT typeNavire.id, typeNavire.name';
// $query .= ' FROM typeNavire';
// $statement = $dbConnection->prepare($query);
// - Exécute la requête
// $successOrFailure = $statement->execute();
// $listTypeNavire = $statement->fetchAll(PDO::FETCH_ASSOC);

// Rends la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/navire/add.php';
