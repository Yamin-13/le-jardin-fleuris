<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/style.css">
    <title><?= htmlspecialchars($pageTitle) ?></title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom de l'article</th>
                        <th>Texte de l'article</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listArticle as $article) : ?>
                        <tr>
                            <td><?= htmlspecialchars($article['id']) ?></td>
                            <td><a href="/ctrl/article/details.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['name']) ?></a></td>
                            <td><?= htmlspecialchars(mb_strimwidth($article['textOfArticle'], 0, 100, '...')) ?></td>
                            <td><?= htmlspecialchars($article['date']) ?></td>
                            <td>
                                <?php if (!empty($article['image_filename'])) : ?>
                                    <img src="/upload/<?= htmlspecialchars($article['image_filename']) ?>" alt="Image" class="imageListAdmin">
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="/ctrl/article/delete.php?id=<?= $article['id'] ?>" onclick="return confirm('Confirmer la suppression')">
                                    <button class="buttonDelete"><img class="iconeCorbeille" src="/asset/img/corbeille.png" alt=""></button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
