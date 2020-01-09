<?php

use OC4\Model;

class Router
{

    private $ctrl;

    public function routeReq()
    {

        require_once('controller/ControllerHome.php');

    }
}
