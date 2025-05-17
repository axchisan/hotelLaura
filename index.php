<?php
session_start();

require_once 'config/config.php';
require_once 'config/Database.php';
require_once 'autoload.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = 'controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controllerName();
    
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        header('Location: index.php?controller=error&action=notFound');
    }
} else {
    header('Location: index.php?controller=error&action=notFound');
}
?>

