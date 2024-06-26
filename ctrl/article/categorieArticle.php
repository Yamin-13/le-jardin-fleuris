<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/article.php';
session_start();

$dbConnection = getConnection($dbConfig);
$articlesByCategory = getArticlesByCategory($dbConnection);

include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/view/article/categorieArticle.php';
include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/footer.php';
