<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Profil de l'utilisateur</title>
</head>
<body>
    <main class="profile-container">
        <section class="profile-avatar">
            <h3 class="avatar-title">Profil de <?= $_SESSION['user']['name'] ?></h3>
            <p><img class="avatar-image" src="/upload/<?= $_SESSION['user']['avatar_filename'] ?>" alt="Avatar de l'utilisateur"></p>
        </section>
        <section class="profile-info">
            <h2>Informations du profil</h2>
            <p><strong>Email :</strong> <?= ($_SESSION['user']['email']) ?></p>
            <p><strong>Nom :</strong> <?= ($_SESSION['user']['name']) ?></p>
        </section>
        <section class="profile-update">
            <h2>Mettre à jour le profil</h2>
            <form action="/ctrl/profile/update.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="email">Nouvel Email :</label>
                    <input type="text" id="email" name="email" value="<?= ($_SESSION['user']['email']) ?>">
                </div>
                <div>
                    <label for="name">Nouveau Nom :</label>
                    <input type="text" id="name" name="name" value="<?= ($_SESSION['user']['name']) ?>">
                </div>
                <div>
                    <label for="avatar">Nouveau Avatar :</label>
                    <input type="file" id="avatar" name="avatar">
                </div>
                <button type="submit" class="update-button">Mettre à jour</button>
            </form>
        </section>
        <div class="gestion-admin">
            <?php if ($isLoggedIn && $_SESSION['user']['idRole'] == '10') : ?> <!-- cache le lien Gestion Administrateur si l'utilisateur n'a pas le role admin -->
                <a href="/ctrl/login/secret.php" class="admin-link">Gestion Administrateur</a>
            <?php endif; ?>

            <?php if ($isLoggedIn && $_SESSION['user']['idRole'] == '20') : ?> <!-- cache le lien Ajouter des articles si l'utilisateur n'a pas le role contributeur -->
                <a class="header-link" href="/ctrl/article/add-display.php">Ajouter un article</a>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
