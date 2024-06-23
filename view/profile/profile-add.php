<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Document</title>
</head>
<body>
<main>
    <form action="/ctrl/profile/profile.php" method="post" enctype="multipart/form-data">

        <!-- fichier à 'uploader' -->
        <div>
            <label for="file">Fichier d'avatar</label>
            <input type="file" id="file" name="file"  accept="image/*" >
        </div>
        <img style="border-radius: 8%;" src="<?= '/upload/' . $_SESSION['user']['avatar_filename'] ?>" />

        <div>
            <button type="submit">Valider</button>
        </div>
    </form>
</main>
</body>
</html>