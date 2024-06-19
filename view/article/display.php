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
                <label for="typeOfArticle">Type d'article :</label>
                <input type="text" id="typeOfArticle" name="typeOfArticle">
            </div>
            <div>
                <label for="textOfArticle">Texte de l'article :</label>
                <textarea id="textOfArticle" name="textOfArticle"></textarea>
            </div>
            <div>
                <label for="id">Nom de l'id :</label>
                <input type="text" id="id" name="id">
            </div>
            <div>
                <label for="idUser">Nom de l'idUser :</label>
                <input type="text" id="idUser" name="idUser">
            </div>
            <div>
                <label for="date">Nom de l'article :</label>
                <input type="date" id="date" name="date">
            </div>
            <div>
                <label for="idCategorie">Nom de l'idCategorie :</label>
                <input type="text" id="idCategorie" name="idCategorie">
            </div>
            <div>
                <label for="image_filename">Fichier image :</label>
                <input type="file" id="image_filename" name="image_filename" accept="image/*">
            </div>
            <div>
                <button type="submit">Ajouter l'Article</button>
            </div>
        </form>
    </main>
</body>

</html>