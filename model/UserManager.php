<?php

require_once('Manager.php');

class UserManager extends Manager {

    //two functions that inherit from Manager
    public function __construct()
    {
        parent::__construct();
    }

    public function getEntityName()
    {
        return "UserManager";
    }

    public function register($pseudo, $password, $email)
    {
        $dbh = $this->dbh;

        $query = 'INSERT INTO users(pseudo, password, email, role) VALUES(:pseudo, :password, :email, :role)';

        $req = $dbh->prepare($query);
        $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam('password', $password, PDO::PARAM_STR);
        $req->bindParam('email', $email, PDO::PARAM_STR);
        $role = 'user';
        $req->bindParam('role', $role, PDO::PARAM_STR);

        $req->execute();
    }

    public function login($pseudo, $password)
    {
        $dbh = $this->dbh;

        $query = 'SELECT pseudo, password, role FROM users WHERE pseudo = :pseudo';

        $req = $dbh->prepare($query);
        $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $user = new User();

        if($data != '') {
            $user->hydrate($data);
        }

        return $user;
    }

    public function verify($pseudo, $email)
    {
        $dbh = $this->dbh;

        $query = 'SELECT * FROM users WHERE pseudo = :pseudo OR email = :email';

        $req = $dbh->prepare($query);
        $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam('email', $email, PDO::PARAM_STR);

        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);

        $user = new User();

        if($data != '') {
            $user->hydrate($data);
            if($user->getPseudo() === $pseudo) {
                        //TODO
                $user->setErrorPseudo('Le pseudo est déja pris. Merci d\'en choisir un autre.');
            }
            if($user->getEmail() === $email) {
                        //TODO
                $user->setErrorEmail('L\'email est déja pris. Merci d\'en choisir un autre.');
            }

            return $user;
        }


    }
}
