<?php
class Category {
    public static function getAll($conn) {
        $stmt = $conn->prepare("SELECT * FROM Categorie");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
