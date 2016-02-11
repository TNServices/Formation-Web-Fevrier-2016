<?php
if (!empty($_POST['username'] && !empty($_POST['password']))) {
    require 'includes/bdd.php';

    $db = getDb();

    $statement = $db->prepare('INSERT INTO users(username, password) VALUES(:username, :password)');
    $statement->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
    $statement->bindParam(':password', sha1($_POST['password']), PDO::PARAM_STR);
    $statement->execute();

    header('Location: /');
    die;
}
include 'includes/header.php';
?>
<form action="/inscription.php" method="POST">
    <input type="text" name="username"><br>
    <input type="password" name="password"><br>
    <input type="submit">
</form>
<?php
    include 'includes/footer.php';
?>
