<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Le Blog de Fleur qui nous transporte dans un jardin fleuri.">
    <link rel="icon" type="image/x-icon" href="/asset/img/fleur.png">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title><?= $titrePage ?></title>
</head>
<?php
// Vérifie si l'utilisateur est authentifié en verifiant si y'a $_SESSION['user']
$isLoggedIn = isset($_SESSION['user']); ?>

<header>
    <a class="h1Link" href="/ctrl/article/display.php">
        <h1>Le Jardin Fleuri</h1>
    </a>
    <nav>
        <ul>
            <li><a href="/ctrl/article/display.php">Accueil</a></li>
            <li><a href="/ctrl/article/categorieArticle.php">Nos Articles</a></li>
            <li><a href="/ctrl/login/welcome.php">Nos Galeries</a></li>
        </ul>
    </nav>
    <?php if ($isLoggedIn) : ?>
        <div class="helloUserParent">
            <p id="helloUser">Bonjour, <?= ($_SESSION['user']['name']) ?> </p>
            <a href="/ctrl/profile/profile.php" class="imageAvatar">
                <p><img class="imageAvatar" src="/upload/<?= $_SESSION['user']['avatar_filename'] ?>" /></p>
            </a>
        </div>
        <a href="/ctrl/login/logout.php" class="profile-icon"><img src="/asset/img/flowerYelow-removebg-preview.png" alt="Profile Icon"></a>
    <?php else : ?>
        <a href="/ctrl/login/login.php" class="profile-icon"><img src="/asset/img/loginFlower.png" alt="Login Icon"></a>
    <?php endif; ?> <!-- endif améliore la visibilité quand le php est mélangé à l'html -->

</header>