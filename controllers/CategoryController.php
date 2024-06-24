<?php
include_once 'models/Category.php';
include_once 'models/Article.php';

$categorie_id = isset($_GET['categorie']) ? (int)$_GET['categorie'] : 0;
$article_id = isset($_GET['article']) ? (int)$_GET['article'] : 0;

$categories = Category::getAll($conn);
$articles = [];

if ($categorie_id) {
    $articles = Article::getByCategory($conn, $categorie_id);
}

if ($article_id) {
    $article = Article::getById($conn, $article_id);
}

include 'views/header.php';
include 'views/nav.php';

if ($article_id) {
    include 'views/article.php';
} elseif ($categorie_id) {
    include 'views/category.php';
} else {
    include 'views/home.php';
}

include 'views/footer.php';
?>
