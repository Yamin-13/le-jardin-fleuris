<!DOCTYPE html>
<html lang="en">
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
        <th>name</th>
        <th>typeOfArticle</th>
        <th>textOfArticle</th>
        <th>date</th>
        <th>image_filename</th>

    </tr>
</thead>

<tbody>
    <?php foreach ($listArticle as $article) { ?>

        <tr>
            <td><?= $article['id'] ?></td>
            <td><?= $article['name'] ?></td>
            <td><?= $article['typeOfArticle'] ?></td>
            <td><?= $article['textOfArticle'] ?></td>
            <td><?= $article['date'] ?></td>
            
        </tr>
    <?php } ?>
</tbody>
</table>
</main>
    
</body>
</html>