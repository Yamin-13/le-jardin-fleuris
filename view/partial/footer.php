<footer>
    <div id="listMessage">
        <?php if (!empty($_SESSION['msg']['info'])) { ?>

            <div class="info">
                <ul>
                    <?php foreach ($_SESSION['msg']['info'] as $info) { ?>
                        <li><?= $info ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php if (!empty($_SESSION['msg']['error'])) { ?>

            <div class="error">
                <ul>
                    <?php foreach ($_SESSION['msg']['error'] as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>

    <?php unset($_SESSION['msg']) ?>

        <div class="footer-content">
            <div class="footer-section about">
                <h2>À propos</h2>
                <p>Nous partageons notre passion pour les fleurs à travers des articles inspirants et éducatifs.</p>
            </div>
            <div class="footer-section contact">
                <h2>Contactez-nous</h2>
                <p>Email: contact@lejardinfleuri.com</p>
                <p>Téléphone: +213 456 789</p>
            </div>
            <div class="footer-section social">
                <h2>Suivez-nous</h2>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">X</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Blog de Fleurs | Tous droits réservés</p>
        </div>
    </footer>


</body>

</html>