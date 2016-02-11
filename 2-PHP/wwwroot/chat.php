<?php
session_start();

require 'includes/bdd.php';
$db = getDb();
$messages = $db->query('SELECT * FROM messages ORDER BY id DESC LIMIT 0, 2')->fetchAll();

require 'includes/header.php';

?>

    <form action="/message.php" method="POST">
        <input type="text" name="message">
        <input type="submit" value="Envoyer votre message">
    </form>
    <?php
    foreach ($messages as $message) {
        ?>
    <div><?= $message['content'] ?></div>
<?php
    }
require 'includes/footer.php';
?>