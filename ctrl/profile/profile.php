<?php
// Ouvre une connexion à la Base de données
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';

session_start();

// rend la vue
include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header-2.php';
include $_SERVER['DOCUMENT_ROOT'] . '/view/profile/profile.php';
include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php';