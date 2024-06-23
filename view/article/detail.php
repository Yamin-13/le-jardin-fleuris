<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/style.css">

    <title><?= $titrePage ?></title>
</head>

<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
<main>
        <article>
            <h1><?= htmlspecialchars($article['name']) ?></h1>
            <p>Catégorie : <?= htmlspecialchars($article['categorieName']) ?></p>
            <img src="<?= htmlspecialchars($article['image_filename']) ?>" alt="Image de l'article">
            <p><?= nl2br(htmlspecialchars($article['textOfArticle'])) ?></p>
            <p>Posté le : <?= htmlspecialchars($article['date']) ?></p>

        </article>
    </main>
</body>

</html>