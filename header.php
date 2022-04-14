<!doctype html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
<header>
    <nav class="navbar">
        <ul>
            <li>
                <a href="/index.php">Accueil</a>
            </li>
            <li>
                <form action="/login.php" method="post">
                    <input type="text" name="user" id="user" class="login" required>
                    <br>
                    <input type="password" name="pass" id="pass" class="login" required>
                    <input type="submit" value="Login">
                </form>
            </li>
        </ul>
    </nav>
</header>