<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Modifier le commentaire</title>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main class="edit-comment-main">
        <div class="edit-comment-container">
            <h1>Modifier le commentaire</h1>
            <form action="/ctrl/article/comment.php?action=update" method="post" class="edit-comment-form">
                <input type="hidden" name="comment_id" value="<?= htmlspecialchars($comment['id']) ?>">
                <div class="form-group">
                    <label for="content">Commentaire</label>
                    <textarea name="content" id="content" required><?= htmlspecialchars($comment['textOfComment']) ?></textarea>
                </div>
                <button type="submit" class="btn-submit">Mettre à jour</button>
            </form>
        </div>
    </main>
    include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php';

</body>
</html>
