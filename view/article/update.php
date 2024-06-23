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

        <form action="/ctrl/article/update.php" method="post">

            <!-- Id -->
            <input type="hidden" name="id" value="<?= $article['id'] ?>">

            <!-- Numero IMO -->
            <div>
                <label for="name">Nom de l'article</label>
                <input type="text" name="name" id="name" value="<?= $article['name'] ?>">
            </div>

            <!-- Nom -->
            <div>
                <label for="textOfArticle">Texte de l'article</label>
                <input type="text" name="textOfArticle" id="textOfArticle" value="<?= $article['textOfArticle'] ?>">
            </div>

            <div>
                <label for="image_filename">image_filename</label>
                <input type="file" name="image_filename" id="image_filename" value="<?= $article['image_filename'] ?>">
            </div>

            <div>
                <label for="idUser">idUser</label>
                <input type="text" name="idUser" id="idUser" value="<?= $article['idUser'] ?>">
            </div>


            <!-- Service -->
            <div>
                <label for="categorie">Catégorie</label>
                <select name="idCategorie" id="idCategorie">
                    <?php foreach ($listCategorie as $categorie) { ?>

                        <?php

                        // Quand l'option correspond à la categorie de l'article à modifier,
                        // lui ajoute l'attribut 'selected'
                        $isSelectedMsg = '';
                        if ($article['idCategorie'] == $categorie['id']) {
                            $isSelectedMsg = 'selected';
                        }
                        ?>

                        <option value="<?= $categorie['id'] ?>" <?= $isSelectedMsg ?>><?= $categorie['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <?= var_dump($_GET); ?>
            <div class="submit">
                <button type="submit">Modifier</button>
            </div>
        </form>
    </main>

</body>

</html>

