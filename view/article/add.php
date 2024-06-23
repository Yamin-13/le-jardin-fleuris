<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/style.css">
    <title><?= $titrePage ?></title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main>
        <form action="/ctrl/article/add.php" method="post" enctype="multipart/form-data">


            <div>
                <label for="name">Nom de l'article :</label>
                <input type="text" id="name" name="name">
            </div>

            <div>
                <label for="textOfArticle">Texte de l'article :</label>
                <textarea id="textOfArticle" name="textOfArticle"></textarea>
            </div>

            <div class="input-box">
                <input type="file" id="image_filename" name="image_filename" class="inputfile" onchange="updateFileName()">
                <label for="image_filename" class="inputfile-label">Votre avatar</label>
                <span id="file-name" class="file-name">Aucun fichier sélectionné</span>
            </div>

            <!-- <div>
                <label for="image_filename">Fichier image :</label>
                <input type="file" id="image_filename" name="image_filename">
            </div> -->
            <!-- idCategorie -->
            <div>
                <label for="categorie">Catégorie</label>
                <select name="idCategorie" id="categorie">
                    <?php foreach ($listCategorie as $categorie) { ?>
                        <option value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <button type="submit">Ajouter l'Article</button>
            </div>
        </form>
    </main>
</body>

</html>