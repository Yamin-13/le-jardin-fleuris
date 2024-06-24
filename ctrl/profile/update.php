<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';

$idUser = $_SESSION['user']['id'];
$newName = $_POST['name'];
$newEmail = $_POST['email'];
$avatarFilename = $_SESSION['user']['avatar_filename'];

// Traitement de l'upload du nouvel avatar
if (!empty($_FILES['avatar']['name'])) {
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
    $avatarFilename = basename($_FILES['avatar']['name']);
    $uploadPath = $uploadDirectory . $avatarFilename;

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadPath)) {
        die('Erreur lors de l\'upload de l\'avatar.');
    }
}

// Mise à jour de l'utilisateur dans la base de données
$dbConnection = getConnection($dbConfig);
updateUserProfile($newName ,$idUser, $newEmail, $avatarFilename, $dbConnection);

// Mise à jour des informations de session
$_SESSION['user']['name'] = $newName;
$_SESSION['user']['email'] = $newEmail;
$_SESSION['user']['avatar_filename'] = $avatarFilename;

header('Location: /ctrl/profile/profile.php');
exit;
