<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';

// Vérifie si l'utilisateur est connecté et s'il est administrateur
if (!isset($_SESSION['user']) || $_SESSION['user']['idRole'] != '10') {
    header('Location: /ctrl/login/login.php');
    exit;
}

$idUser = $_GET['id'];

// Supprimer l'utilisateur de la base de données
$dbConnection = getConnection($dbConfig);
$query = 'DELETE FROM user WHERE id = :id';
$statement = $dbConnection->prepare($query);
$statement->bindParam(':id', $idUser);
$statement->execute();

header('Location: /ctrl/profile/adminUser.php');
exit;
