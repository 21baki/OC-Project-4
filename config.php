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
        //Ne pas oublier de supprimer le OC-Project-4 lors de la mise en ligne du site.
        $host = $_SERVER['HTTP_HOST'].'/OC-Project-4';

        define('HOST', 'http://'.$host.'/');
        define('ROOT', $root.'/');

        define('CONTROLLER', ROOT.'OC-Project-4/'.'controller/');
        define('MODEL', ROOT.'OC-Project-4/'.'model/');
        define('VIEW', ROOT.'OC-Project-4/'.'view/');
        define('CLASSE', ROOT.'OC-Project-4/'.'class/');

        define('PUBLICS', HOST.'public/');

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
        } elseif(file_exists(VIEW.$class.'.php')) {
            include_once(VIEW.$class.'.php');
        }

    }

}
