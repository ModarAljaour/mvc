<?php
require_once __DIR__ . '/lib/DB/MysqliDb.php';
spl_autoload_register(
    function ($className) {
        if (file_exists("$className.php")) {
            require str_replace('\\', '/', $className) . ".php";
        }
    }
);

// Namespace
// use config\config;
use app\models\UserModel;
use app\controllers\UserController;

// ... Path
$request =  $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/mvc/');

// ... Connection with DB 
$config = require 'config/config.php';
$db = new MysqliDb(
    $config['host'],
    $config['username'],
    $config['pass'],
    $config['db']
);

// ...  Use classes
$model = new UserModel($db);
$controller = new UserController($model);


switch ($request) {
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH . 'add':
        $controller->addUser();
        break;
    case BASE_PATH . 'show?id=' . $_GET["id"]:
        $controller->getUserByID();
        break;
    case BASE_PATH . 'update?id=' . $_GET["id"]:
        $controller->updateUser();
        break;
    case BASE_PATH . 'delete?id=' . $_GET["id"]:
        $controller->deleteUser();
        break;
}
