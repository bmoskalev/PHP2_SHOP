<?php
include("../config/config.php");
include("../lib/Autoloader.php");
spl_autoload_register([new \app\lib\Autoloader(), 'loadClass']);

include '../templates/Twig/Autoloader.php';
Twig_Autoloader::register();
session_start();
if (isset($_GET['act'])&&$_GET['act']!='login'){
    $_SESSION['uri']=$_SERVER['QUERY_STRING'];
}
if (isset($_GET['c'])) {
    $controllerName = '\app\controller\C_' . ucfirst($_GET['c']);
} else {
    $controllerName = '\app\controller\C_Page';
}
$action = 'action_' . ((isset($_GET['act'])) ? $_GET['act'] : 'index');

$id = (isset($_GET['id'])) ? (int)$_GET['id'] : '';

$controller = new $controllerName();

$controller->$action($id);
