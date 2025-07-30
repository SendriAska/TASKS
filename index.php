<?php
//imposter les ressources
include "./env.php";
include "./vendor/autoload.php";

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test si l'url posséde une route sinon on renvoi à la racine
$path = $url['path'] ??  '/';

// import des classes router
use App\Controller\HomeController;
use App\Controller\CategoryController;

// instanciation du contrôleur
$homeController = new HomeController();
$categoryController = new CategoryController();


// Test route
switch ($path) {
    case "/TASKS/":
        $homeController->home();
        break;
    case "/TASKS/category/all":
        $categoryController->showAllCategories();
        break;
    case "/TASKS/connexion":
        echo "Connexion";
        break;
    case "/TASKS/category/add":
        $categoryController->addCategory();
        break;
    case "/TASKS/category/delete":
        $categoryController->removeCategory();
        break;
    default : 
        echo "404";
        break;
}