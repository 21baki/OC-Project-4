<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

class MyAutoload
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));

        session_start();

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://'.$host.'/');
        define('ROOT', $root.'/');

        define('CONTROLLER', ROOT.'controller/');
        define('MODEL', ROOT.'model/');
        define('VIEW', ROOT.'view/');
        define('CLASSE', ROOT.'class/');

        define('PUBLIC', HOST.'public/');

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
