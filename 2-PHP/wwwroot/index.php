<?php
    session_start();
    require 'includes/bdd.php';
    $db = getDb();

    $articles = $db->query('SELECT * FROM articles')->fetchAll();

    require 'includes/header.php';
?>
        <h1>Articles</h1>
<?php foreach ($articles as $article) { ?>
        <article>
            <h2><?= htmlspecialchars($article['title']) ?></h2>
            <p><?= htmlspecialchars($article['content']); ?></p>
        </article>
<?php } ?>

<?php
require 'includes/footer.php';
?>