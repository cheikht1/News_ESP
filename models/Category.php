
<!-- Category.php : ce fichier contient les méthodes pour interagir avec la base de données concernant les catégories. -->
<?php
class Category {
    public static function getAll($conn) {
        $stmt = $conn->prepare("SELECT * FROM Categorie");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
