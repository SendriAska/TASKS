<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Catégories</title>
    <link rel="stylesheet" href="<?=BASE_URL?>/public/style/main.css">
</head>
<body>
    <?php include "App/View/components/navbar.php"; ?>
    <h1>Liste des categories</h1>
    
    <table>
        <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>Supprimer<th>
        </thead>
    <!-- Boucler sur le tableau de Category -->
    <?php foreach($categories as $category): ?>
        <!-- afficher le contenu de l'attribut name (Category) -->
         <tr>
            <td><?= $category->getIdCategory() ?> </td>
            <td><?= $category->getName() ?> </td>
            <!-- version avec id en post avec un bouton -->
            <td><form action="/TASKS/category/delete" method="post">
                <input type="hidden" name="id" value="<?=$category->getIdCategory()?>">
                <input type="submit" value="delete" name="delete">
            </form></td>
         </tr>
    <?php endforeach ?>
    </table>
</body>

</html>