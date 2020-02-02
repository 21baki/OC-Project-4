<?php

include_once ('config.php');

MyAutoload::start();

(isset($_GET['r'])) ? $request = $_GET['r'] : $request = 'index';

$router = new Router($request);
$router->renderController();

