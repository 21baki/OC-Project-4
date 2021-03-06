<?php

require_once('Manager.php');

class UserManager extends Manager {

    /**
     * UserManager constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getEntityName()
    {
        return "UserManager";
    }

    /**
     * @param $pseudo
     * @param $password
     * @param $email
     */
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

    /**
     * @param $pseudo
     * @return bool|User
     */
    public function checkPseudoForLogin($pseudo)
    {
    $dbh = $this->dbh;

    $query = 'SELECT * FROM users WHERE pseudo = :pseudo';

    $req = $dbh->prepare($query);
    $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
    $req->execute();
    $user = new User();
    //TODO: Faire une condition
    $data = $req->fetch();

    if($data) {
        $user->hydrate($data);
    } else {
        return false;
    }

    return $user;
    }

    /**
     * @param $pseudo
     * @param $email
     * @return User
     */
    public function verify($pseudo, $email)
    {
        $dbh = $this->dbh;

        $query = 'SELECT * FROM users WHERE pseudo = :pseudo AND email = :email';

        $req = $dbh->prepare($query);

        $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam('email', $email, PDO::PARAM_STR);


        $req->execute();


        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $user = new User();

        if($data != '') {
            $user->hydrate($data);
            if($user->getPseudo() === $pseudo) {

                $user->setErrorsPseudo('Le pseudo est déja pris. Merci d\'en choisir un autre.');
            }
            if($user->getEmail() === $email) {

                $user->setErrorsMail('L\'email est déja pris. Merci d\'en choisir un autre.');
            }

            return $user;

        }

    }
}
