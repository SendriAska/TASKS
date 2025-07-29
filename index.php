<?php
//imposter les ressources
include "./env.php";
include "./vendor/autoload.php";

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test si l'url posséde une route sinon on renvoi à la racine
$path = $url['path'] ??  '/';

switch ($path) {
    case "/TASKS/":
        echo "Bienvenue";
        break;
    case "/TASKS/connexion":
        echo "Connexion";
        break;
    case "/TASKS/task/add":
        echo "La tâche a été ajoutée";
        break;
    default : 
        echo "404";
        break;
}