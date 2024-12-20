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
        <div class="formulaire" id="profileForm">
            <div class="wrapper" id="wrapperAll">
                <img src="/asset/img/dahlia.png" alt="">
                <h2 class="text-right">Bienvenue</h2>
                <div class="form-wrapper login">

                    <form action="/ctrl/login/login.php" method="post">
                        <h2>S'Identifier</h2>
                        <!-- E-mail -->
                        <div class="input-box">
                            <label for="code"></label>
                            <input type="text" name="email" id="code" placeholder="Email" required>
                        </div>
                        <!-- PASSWORD -->
                        <div class="input-box">
                            <label for="label"></label>
                            <input type="password" name="password" id="label" placeholder="Mot De Passe" required>
                        </div>
                        <!-- <div class="forgot-pass">
                    <a href="#">Mot de passe oublié?</a>
                </div> -->
                        <button class="submit-form" type="submit">S'Identifier</button>
                        <div class="sign-link">
                            <p>Pas encore inscrits? <a href="#" onclick="registerActive()">Inscription</a></p>
                        </div>
                        <div class="error-message">
                            <?php

                            // message du formulaire de login ca affiche le contenue de "error"  
                            if (isset($_SESSION['error'])) { // isset verifie si ($_SESSION['error']) est pas null
                                echo '<p class= "error-message">' . $_SESSION['error'] . '</p>';
                                unset($_SESSION['error']); // unset ca retire ($_SESSION['error']) de la session pour supprimer le message d'érreur de la session
                            }

                            // message du formulaire d'inscription ca affiche le contenu de "sucess" ou "error"
                            if (isset($_SESSION['success'])) { // ca verifie s'il y a le message de succès dans la session
                                echo '<p class="messageInscription">' . $_SESSION['success'] . '</p>'; // afiche
                                unset($_SESSION['success']); // supprime le message de succès de la session
                            } elseif (isset($_SESSION['error'])) { // ca vérifie s'il y a un message d'erreur dans la session
                                echo '<p class="error-message">' . $_SESSION['error'] . '</p>'; // affiche
                                unset($_SESSION['error']); // supprime le message d'erreur de la session
                            }
                            ?>
                        </div>
                    </form>
                </div>

                <div class="form-wrapper register">
                <form id="registerForm" action="/ctrl/login/register.php" method="post" enctype="multipart/form-data" onsubmit="resizeAndUploadImage(); return false;">
                        <h2>Inscription</h2>
                        <div class="input-box">
                            <input type="text" name="name" placeholder="Nom">
                        </div>
                        <div class="input-box">
                            <input type="text" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" placeholder="Mot de Passe" required>
                        </div>
                        <div class="input-box">
                            <input type="file" id="file" name="file" class="inputfileRegister" onchange="updateFileName()">
                            <label for="file" class="inputfile-label-register">Votre avatar</label>
                            <span id="file-name" class="file-name-register">Aucun fichier sélectionné</span>
                        </div>
                        <script>
                            updateFileName()
                        </script>
                        <button class="submit-form" type="submit">Inscription</button>
                        <div class="sign-link">
                            <p>Déjà Inscrits? <a href="#" onclick="loginActive()">S'Identifier</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php'; ?>
    <script src="/asset/script/wrapper.js"></script>
</body>

</html>