<main>
    <section>
        <h3 class="avatarTitle">Avatar de <?= $_SESSION['user']['email'] ?></h3>
        <p><img style="border-radius: 8%;" src="/upload/<?= $_SESSION['user']['avatar_filename'] ?>" /></p>
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