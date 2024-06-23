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

    <h2 class="secretMessage">Bonjour Administrateur, <?= ($_SESSION['user']['email']) ?>.</h2>
    <main>
        <li><a class="header_link" href="/ctrl/article/list.php">liste des articles</a>
        <li><a class="header_link" href="/ctrl/article/add-display.php">Ajouter un article</a>
    </main>

</body>

</html>