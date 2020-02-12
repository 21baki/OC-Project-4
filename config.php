<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

class MyAutoload
{
    public static function start()
    {
        session_start();

        spl_autoload_register(array(__CLASS__, 'autoload'));

    }

    public static function autoload($class)
    {
       $paths = [MODEL, CLASSE, CONTROLLER, VIEW];

       foreach ($paths as $p) {
           if (file_exists($p.$class.'.php')) {
               include $p.$class.'.php';
               return true;
           }
       }
       return false;


        /* if(file_exists(MODEL.$class.'.php')) {
            include_once(MODEL.$class.'.php');
        } elseif(file_exists(CLASSE.$class.'.php')) {
            include_once(CLASSE.$class.'.php');
        } elseif(file_exists(CONTROLLER.$class.'.php')) {
           include_once(CONTROLLER.$class.'.php');
        } elseif(file_exists(VIEW.$class.'.php')) {
            include_once(VIEW.$class.'.php');
        } */

    }
}
