<?php

spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    $className = end($parts);
    $modelFile = 'models/' . $className . '.php';
    if (file_exists($modelFile)) {
        require_once $modelFile;
        return;
    }
    $controllerFile = 'controllers/' . $className . '.php';
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        return;
    }
});
?>

