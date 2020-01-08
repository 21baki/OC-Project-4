<?php
//Controler loadings
require_once('controller/Router.php');

$router = new Router();
$router->routeReq();

//TODO: Take require() in autoloader
