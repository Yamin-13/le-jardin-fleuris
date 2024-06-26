<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>

    <main>
        <div class="update-article-container">
            <h1>Modifier l'article</h1>
            <form action="/ctrl/article/update.php" method="post" enctype="multipart/form-data" class="update-article-form">

                <!-- Id -->
                <input type="hidden" name="id" value="<?= $article['id'] ?>">

                <div class="form-group">
                    <label for="name">Nom de l'article</label>
                    <input type="text" name="name" id="name" value="<?= htmlspecialchars($article['name']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="textOfArticle">Texte de l'article</label>
                    <textarea name="textOfArticle" id="textOfArticle" required><?= htmlspecialchars($article['textOfArticle']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image_filename">Image de l'article</label>
                    <input type="file" name="image_filename" id="image_filename" class="inputfile">
                    <label for="image_filename" class="inputfile-label">Choisir un fichier</label>
                    <span class="file-name"><?= htmlspecialchars($article['image_filename']) ?></span>
                </div>

                <div class="form-group">
                    <label for="idCategorie">Catégorie</label>
                    <select name="idCategorie" id="idCategorie" required>
                        <?php foreach ($listCategorie as $categorie) { ?>
                            <?php $isSelectedMsg = ($article['idCategorie'] == $categorie['id']) ? 'selected' : ''; ?>
                            <option value="<?= $categorie['id'] ?>" <?= $isSelectedMsg ?>><?= htmlspecialchars($categorie['name']) ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group submit">
                    <button type="submit" class="btn-submit">Modifier</button>
                </div>
            </form>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php';?>

</body>

</html>
