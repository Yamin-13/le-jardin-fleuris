<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main>
        <div class="user-management-container">
            <h1>Gestion des utilisateurs</h1>
            <table class="user-management-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= ($user['id']) ?></td>
                            <td><?= ($user['name']) ?></td>
                            <td><?= ($user['email']) ?></td>
                            <td><?= ($user['idRole']) ?></td>
                            <td>
                                <a href="/ctrl/profile/deleteUser.php?id=<?= ($user['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    <button>Supprimer</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php';?>

</body>
</html>
