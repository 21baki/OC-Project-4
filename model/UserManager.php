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

        /*$data = $req->fetchAll(PDO::FETCH_ASSOC);

       $user = new User();

       if($data != '') {
           $user->hydrate($data);
       } */
        return $req->fetchAll();
    }

    public function verify($pseudo, $Hugo12)
    {
        $dbh = $this->dbh;

        $query = 'SELECT * FROM users WHERE password = :password';

        $req = $dbh->prepare($query);
        $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam('Hugo12', $Hugo12, PDO::PARAM_STR);

        $req->execute();

        var_dump($pseudo);

        $data = $req->fetchAll(PDO::FETCH_ASSOC);



        $user = new User();

        if($data != '') {
            $user->hydrate($data);
            if($user->getPseudo() === $pseudo) {

                $user->setErrorsPseudo('Le pseudo est déja pris. Merci d\'en choisir un autre.');
            }
            if($user->getEmail() === $email) {
                        //TODO
                $user->setErrorsMail('L\'email est déja pris. Merci d\'en choisir un autre.');
            }

            var_dump($data);

            return $user;

        }


    }
}
