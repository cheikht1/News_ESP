<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php foreach ($categories as $categorie): ?>
            <li>
                <a href="index.php?categorie=<?php echo $categorie['id']; ?>"><?php echo htmlspecialchars($categorie['libelle']); ?></a>
                <?php if ($categorie_id == $categorie['id']): ?>
                    <ul>
                        <?php foreach ($articles as $article): ?>
                            <li><a href="index.php?categorie=<?php echo $categorie_id; ?>&article=<?php echo $article['id']; ?>"><?php echo htmlspecialchars($article['titre']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
