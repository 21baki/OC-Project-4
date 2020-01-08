<?php

use OC4\Model\PostManager;

class Router
{

    private $ctrl;

    public function routeReq()
    {


        try
        {
            //Class Autoload
            spl_autoload_register(function($class) {
            require_once($class.'php');
        });

        $url='';

        if(isset($_GET['url'])) //isset() -> Determine if a variable is declared and is different than null
        {
            //explode() -> Split a string by a string
            $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
            //strltolower() -> Other letter in lower case IN ucfirst() -> First letter in uppercase
            $controller = ucfirst(strtolower($url[0]));
            $controllerClass = 'Controller'.$controller;
            $controllerFile = 'controller/'.$controllerClass.'.php';

            if(file_exists($controllerFile))
            {
               require_once($controllerFile);
               $this->ctrl = new $controllerClass($url);
            }
            else
            {
                throw new Exception('Page introuvable');
            }
        }
        else
        {
           require_once('controller/ControllerHome.php');
           $this->ctrl = new ControllerHome($url);
        }

        }
        catch(Exception $exception)
        {
            $errorMsg = $exception->getMessage();
            //TODO: view/viewError
        }
    }
}