<?php


 //Don't forget use this when class use namespace

abstract class Manager
{
    protected $dbh;

    public function __construct()
    { //Allows to call the db from the init
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=oc4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $pe) {
            echo $pe->getMessage();
        }
    }

    public abstract function getEntityName();

}
