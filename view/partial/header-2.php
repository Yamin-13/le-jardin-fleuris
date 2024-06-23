<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/style.css">
    <title><?= $titrePage ?></title>
</head>

<body>

    <?php
    // Vérifie si l'utilisateur est authentifié
    $isLoggedIn = isset($_SESSION['user']); ?>

    <header>
        <h1>Le Jardin Fleuris</h1>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="/ctrl/login/welcome.php">Welcome</a></li>
                <li><a href="/ctrl/nosProduits.php">Nos Produits</a></li>


                <?php if ($isLoggedIn && $_SESSION['user']['idRole'] == '10') : ?> <!-- cache le lien Nos secret si l'utilisateur n'a pas le role admin -->
                    <li><a href="/ctrl/login/secret.php">Secrets</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php if ($isLoggedIn) : ?>
            <div class="helloUserParent">
                <p id="helloUser">Bonjour, <?= ($_SESSION['user']['email']) ?> </p>
                <a href="/ctrl/profile/profile.php" class="imageAvatar">
                    <p><img class="imageAvatar"  src="/upload/<?= $_SESSION['user']['avatar_filename'] ?>" /></p>
                </a><!---avatar  -->
            </div>

            <a href="/ctrl/login/logout.php" class="profile-icon"><img src="/asset/img/flowerYelow-removebg-preview.png" alt="Profile Icon"></a>
        <?php else : ?>
            <a href="/ctrl/login/login.php" class="profile-icon"><img src="/asset/img/loginFlower.png" alt="Login Icon"></a>
        <?php endif; ?>
    </header>