<?php

use OC4\Model;

class Router
{

    private $ctrl;

    public function routeReq()
    {
        //var_dump($_GET);
        require_once('controller/ControllerHome.php');

    }
}
