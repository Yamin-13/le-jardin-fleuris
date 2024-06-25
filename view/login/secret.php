<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/style.css">
    <title><?= htmlspecialchars($titrePage) ?></title>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>

    <main class="secret-container">
        <h2 class="secret-message">Bonjour Administrateur, <?= htmlspecialchars($_SESSION['user']['name']) ?>.</h2>
        <ul class="admin-actions">
            <li><a class="header-link" href="/ctrl/article/list.php">Liste des articles</a></li>
            <li><a class="header-link" href="/ctrl/article/add-display.php">Ajouter un article</a></li>
            <li><a class="header-link" href="/ctrl/profile/adminUser.php">Liste des utilisateurs</a></li>
        </ul>
    </main>
</body>
</html>
