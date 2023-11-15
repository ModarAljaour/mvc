<?php
// mvc
// public/index.php
require_once __DIR__ . '/app/controllers/UserController.php';
require_once __DIR__ . '/app/models/UserModel.php';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/lib/DB/MysqliDb.php';

// Namespace
use UserModel\UserModel;
use UserController\UserController;

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
