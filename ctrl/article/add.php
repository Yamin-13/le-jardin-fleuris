<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/article.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: /ctrl/login/login.php');
    exit;
}

// Récupère l'ID utilisateur depuis la session
$idUser = $_SESSION['user']['id'] ?? null;
if (!$idUser) {
    die('ID utilisateur manquant dans la session.');
}

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
$article = [
    'name' => htmlspecialchars($_POST['name']),
    'textOfArticle' => htmlspecialchars($_POST['textOfArticle']),
    'date' => date('Y-m-d H:i:s'),
    'idUser' => $idUser,
    'idCategorie' => $_POST['idCategorie']
];

// Vérifie s'il y a une image à uploader
if (isset($_FILES['image_filename']) && $_FILES['image_filename']['error'] === UPLOAD_ERR_OK) {
    $fileTmpName = $_FILES['image_filename']['tmp_name'];
    $fileName = basename($_FILES['image_filename']['name']);
    $uploadPath = $uploadDirectory . $fileName;

    // Déplace le fichier vers le répertoire d'upload
    if (move_uploaded_file($fileTmpName, $uploadPath)) {
        $article['image_filename'] = $fileName;
    } else {
        $_SESSION['msg']['error'][] = 'Erreur lors du téléchargement de l\'image.';
        header('Location: /ctrl/article/add-display.php');
        exit;
    }
} else {
    $article['image_filename'] = 'avatar-defaut.webp'; // image par défaut si aucune image n'est téléchargée
}

// Connexion à la base de données et création de l'article
$dbConnection = getConnection($dbConfig);
$isSuccess = create(
    $article['name'],
    $article['textOfArticle'],
    $article['date'],
    $article['image_filename'],
    $article['idCategorie'],
    $article['idUser'],
    $dbConnection
);

// Redirection en fonction du succès ou de l'échec de l'insertion
if ($isSuccess) {
    header('Location: /ctrl/article/categorieArticle.php');
    exit;
} else {
    die('La création de l\'article a échoué.');
}