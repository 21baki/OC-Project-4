<?php
abstract class Manager {
    protected $dbh;

    public function __construct() { //Allows to call the db from the init
        $this->dbh = new PDO('mysql:host=localhost;dbname=oc4', 'root', '');
    }

    public abstract function getEntityName();
}