<?php

$root = $_SERVER['DOCUMENT_ROOT'];
//Ne pas oublier de supprimer le OC-Project-4 lors de la mise en ligne du site.
$host = $_SERVER['HTTP_HOST'].'/OC-Project-4';

define('DB_HOST', 'localhost');
define('DB_NAME', 'oc4');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'PASSWORD');

define('HOST', 'http://'.$host.'/');
define('ROOT', $root.'/');

define('CONTROLLER', ROOT.'OC-Project-4/'.'controller/');
define('MODEL', ROOT.'OC-Project-4/'.'model/');
define('VIEW', ROOT.'OC-Project-4/'.'view/');
define('CLASSE', ROOT.'OC-Project-4/'.'class/');

define('PUBLICS', HOST.'public/');
