<?php

namespace App\Controller;

use App\Model\Category;
use App\Utils\Utilitaire;

class CategoryController
{
    //Attribut Modele Category
    private Category $category;

    public function __construct()
    {
        //injection de dépendance
        $this->category = new Category();
    }

    public function showAllCategories()
    {
        $categories = $this->category->findAllCategory();
        include "App/View/viewCategory.php";
    }

    public function addCategory()
    {
        //Message d'erreur ou confirmation
        $message = "";
        //Tester si le formulaire est soumis
        if (isset($_POST['submit'])) {
            if (!empty($_POST['name'])) {
                //nettoyer les informations
                $name = Utilitaire::sanitize($_POST['name']);
                $category = new Category();
                $category->setName($name);
                //tester si la catégorie existe pas
                if (!$category->isCategoryByNameExist()) {
                    $category->saveCategory();
                    header("Location: /TASKS/category/all");
                } else {
                    $message = "La catégorie existe déjà.";
                }
                //Tester si le champ est vide
            } else {
                $message = "Veuillez remplir les champs requis.";
            }
        }
        include "App/View/viewAddCategory.php";
    }

    public function removeCategory()
    {
        $message = "";
        //tester si le formulaire est soumis
        if (isset($_POST['delete'])) {
            //nettoyer les infos
            $id = Utilitaire::sanitize($_POST['id']);
            //Instancier la catégorie
            $category = new Category();
            $category->setidCategory($id);
            //Suppression de la categorie
            if ($category->deleteCategory()) {
                header("Location: /TASKS/category/all");
            } else {
                $message = "Erreur lors de la suppression de la catégorie.";
            }
        }
    }
}
