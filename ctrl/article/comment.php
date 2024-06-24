<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/comment.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: /ctrl/login/login.php');
    exit;
}

// Ouvre une connexion à la base de données
$dbConnection = getConnection($dbConfig);

$action = $_GET['action'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$action) {
    // Ajout d'un commentaire
    $articleId = $_POST['article_id'];
    $userId = $_SESSION['user']['id'];
    $content = $_POST['content'];

    addComment($articleId, $userId, $content, $dbConnection);
    header('Location: /ctrl/article/details.php?id=' . $articleId);
    exit;
} elseif ($action == 'delete') {
    // Suppression d'un commentaire
    $commentId = $_GET['id'];
    $comment = getCommentById($commentId, $dbConnection);

    if ($comment && ($comment['idUser'] == $_SESSION['user']['id'] || $_SESSION['user']['role'] == 'admin')) {
        deleteComment($commentId, $dbConnection);
    }

    header('Location: /ctrl/article/details.php?id=' . $comment['idArticle']);
    exit;
} elseif ($action == 'edit') {
    // Récupération du commentaire pour modification
    $commentId = $_GET['id'];
    $comment = getCommentById($commentId, $dbConnection);

    if ($comment && $comment['idUser'] == $_SESSION['user']['id']) {
        require $_SERVER['DOCUMENT_ROOT'] . '/view/article/edit-comment.php';
    } else {
        echo "Vous n'êtes pas autorisé à modifier ce commentaire.";
    }
} elseif ($action == 'update') {
    // Mise à jour du commentaire
    $commentId = $_POST['comment_id'];
    $content = $_POST['content'];

    $comment = getCommentById($commentId, $dbConnection);

    if ($comment && $comment['idUser'] == $_SESSION['user']['id']) {
        updateComment($commentId, $content, $dbConnection);
    }

    header('Location: /ctrl/article/details.php?id=' . $comment['idArticle']);
    exit;
}

?>
