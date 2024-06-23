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

    <h2 class="secretMessage">Secrets Trouvés, <?=($_SESSION['user']['email']) ?>!!!!</h2>
    <main>
        <video autoplay muted loop playsinline id="bg-video">
            <source src="/asset/img/eurosBillet.mp4" type="video/mp4">
        </video>
    </main>

</body>

</html>