<main>
    <section>
        <h3 class="avatarTitle">Avatar de <?= $_SESSION['user']['email'] ?></h3>
        <p><img style="border-radius: 8%;" src="/upload/<?= $_SESSION['user']['avatar_filename'] ?>" /></p>
    </section>
</main>
