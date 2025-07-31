<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?=BASE_URL?>/public/style/main.css">
</head>
<body>
    <?php include "App/View/components/navbar.php"; ?>
    <h1>Connexion</h1>
    <form action="" method="post">
        <label for="login">email/login</label>
        <input type="text" name="login" id="login">
        <br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Se connecter" name="submit">
    </form>
    <p><?= $message ?></p>
</body>
</html>