<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';

$_SESSION['msg']['info'] = [];
$_SESSION['msg']['error'] = [];
$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$idRole = 30;

// Vérifie si un fichier a été uploadé
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileName = basename($_FILES['file']['name']);
    $uploadPath = $uploadDirectory . $fileName;

    // Déplace le fichier vers le dossier d'upload
    if (!move_uploaded_file($fileTmpName, $uploadPath)) {
        $_SESSION['msg']['error'][] = 'Erreur lors du téléchargement de l\'avatar.';
        header('Location: /ctrl/login/display.php');
        exit;
    }
} else {
    $fileName = 'avatar-defaut.webp'; // Utilise un avatar par défaut si aucun fichier n'est téléchargé
}

// Connexion à la base de données
$dbConnection = getConnection($dbConfig);

if (addUser($name, $email, $hashedPassword, $idRole, $dbConnection, $fileName)) {
    $_SESSION['success'] = 'Inscription réussie.<br>Vous pouvez maintenant vous connecter.';
    header('Location: /ctrl/login/display.php');
    exit;
} else {
    $_SESSION['error'] = 'Erreur lors de l\'inscription.<br> Veuillez réessayer.';
    header('Location: /ctrl/login/display.php');
    exit();
}
