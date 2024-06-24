<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Modifier le commentaire</title>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main>
        <form action="/ctrl/article/comment.php?action=update" method="post">
            <input type="hidden" name="comment_id" value="<?= htmlspecialchars($comment['id']) ?>">
            <textarea name="content" required><?= htmlspecialchars($comment['textOfComment']) ?></textarea>
            <button type="submit">Mettre à jour</button>
        </form>
    </main>
</body>
</html>
