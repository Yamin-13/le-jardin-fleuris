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

// Récupère l'ID utilisateur à partir de la session
$idUser = $_SESSION['user']['id'] ?? null;

if (!$idUser) {
    die('ID utilisateur manquant dans la session.');
}

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

// Lis les informations depuis la requête HTTP
$article = [];
$article['name'] = $_POST['name'] ;
$article['textOfArticle'] = $_POST['textOfArticle'] ;
$article['image_filename'] = $_FILES['image_filename']['name'] ;
$article['date'] = date('Y-m-d H:i:s'); 
$article['idUser'] = $idUser;
$article['idCategorie'] = $_POST['idCategorie'] ;

// Vérifie les erreurs d'upload
if ($_FILES['image_filename']['error'] !== UPLOAD_ERR_OK) {
    die('Erreur lors de l\'upload du fichier : ' . $_FILES['image_filename']['error']);
}

// Lis les informations saisies dans le formulaire
$fileName = $_FILES['image_filename']['name'];
$fileSize = $_FILES['image_filename']['size'];
$fileTmpName  = $_FILES['image_filename']['tmp_name'];
$fileType = $_FILES['image_filename']['type'];

const MY_IMG_PNG = 'image/png';
const MY_IMG_JPG = 'image/jpeg';
const LIST_ACCEPTED_FILE_TYPE = [MY_IMG_PNG, MY_IMG_JPG];
const FILE_MAX_SIZE = 10485760; // 10 MB en octets

// Effectue différents tests sur les données saisies
$isSupportedFileType = in_array($fileType, LIST_ACCEPTED_FILE_TYPE);
if (!$isSupportedFileType) {
    $_SESSION['msg']['error'][] = 'Les seuls formats de fichier acceptés sont : ' . implode(',', LIST_ACCEPTED_FILE_TYPE);
}

if ($fileSize > FILE_MAX_SIZE) {
    $_SESSION['msg']['error'][] = 'Le fichier est trop grand. Taille maximale: ' . (FILE_MAX_SIZE / 1048576) . ' MB';
}

$hasErrors = !empty($_SESSION['msg']['error']);
if ($hasErrors) {
    header('Location: ' . '/ctrl/article/add-display.php');
    exit();
}

// Redimensionne l'image
$imgOriginal;
if ($fileType == MY_IMG_PNG) {
    $imgOriginal = imagecreatefrompng($fileTmpName);
}
if ($fileType == MY_IMG_JPG) {
    $imgOriginal = imagecreatefromjpeg($fileTmpName);
}
$img = imagescale($imgOriginal, 200);
imagepng($img, $fileTmpName);

// Copie aussi le fichier d'image dans un répertoire
$uploadPath = $uploadDirectory . basename($fileName);
$didUpload = move_uploaded_file($fileTmpName, $uploadPath);

if (!$didUpload) {
    die('Échec de l\'upload du fichier.');
}

// Ouvre une connexion à la Base de données
$dbConnection = getConnection($dbConfig);
$isSuccess = create($article['name'], $article['textOfArticle'], $article['date'], $article['image_filename'], $article['idCategorie'], $article['idUser'], $dbConnection);

if ($isSuccess) {
    header('Location: /ctrl/article/categorieArticle.php');
    exit;
} else {
    die('La création de l\'article a échoué.');
}

