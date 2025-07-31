<?php

namespace App\Model;

use App\Utils\Database;

class User
{
    // Attributs
    private int $idUser;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;

    //BDD
    private \PDO $bdd;

    // Contructeur
    public function __construct()
    {
        $this->bdd = (new Database())->connectBDD(); 
    }
    // Getters et Setters
    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdUser(int $idUser): self {
        $this->idUser = $idUser;
        return $this;
    }

    public function getFirstname() {
        return $this->firstname;
    }
    public function setFirstname(string $firstname): self {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname() {
        return $this->lastname;
    }
    public function setLastname(string $lastname): self {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword(string $password): self {
        $this->password = $password;
        return $this;
    }

    // ///////////////////     Methodes       /////////////////////////  // 

    // Methode pour haser le mdp
    public function hashPassword(): void {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    // Methode pour vérifier le mot de passe
    public function verifyPassword(string $hash): bool {
        return password_verify($this->password, $hash);
    }

    // Methode Requete SQL

    public function saveUser(): User {
        try {
            $firstname = $this->firstname;
            $lastname = $this->lastname;
            $email = $this->email;
            $password = $this->password;
            $request = "INSERT INTO users(firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
            $req = $this->bdd;
            $reqSql = $req->prepare($request);
            $reqSql->bindParam(1, $firstname, \PDO::PARAM_STR);
            $reqSql->bindParam(2, $lastname, \PDO::PARAM_STR);
            $reqSql->bindParam(3, $email, \PDO::PARAM_STR);
            $reqSql->bindParam(4, $password, \PDO::PARAM_STR);
            $reqSql->execute();
            $id = $req->lastInsertId('users');
            $this->idUser = $id;
            return $this;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function isEmailExist() {
        try {
            $email = $this->email;
            $request = "SELECT id_users FROM users WHERE email = ?";
            $req = $this->bdd->prepare($request);
            $req->bindParam(1, $email, \PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            if ($data) {
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}