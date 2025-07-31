<?php
namespace App\Controller;

use App\Model\User;
use App\Utils\Utilitaire;

class UserController 
{
    // Attributs
    private User $user;

    public function __construct()
    {
        //injection de dépendance
        $this->user = new User();
    }

    public function register() {
        $message = "";
        //Tester si le formulaire est soumis
        if (isset($_POST['submit'])) {
            if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
                //Nettoyage
                $firstname = Utilitaire::sanitize($_POST["firstname"]);
                $lastname = Utilitaire::sanitize($_POST["lastname"]);
                $email = Utilitaire::sanitize($_POST["email"]);
                $password = Utilitaire::sanitize($_POST["password"]);
                
                //Création de l'user
                $this->user->setFirstname($firstname);
                $this->user->setLastName($lastname);
                $this->user->setEmail($email);
                $this->user->setPassword(password_hash($password, PASSWORD_DEFAULT));
                //tester si l'email existe pas
                if (!$this->user->isEmailExist()) {
                    $this->user->saveUser();
                    $message = "Inscription réussie.";
                } else {
                    $message = "L'email existe déjà.";
                }
            } else {
                $message = "Veuillez remplir les champs requis.";
            }
        }
        include "App/View/viewSaveUser.php";
    }
}