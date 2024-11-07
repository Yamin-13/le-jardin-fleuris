<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $titrePage ?></title>
    <link rel="stylesheet" href="/asset/css/accueil.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>

<body>
    <main class="home-main">
        <section class="hero-section">
            <img src="/asset/img/rose.webp" alt="Image de fleurs" class="hero-image">
            <div class="welcome-message">
                <h2 class="welcome-title">Bienvenue Dans Notre Jardin Fleuri</h2>
                <p>Découvrez la beauté et la diversité des fleurs</p>
            </div>
        </section>

        <section class="latest-articles-section">
            <h2>Derniers Articles</h2>
            <div class="carousel-container">
                <button class="carousel-button prev">&lt;</button>
                <div class="articles-wrapper">
                    <div class="articles-container">
                        <!-- <?php if (!empty($latestArticles)): ?> <--  vérifie si y a des articles dans la variable $latestArticles  -->
                            <?php foreach ($latestArticles as $article): ?>
                                <div class="article-card">
                                    <img src="/upload/<?= ($article['image_filename']) ?>" alt="Image de l'article">
                                    <h3><?= ($article['name']) ?></h3>
                                    <!-- mb_strimwidth fonction PHP utilisée pour raccourcir une chaîne de caractères -->
                                    <p><?= (mb_strimwidth($article['textOfArticle'], 0, 100, '...')) ?></p> 
                                    <a href="/ctrl/article/details.php?id=<?= ($article['id']) ?>" class="read-more-btn">Lire plus</a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Aucun article disponible pour le moment.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <button class="carousel-button next">&gt;</button>
            </div>
        </section>
       
    </main>
    <script src="/asset/script/accueilCarousel.js"></script>
</body>

</html>
