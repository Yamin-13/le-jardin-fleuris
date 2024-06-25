<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Blog de Fleurs</title>
    <link rel="stylesheet" href="/asset/accueil.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main class="home-main">
        <section class="hero-section">
            <img src="/asset/img/rose.webp" alt="Image de fleurs" class="hero-image">
            <div class="welcome-message">
                <h2 class="welcome-title">Bienvenue Dans Notre Jardin Fleuris</h2>
                <p>Découvrez la beauté et la diversité des fleurs</p>
            </div>
        </section>

        <section class="latest-articles-section">
            <h2>Derniers Articles</h2>
            <div class="carousel-container">
                <button class="carousel-button prev">&lt;</button>
                <div class="articles-wrapper">
                    <div class="articles-container">
                        <?php if (!empty($latestArticles)): ?>
                            <?php foreach ($latestArticles as $article): ?>
                                <div class="article-card">
                                    <img src="/upload/<?= htmlspecialchars($article['image_filename']) ?>" alt="Image de l'article">
                                    <h3><?= htmlspecialchars($article['name']) ?></h3>
                                    <p><?= htmlspecialchars(mb_strimwidth($article['textOfArticle'], 0, 100, '...')) ?></p>
                                    <a href="/ctrl/article/details.php?id=<?= htmlspecialchars($article['id']) ?>" class="read-more-btn">Lire plus</a>
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

    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h2>À propos</h2>
                <p>Nous partageons notre passion pour les fleurs à travers des articles inspirants et éducatifs.</p>
            </div>
            <div class="footer-section contact">
                <h2>Contactez-nous</h2>
                <p>Email: contact@lejardinfleuris.com</p>
                <p>Téléphone: +213 456 789</p>
            </div>
            <div class="footer-section social">
                <h2>Suivez-nous</h2>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">X</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Blog de Fleurs | Tous droits réservés</p>
        </div>
    </footer>
    <script src="/asset/script/accueilCarousel.js"></script>
</body>

</html>
