<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <title>Nos Articles</title>
</head>
<body>
    <main class="main-categories">
        <h1 class="page-title">Nos Articles</h1>
        <?php
        $currentCategory = '';
        foreach ($articlesByCategory as $article):
            if ($currentCategory != $article['categoryName']):
                if ($currentCategory != ''):
                    echo '</div>'; // Ferme la catégorie précédente
                endif;
                $currentCategory = $article['categoryName'];
                echo '<h2 class="category-title">' . ($currentCategory) . '</h2>';
                echo '<div class="category-articles">';
            endif;
            ?>
            <div class="article-card">
                <h3 class="article-title-categorie"><?= ($article['articleName']) ?></h3>
                <p class="article-date-categorie">Posté le : <?= ($article['date']) ?></p>
                <?php if (!empty($article['image_filename'])): ?>
                    <img class="image-categorie" src="/upload/<?= ($article['image_filename']) ?>" alt="Image de l'article">
                <?php endif; ?>
                <p class="article-text-categorie"><?= (mb_strimwidth($article['textOfArticle'], 0, 200, '...')) ?></p>
                <a class="read-more" href="/ctrl/article/details.php?id=<?= ($article['id']) ?>">Lire plus</a>
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
