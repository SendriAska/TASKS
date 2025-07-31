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
use App\Controller\UserController;

// instanciation du contrôleur
$homeController = new HomeController();
$categoryController = new CategoryController();
$userController = new UserController();

// Test route
switch (substr($path, strlen(BASE_URL))) {
    case "/user/inscription":
        $userController->register();
        break;
    case "/":
        $homeController->home();
        break;
    case "/category/all":
        $categoryController->showAllCategories();
        break;
    case "/connexion":
        echo "Connexion";
        break;
    case "/category/add":
        $categoryController->addCategory();
        break;
    case "/category/delete":
        $categoryController->removeCategory();
        break;
    case "/user/connexion":
        break;
    default : 
        echo "404";
        break;
}