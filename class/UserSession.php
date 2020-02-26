<?php

class UserSession
{
    /**
     * UserSession constructor.
     */
    public function __construct()
    {
        if(!isset($_SESSION['userSession'])) {
            $_SESSION['userSession']['pseudo'] = null;
            $_SESSION['userSession']['role'] = 'visiteur';
        }
        $this->hydrate($_SESSION['userSession']);
    }

    /**
     * @param $datas
     */
    public function hydrate($datas)
    {
        $userSession = $_SESSION['userSession'];

        $this->setPseudo($userSession['pseudo']);
        $this->setRole($userSession['role']);
    }

    /**
     * @return bool
     */
    public function logged()
    {
        if($_SESSION['userSession']['role'] === 'visiteur') {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $role
     * @return bool
     */
    public function noRole($role)
    {
        if($role != $this->getRole()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
       if($role != $this->getRole()) {
           return false;
       } else {
           return true;
       }
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $_SESSION['userSession']['pseudo'];
    }

    /**
     * @param $pseudo
     * @return $this
     */
    public function setPseudo($pseudo)
    {
        $_SESSION['userSession']['pseudo'] = $pseudo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $_SESSION['userSession']['role'];
    }

    /**
     * @param $role
     * @return $this
     */
    public function setRole($role)
    {
        $_SESSION['userSession']['role'] = $role;

        return $this;
    }
}
