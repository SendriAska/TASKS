<?php
    //importer le fichier bdd.php
    include "env.php";
    include "utils/bdd.php";
    include "model/categoryModel.php";

    $message = createCategory();

    function createCategory() {
        return "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h2>Ajouter une Catégorie</h2>
    <form action="" method="post">
        <input type="text" name="nameCategory" placeholder="Saisir le nom de la catégorie">
        <input type="submit" name="submit" value="Ajouter">
    </form>
</body>
</html>