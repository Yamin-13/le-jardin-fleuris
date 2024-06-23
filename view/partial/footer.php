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

    <ul>
        <li class="footerTitle">Fleur de Dahlia - 2024</li>
    </ul>
</footer>
</body>

</html>