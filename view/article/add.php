<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title><?= $titrePage ?></title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main>
        <form action="/ctrl/article/add.php" method="post">


            <div>
                <label for="name">Nom de l'article :</label>
                <input type="text" id="name" name="name">
            </div>

            <div>
                <label for="textOfArticle">Texte de l'article :</label>
                <textarea id="textOfArticle" name="textOfArticle"></textarea>
            </div>
            
            <div>
                <label for="idUser">Nom de l'idUser :</label>
                <input type="text" id="idUser" name="idUser">
            </div>
           
            <div>
                <label for="image_filename">Fichier image :</label>
                <input type="file" id="image_filename" name="image_filename" >
            </div>

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