<?php

namespace OC4\Model;
use PDO;

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
        //TODO
    }

    public function login($pseudo, $password)
    {
        //TODO
    }

}