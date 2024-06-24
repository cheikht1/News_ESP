<!-- Article.php : ce fichier contient les méthodes pour interagir avec la base de données concernant les articles. -->

<?php
class Article {
    public static function getByCategory($conn, $categoryId) {
        $stmt = $conn->prepare("SELECT * FROM Article WHERE categorie = :category_id ORDER BY dateCreation DESC");
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getById($conn, $articleId) {
        $stmt = $conn->prepare("SELECT * FROM Article WHERE id = :article_id");
        $stmt->bindParam(':article_id', $articleId);
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>
