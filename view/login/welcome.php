<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie de Fleurs</title>
    <link rel="stylesheet" href="/asset/welcome.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
   
</head>

<body>
    <main class="gallery-container">
        <h1 class="gallery-title">Galerie de Fleurs</h1>
        <div class="gallery" id="gallery">
            <!-- images injecté ici avec JavaScript -->
        </div>
    </main>

    <!-- Le modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <script src="/asset/script/apiUnsplash.js"></script>
</body>

</html>
