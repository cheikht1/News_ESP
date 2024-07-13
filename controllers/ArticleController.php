<!-- Ce contrôleur va s'occuper des interactions liées aux articles, comme l'affichage d'un article spécifique ou la liste des articles d'une catégorie. -->
<!-- ArticleController.php : Ce contrôleur est dédié aux articles, encapsulant la logique spécifique aux articles et facilitant la réutilisation du code. -->
<?php
include_once 'models/Article.php';

class ArticleController {
    public static function showArticle($conn, $article_id) {
        return Article::getById($conn, $article_id);
    }

    public static function showArticlesByCategory($conn, $categorie_id) {
        return Article::getByCategory($conn, $categorie_id);
    }
}
?>
