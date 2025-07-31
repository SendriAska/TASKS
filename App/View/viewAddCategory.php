<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Categorie</title>
    <link rel="stylesheet" href="<?=BASE_URL?>/public/style/main.css">
</head>
<body>
    <?php include "App/View/components/navbar.php"; ?>
    <h1>Ajouter une catégorie</h1>
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Saisir le nom de la catégorie">
        <input type="submit" value="Enregistrer" name="submit">
    </form>
    <p><?= $message ?></p>
</body>
</html>