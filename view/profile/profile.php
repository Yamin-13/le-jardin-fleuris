<main>
    <section>
        <h3 class="avatarTitle">Profile de <?= $_SESSION['user']['email'] ?></h3>
        <p><img style="border-radius: 8%;" src="/upload/<?= $_SESSION['user']['avatar_filename'] ?>" /></p>
    </section>
    <section>
        <h2>Informations du profil</h2>
        <p><strong>Email :</strong> <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
    </section>
    <section>
        <h2>Mettre à jour le profil</h2>
        <form action="/ctrl/profile/update.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="email">Nouvel Email :</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($_SESSION['user']['email']) ?>" >
            </div>
            <div>
                <label for="avatar">Nouveau Avatar :</label>
                <input type="file" id="avatar" name="avatar">
            </div>
            <button type="submit">Mettre à jour</button>
        </form>
    </section>
    <div class="gestionAdmin">
        <?php if ($isLoggedIn && $_SESSION['user']['idRole'] == '10') : ?> <!-- cache le lien Gestion Aministrateur si l'utilisateur n'a pas le role admin -->
            <a href="/ctrl/login/secret.php">Gestion Aministrateur</a>
        <?php endif; ?>

        <?php if ($isLoggedIn && $_SESSION['user']['idRole'] == '20') : ?> <!-- cache le lien Ajouter des articles si l'utilisateur n'a pas le role contributeur -->
            <a class="header_link" href="/ctrl/article/add-display.php">Ajouter un article</a>
        <?php endif; ?>

    </div>
</main>