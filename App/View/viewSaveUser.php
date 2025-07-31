<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?=BASE_URL?>/public/style/main.css">
</head>
<body>
    <?php include "App/View/components/navbar.php"; ?>
    <h1>Inscrivez-vous</h1>

    <form action="" method="POST">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname">
        <br>
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname">
        <br>
        <label for="email">mail/login</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="S'inscrire" name="submit">
    </form>
    <p><?= $message ?></p>
</body>
</html>