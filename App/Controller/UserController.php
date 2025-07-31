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

    public function register()
    {
        $message = "";
        //Tester si le formulaire est soumis
        if (isset($_POST['submit'])) {
            if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
                //Nettoyage
                $email = Utilitaire::sanitize($_POST["email"]);
                //Création de l'user
                $this->user->setEmail($email);
                //tester si l'email existe pas
                if (!$this->user->isEmailExist()) {
                    $firstname = Utilitaire::sanitize($_POST["firstname"]);
                    $lastname = Utilitaire::sanitize($_POST["lastname"]);
                    $password = Utilitaire::sanitize($_POST["password"]);
                    $this->user->setFirstname($firstname);
                    $this->user->setLastName($lastname);
                    $this->user->setPassword(password_hash($password, PASSWORD_DEFAULT));
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

    public function login()
    {
        $message ="";
        if (isset($_POST["submit"])) {
            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $email = Utilitaire::sanitize($_POST["email"]);
                $password = Utilitaire::sanitize($_POST["password"]);
                $this->user->setEmail($email);
                //Vérifier si l'email existe
                if ($this->user->isEmailExist()) {
                    //Récupérer l'utilisateur
                    $user = $this->user->findUserByEmail();
                    //Vérifier le mot de passe
                    if (password_verify($password, $user->getPassword())) {
                        $_SESSION['user'] = $user;
                        header("Location: " . BASE_URL);
                        exit();
                    } else {
                        $message ="Mot de passe incorrect.";
                    }
                } else {
                    $message ="L'email n'existe pas.";
                }
            } else {
                $message = "Veuillez remplir les champs requis.";
            }
        }
        include "App/View/viewConnexion.php";
    }
}
