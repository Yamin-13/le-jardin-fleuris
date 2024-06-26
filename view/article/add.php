<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/style.css">
    <title><?= ($titrePage) ?></title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main class="add-article-container">
        <h1>Ajouter un article</h1>
        <form action="/ctrl/article/add.php" method="post" enctype="multipart/form-data" class="add-article-form">
            <div class="form-group">
                <label for="name">Nom de l'article :</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="textOfArticle">Texte de l'article :</label>
                <textarea id="textOfArticle" name="textOfArticle" required></textarea>
            </div>
            <div class="form-group input-box">
                <input type="file" id="image_filename" name="image_filename" class="inputfile" onchange="updateFileName()" required>
                <label for="image_filename" class="inputfile-label">Choisir une image</label>
                <span id="file-name" class="file-name">Aucun fichier sélectionné</span>
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie :</label>
                <select name="idCategorie" id="categorie" required>
                    <?php foreach ($listCategorie as $categorie) { ?>
                        <option value="<?= $categorie['id'] ?>"><?= ($categorie['name']) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Ajouter l'Article</button>
            </div>
        </form>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php'; ?>
</body>

</html>