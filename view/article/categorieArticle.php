<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Articles par catégorie</title>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main>
        <h1>Articles par catégorie</h1>
        <?php
        $currentCategory = '';
        foreach ($articlesByCategory as $article):
            if ($currentCategory != $article['categoryName']):
                if ($currentCategory != ''):
                    echo '</div>'; // Ferme la catégorie précédente
                endif;
                $currentCategory = $article['categoryName'];
                echo '<h2>' . htmlspecialchars($currentCategory) . '</h2>';
                echo '<div class="category-articles">';
            endif;
            ?>
            <div class="article">
                <h3><?= htmlspecialchars($article['articleName']) ?></h3>
                <p>Posté le : <?= htmlspecialchars($article['date']) ?></p>
                <?php if (!empty($article['image_filename'])): ?>
                    <img src="/upload/<?= htmlspecialchars($article['image_filename']) ?>" alt="Image de l'article" style="width: 150px; height: auto;">
                <?php endif; ?>
                <p><?= nl2br(htmlspecialchars($article['textOfArticle'])) ?></p>
                <a href="/ctrl/article/details.php?id=<?= htmlspecialchars($article['id']) ?>">Lire plus</a>
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
