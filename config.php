<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

class MyAutoload
{
    public static function start()
    {
        session_start();

        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://'.$host.'/');
        define('ROOT', $root.'/');

        define('CONTROLLER', ROOT.'OC-Project-4/'.'controller/');
        define('MODEL', ROOT.'OC-Project-4/'.'model/');
        define('VIEW', ROOT.'OC-Project-4/'.'view/');
        define('CLASSE', ROOT.'OC-Project-4/'.'class/');

        define('PUBLICS', ROOT.'OC-Project-4/'.'public/');

        define('DB_HOST', 'localhost');
        define('DB_NAME', 'oc4');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', 'PASSWORD');
    }

    public static function autoload($class)
    {
        if(file_exists(MODEL.$class.'.php')) {
            include_once(MODEL.$class.'.php');
        } elseif(file_exists(CLASSE.$class.'.php')) {
            include_once(CLASSE.$class.'.php');
        } elseif(file_exists(CONTROLLER.$class.'.php')) {
           include_once(CONTROLLER.$class.'.php');
        }

    }

}
