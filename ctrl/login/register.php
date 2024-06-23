<?php
include $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';
session_start();

$_SESSION['msg']['info'] = [];
$_SESSION['msg']['error'] = [];

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

// Lis les informations saisies dans le formulaire
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileTmpName  = $_FILES['file']['tmp_name'];
$fileType = $_FILES['file']['type'];

const MY_IMG_PNG = 'image/png';
const MY_IMG_JPG = 'image/jpeg';
const LIST_ACCEPTED_FILE_TYPE = [MY_IMG_PNG, MY_IMG_JPG];
const FILE_MAX_SIZE = 10;

// récupére les informations du formulaire...
$email = $_POST['email'];
$password = $_POST['password'];

// ...et hache le mot de passe
$hashedPassword = password_hash($password, PASSWORD_BCRYPT); // PASSWORD_BCRYPT ca utilise l'algorithme Blowfish qui est plus sécurisé (survole de la documentation...)

// var_dump($password); // Mp en clair
// var_dump($hashedPassword); // Mp haché

$idRole = 20; // ca donne un role pour les nouveaux utilisateurs (sampleUser)



// se connecte à la base de données
$dbConnection = getConnection($dbConfig);

// Effectue différents tests sur les données saisies
$isSupportedFileType = in_array($fileType, LIST_ACCEPTED_FILE_TYPE);
if (!$isSupportedFileType) {

    // Ajoute un flash-message
    $_SESSION['msg']['error'][] = 'Les seuls formats de fichier acceptés sont : ' . implode(',', LIST_ACCEPTED_FILE_TYPE);
}
if (true) {
    //...filesize
}

$hasErrors = !empty($_SESSION['msg']['error']);
if ($hasErrors) {

    // Redirige vers le formulaire pour corrections
    header('Location: ' . '/ctrl/login/display.php');
    exit();
}

// Redimensionne l'image
// WARN! sudo apt install php-gd
$imgOriginal;
if ($fileType == MY_IMG_PNG) {
    $imgOriginal = imagecreatefrompng($fileTmpName);
}
if ($fileType == MY_IMG_JPG) {
    $imgOriginal = imagecreatefromjpeg($fileTmpName);
}
$img = imagescale($imgOriginal, 200);
imagepng($img, $fileTmpName);

// Copie aussi le fichier d'avatar dans un répertoire
$uploadPath = $uploadDirectory . basename($fileName);
$didUpload = move_uploaded_file($fileTmpName, $uploadPath);

// Fonction pour ajouter un utilisateur à la bases de données
function addUser($email, $password, $idRole, $db, $fileName)
{
    $query = 'INSERT INTO user ( email, password, idRole, avatar_filename) VALUES ( :email, :password, :idRole, :avatar_filename)'; // requete SQL avec les parametres pour insérer un nouvel utilisateur dans la table...
    $statement = $db->prepare($query);   // prepare la requete SQL ele retourne un objet PDOstatement                               // ...user avec les 3 collones 

    $statement->bindParam(':idRole', $idRole);       //  <----------------------------- // ca lie la valeeur de $idRole au parametre ":idRole" dans la requête SQL ($idRole = :idRole ) 
    $statement->bindParam(':email', $email);        // methode PDOStatement::bindParam // (sécurisé)
    $statement->bindParam(':password', $password); //                                 //
    $statement->bindParam(':avatar_filename', basename($fileName), PDO::PARAM_STR);
    
    return $statement->execute();  // PDOStatement::execute (ca execute les requetes et retourne true ou false pour l'insert to) 

}
// condition pour affiché les messages de succès ou d'échec
if (addUser($email, $hashedPassword, $idRole, $dbConnection, $fileName)) {  // Apel de la fonction addUser avec les 4 arguments  
    $_SESSION['success'] = 'Inscription réussie.<br>Vous pouvez maintenant vous connecter.'; // le message sera stocké dans la variable de session "succes" 
    header('Location: /ctrl/login/display.php');
    exit(); // ca arrete l'execution du script ici
} else {
    $_SESSION['error'] = 'Erreur lors de l\'inscription.<br> Veuillez réessayer.';
    header('Location: /ctrl/login/display.php');
    exit();
}



