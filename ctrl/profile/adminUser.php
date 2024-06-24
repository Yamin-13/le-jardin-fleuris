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

$dbConnection = getConnection($dbConfig);
$users = getAllUsers($dbConnection);

require $_SERVER['DOCUMENT_ROOT'] . '/view/profile/adminUser.php';

