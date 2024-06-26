<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title><?= ($pageTitle) ?></title>
</head>

<body>
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
                            <td><?= ($article['id']) ?></td>
                            <td><a href="/ctrl/article/details.php?id=<?= $article['id'] ?>"><?= ($article['name']) ?></a></td>
                            <td><?= (mb_strimwidth($article['textOfArticle'], 0, 100, '...')) ?></td>
                            <td><?= ($article['date']) ?></td>
                            <td>
                                <?php if (!empty($article['image_filename'])) : ?>
                                    <img src="/upload/<?= ($article['image_filename']) ?>" alt="Image" class="imageListAdmin">
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
