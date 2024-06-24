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

$idRole = $_SESSION['user']['idRole'];
if ($idRole == 10 || $idRole == 20 ){
    // rend la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/article/add.php';

} else {
    // rend la vue
    header('Location: /ctrl/login/display.php');
}