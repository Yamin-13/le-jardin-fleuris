<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Articles par catégorie</title>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main class="main-categories">
        <h1 class="page-title">Articles par catégorie</h1>
        <?php
        $currentCategory = '';
        foreach ($articlesByCategory as $article):
            if ($currentCategory != $article['categoryName']):
                if ($currentCategory != ''):
                    echo '</div>'; // Ferme la catégorie précédente
                endif;
                $currentCategory = $article['categoryName'];
                echo '<h2 class="category-title">' . htmlspecialchars($currentCategory) . '</h2>';
                echo '<div class="category-articles">';
            endif;
            ?>
            <div class="article-card">
                <h3 class="article-title"><?= htmlspecialchars($article['articleName']) ?></h3>
                <p class="article-date">Posté le : <?= htmlspecialchars($article['date']) ?></p>
                <?php if (!empty($article['image_filename'])): ?>
                    <img class="article-image" src="/upload/<?= htmlspecialchars($article['image_filename']) ?>" alt="Image de l'article">
                <?php endif; ?>
                <p class="article-text"><?= nl2br(htmlspecialchars($article['textOfArticle'])) ?></p>
                <a class="read-more" href="/ctrl/article/details.php?id=<?= htmlspecialchars($article['id']) ?>">Lire plus</a>
            </div>
        <?php
        endforeach;
        if ($currentCategory != ''):
            echo '</div>'; // ferme la dernière catégorie
        endif;
        ?>

    </main>
</body>
</html>
