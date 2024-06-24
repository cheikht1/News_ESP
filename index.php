<?php
include 'db.php';

$categorie_id = isset($_GET['categorie']) ? (int) $_GET['categorie'] : 0; // 0 is the default value if the parameter is not set or invalid 
$article_id = isset($_GET['article']) ? (int) $_GET['article'] : 0;

function getCategories($conn) { // $conn is a global variable defined in db.php
    $stmt = $conn->prepare("SELECT * FROM Categorie"); // Prepare an SQL query
    $stmt->execute(); // Execute the query
    return $stmt->fetchAll(); // Return the result
}

function getArticlesByCategorie($conn, $categorie_id) {  
    $stmt = $conn->prepare("SELECT * FROM Article WHERE categorie = :categorie_id ORDER BY dateCreation DESC");
    $stmt->bindParam(':categorie_id', $categorie_id); 
    $stmt->execute();
    return $stmt->fetchAll(); 
}

function getArticle($conn, $article_id) {
    $stmt = $conn->prepare("SELECT * FROM Article WHERE id = :article_id");
    $stmt->bindParam(':article_id', $article_id);
    $stmt->execute();
    return $stmt->fetch();
}

$categories = getCategories($conn);
?>

 <!-- htmlspecialchars est utilisé pour prévenir les attaques XSS en échappant les caractères spéciaux (<, >, &, et "). -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP News</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>ESP News</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <?php foreach ($categories as $categorie): ?>
                <li>
                    <a href="index.php?categorie=<?php echo $categorie['id']; ?>"><?php echo htmlspecialchars($categorie['libelle']); ?></a> 
                    <?php if ($categorie_id == $categorie['id']): ?>
                        <ul>
                            <?php
                            $articles = getArticlesByCategorie($conn, $categorie_id);
                            foreach ($articles as $article): ?>
                                <li><a href="index.php?categorie=<?php echo $categorie_id; ?>&article=<?php echo $article['id']; ?>"><?php echo htmlspecialchars($article['titre']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <main>
        <?php
        if ($article_id) {
            $article = getArticle($conn, $article_id);
            if ($article) {
                echo "<article>";
                echo "<h2>" . htmlspecialchars($article['titre']) . "</h2>";
                echo "<p>" . htmlspecialchars($article['contenu']) . "</p>";
                echo "<p><small>Publié le " . $article['dateCreation'] . "</small></p>";
                echo "</article>";
            } else {
                echo "<p>Article non trouvé.</p>";
            }
        } elseif ($categorie_id) {
            foreach ($articles as $article) {
                echo "<article>";
                echo "<h2>" . htmlspecialchars($article['titre']) . "</h2>";
                echo "<p>" . htmlspecialchars($article['contenu']) . "</p>";
                echo "<p><small>Publié le " . $article['dateCreation'] . "</small></p>";
                echo "</article>";
            }
        } else {
            echo "<p>Bienvenue sur ESP News. Sélectionnez une catégorie pour commencer.</p>";
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 ESP News by CMTT</p>
    </footer>
</body>
</html>
