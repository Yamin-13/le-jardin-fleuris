<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title><?= $pageTitle ?></title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom de l'article</th>
                    <!-- <th>Catégorie</th> -->
                    <th>Texte de l'article</th>
                    <th>Date</th>
                    <th>Image</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($listArticle as $article) : ?>
                    <tr>
                        <td><?= htmlspecialchars($article['id']) ?></td>
                        <!-- lien pour affiché les détails de chaque article -->
                        <td><a href="/ctrl/article/details.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['name']) ?></a></td>
                        <td><?= htmlspecialchars($article['textOfArticle']) ?></td>
                        <td><?= htmlspecialchars($article['date']) ?></td>

                        <td>
                            <!-- affiche l'image si elle est dispo -->
                            <?php if (!empty($article['image_filename'])) : ?>
                                <img src="/path/to/images/<?= htmlspecialchars($article['image_filename']) ?>" alt="Image">
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

</body>

</html>