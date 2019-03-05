<?php
include("../config/config.php");
include("../lib/Autoloader.php");
spl_autoload_register([new \app\lib\Autoloader(), 'loadClass']);

include '../templates/Twig/Autoloader.php';
Twig_Autoloader::register();

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

if (isset($_GET['c'])) {
    $controllerName = '\app\controller\C_' . ucfirst($_GET['c']);
} else {
    $controllerName = '\app\controller\C_Page';
}

$id = (isset($_GET['id'])) ? (int)$_GET['id'] : '';

$controller = new $controllerName($id);

$controller->$action();
