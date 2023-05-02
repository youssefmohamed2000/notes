<?php

session_start();

use Core\Router;

const DS = DIRECTORY_SEPARATOR;

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . DS . 'Core' . DS . 'functions.php';

require_once basePath('autoload.php');

require_once basePath('bootstrap.php');

$router = new Router();

require_once basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
