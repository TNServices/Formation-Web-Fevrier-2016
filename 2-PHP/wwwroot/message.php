<?php
session_start();

if (!empty($_POST['message'])) {
    require 'includes/bdd.php';
    $db = getDb();
    $statement = $db->prepare('INSERT INTO messages(user_id, content) VALUES(1, :content)');
    $statement->bindParam(':content', $_POST['message'], PDO::PARAM_STR);
    $statement->execute();
}

header('Location: /chat.php');