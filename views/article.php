<main>
    <?php if ($article): ?>
        <article>
            <h2><?php echo htmlspecialchars($article['titre']); ?></h2>
            <p><?php echo htmlspecialchars($article['contenu']); ?></p>
            <p><small>Publié le <?php echo $article['dateCreation']; ?></small></p>
        </article>
    <?php else: ?>
        <p>Article non trouvé.</p>
    <?php endif; ?>
</main>
