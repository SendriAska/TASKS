<?php

namespace App\Model;

use App\Utils\Database;

class Category
{
    //Attributs
    private int $idCategory;
    private string $name;
    //BDD
    private \PDO $bdd;

    //Constructeur
    public function __construct()
    {
        $this->bdd = (new Database())->connectBDD();
    }

    //Getters Setters
    public function getidCategory(): int
    {
        return $this->idCategory;
    }
    public function setidCategory(int $idCategory): void
    {
        $this->idCategory = $idCategory;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // Methodes
    public function saveCategory(): void
    {
        try {
            $name = $this->name;

            $request = "INSERT INTO category(`name`) VALUES (?)";
            //Ecrire toutes les étapes de la requêtes 
            //1 préparer la requête
            $req = $this->bdd->prepare($request);
            //2 Bind les paramètres
            $req->bindParam(1, $name, \PDO::PARAM_STR);
            //3 executer la requête
            $req->execute();

            //Capture des erreurs 
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    // Methode pour trouver toutes les catégories
    public function findAllCategory(): array
    {
        try {
            $request = "SELECT id_category AS idCategory, `name` FROM category ORDER BY id_category ASC";
            $req = $this->bdd->prepare($request);
            $req->execute();
            $category =  $req->fetchAll(\PDO::FETCH_CLASS, Category::class);
            return $category;
        } catch (\Exception $e) {
            $e->getMessage();
            return [$e->getMessage()];
        }
    }


    //Methode qui retourne vraie si la catégorie existe, et qui retoourne faux si elle n'existe pas 
    public function isCategoryByNameExist() {
        try {
            $name = $this->name;
            $request = "SELECT id_category FROM category AS c WHERE c.name = ?";
            $req = $this->bdd->prepare($request);
            $req->bindParam(1, $name, \PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            if (empty($data)) {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    //Methode pour supprimer une catégorie
    public function deleteCategory(int $id)
    {
        try 
        {
            // $id = $this->idCategory;
            $request = "DELETE FROM category WHERE id_category = ?";
            $req = $this->bdd->prepare($request);
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
