<?php

class UserSession
{
    public function __construct()
    {
        if(!isset($_SESSION['userSession'])) {
            $_SESSION['userSession']['pseudo'] = null;
            $_SESSION['userSession']['role'] = 'visiteur';
        }
        $this->hydrate($_SESSION['userSession']);
    }

    public function hydrate($datas)
    {
        $userSession = $_SESSION['userSession'];

        $this->setPseudo($userSession['pseudo']);
        $this->setRole($userSession['role']);
    }

    public function logged()
    {
        if($_SESSION['userSession']['role'] === 'visiteur') {
            return false;
        } else {
            return true;
        }
    }

    public function noRole($role)
    {
        if($role != $this->getRole()) {
            return true;
        } else {
            return false;
        }
    }

    public function hasRole($role)
    {
       if($role != $this->getRole()) {
           return false;
       } else {
           return true;
       }
    }

    public function getPseudo()
    {
        return $_SESSION['userSession']['pseudo'];
    }

    public function setPseudo($pseudo)
    {
        $_SESSION['userSession']['pseudo'] = $pseudo;

        return $this;
    }

    public function getRole()
    {
        return $_SESSION['userSession']['role'];
    }

    public function setRole($role)
    {
        $_SESSION['userSession']['role'] = $role;

        return $this;
    }
}
