<?php
// Vérifie si l'utilisateur est authentifié
$isLoggedIn = isset($_SESSION['user']); ?>

<header>
    <h1>Le Jardin Fleuris</h1>
    <nav>
        <ul>
            <li><a href="/ctrl/article/display.php">Accueil</a></li>
            <li><a href="/ctrl/login/welcome.php">Welcome</a></li>
            <li><a class="header_link" href="/ctrl/article/list.php">liste des articles</a></li>
            <li><a class="header_link" href="/ctrl/article/add-display.php">Ajouter des articles</a></li>


            <?php if ($isLoggedIn && $_SESSION['user']['idRole'] == '10') : ?> <!-- cache le lien Nos secret si l'utilisateur n'a pas le role admin -->
                <li><a href="/ctrl/login/secret.php">Secrets</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <?php if ($isLoggedIn) : ?>
        <div class="helloUserParent">
            <p id="helloUser">Bonjour, <?= ($_SESSION['user']['email']) ?> </p>
            <a href="/ctrl/profile/profile.php" class="imageAvatar"> <img src="" alt="profile" /></a><!---avatar  -->
        </div>

        <a href="/ctrl/login/logout.php" class="profile-icon"><img src="/asset/img/flowerYelow-removebg-preview.png" alt="Profile Icon"></a>
    <?php else : ?>
        <a href="/ctrl/login/login.php" class="profile-icon"><img src="/asset/img/loginFlower.png" alt="Login Icon"></a>
    <?php endif; ?>
</header>