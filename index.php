<?php

include_once ('config.php');

Autoload::start();

(isset($_GET['r'])) ? $request = $_GET['r'] : $request = 'index';

$router = new Router($request);
$router->renderController();

