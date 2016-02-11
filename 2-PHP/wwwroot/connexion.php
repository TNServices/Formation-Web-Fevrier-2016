<?php
if (!empty($_POST['username'] && !empty($_POST['password']))) {
    require 'includes/bdd.php';

    $db = getDb();

    var_dump($_POST);
    var_dump(sha1($_POST['password']));

    $statement = $db->prepare('SELECT id FROM users WHERE username=:username');
    $statement->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
    $statement->bindParam(':password', sha1($_POST['password']), PDO::PARAM_STR);
    var_dump($statement);

    $user = $statement->fetchAll();
    var_dump($user);
    die;
    header('Location: /');
    die;
}
include 'includes/header.php';
?>
<form action="/connexion.php" method="POST">
    <input type="text" name="username"><br>
    <input type="password" name="password"><br>
    <input type="submit">
</form>
<?php
include 'includes/footer.php';
?>
