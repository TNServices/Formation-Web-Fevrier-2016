<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
</head>
<body>
    <header>
        <nav>
            <a href="/">Accueil</a>
            <a href="/chat.php">Chat</a>
            <?php if (isset($_SESSION['username'])) { ?>
                <a href="/deco.php">Se déconnecter</a>
            <?php } else { ?>
                <a href="/inscription.php">S'inscrire</a>
                <a href="/connexion.php">Connexion</a>
            <?php } ?>
        </nav>
    </header>