<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title><?= ($titrePage) ?></title>
</head>
<body>
    <main class="article-details-container">
        <article class="article-details">
            <h1 class="article-title"><?= ($article['name']) ?></h1>
            <p class="article-category">Catégorie : <?= ($article['categorieName']) ?></p>
            <img class="article-image" src="/upload/<?= ($article['image_filename']) ?>" alt="Image de l'article">
            <p class="article-content"><?= nl2br(($article['textOfArticle'])) ?></p>
            <p class="article-date">Posté le : <?= ($article['date']) ?></p>
            <?php if (isset($_SESSION['user']) && ($_SESSION['user']['id'] == $article['idUser'] || $_SESSION['user']['idRole'] == '10')): ?>
                <div class="article-actions">
                    <a href="/ctrl/article/deleteDetails.php?id=<?= ($article['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                        <button class="button-delete">Supprimer</button>
                    </a>
                    <a href="/ctrl/article/update-display.php?id=<?= ($article['id']) ?>"><button class="button-update">Modifier</button></a>
                </div>
            <?php endif; ?>
        </article>

        <!-- Formulaire de commentaire -->
        <?php if (isset($_SESSION['user'])): ?>
            <form class="comment-form" action="/ctrl/article/comment.php" method="post">
                <input type="hidden" name="article_id" value="<?= ($article['id']) ?>">
                <textarea name="content" placeholder="Votre commentaire" required></textarea>
                <button type="submit">Commenter</button>
            </form>
        <?php else: ?>
            <p><a href="/ctrl/login/login.php">Connectez-vous</a> pour commenter.</p>
        <?php endif; ?>
        
        <!-- Affichage des commentaires -->
        <section class="comments-section">
            <h2>Commentaires</h2>
            <?php
            $comments = getCommentsByArticleId($article['id'], $dbConnection);
            foreach ($comments as $comment): ?>
                <div class="comment">
                <p class="comment-author"><strong><?= ($comment['name']) ?></strong> a commenté le <?= ($comment['date']) ?></p>
                    <p class="comment-content"><?= nl2br(($comment['textOfComment'])) ?></p>
                    <?php if (isset($_SESSION['user']) && ($_SESSION['user']['id'] == $comment['idUser'] || $_SESSION['user']['idRole'] == '10')): ?>
                        <div class="comment-actions">
                            <a href="/ctrl/article/comment.php?action=delete&id=<?= ($comment['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                                <button class="button-delete">Supprimer</button>
                            </a>
                            <a href="/ctrl/article/comment.php?action=edit&id=<?= ($comment['id']) ?>"><button class="button-update">Modifier</button></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>
