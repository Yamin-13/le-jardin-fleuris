<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/style.css">
    <title><?= htmlspecialchars($titrePage) ?></title>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main>
        <article>
            <h1><?= htmlspecialchars($article['name']) ?></h1>
            <p>Catégorie : <?= htmlspecialchars($article['categorieName']) ?></p>
            <img style="border-radius: 8%;" src="/upload/<?= htmlspecialchars($article['image_filename']) ?>" alt="Image de l'article">
            <p><?= nl2br(htmlspecialchars($article['textOfArticle'])) ?></p>
            <p>Posté le : <?= htmlspecialchars($article['date']) ?></p>
            <a href="/ctrl/article/deleteDetails.php?id=<?= htmlspecialchars($article['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                <button class="buttonDelete">Supprimer</button>
            </a>
            <a href="/ctrl/article/update-display.php?id=<?= htmlspecialchars($article['id']) ?>"><button class="buttonUpdate"><img class="iconeCorbeille" src="/asset/img/editer.png" alt=""></button></a>
        </article>
    </main>
</body>
</html>
