<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

/*
  $container->bind(Database::class, function () {
    $config = require_once base_path('config.php');
    
    return new Database($config['database']);
  });
*/

App::setContainer($container);

App::bind(Database::class, function () {
  $config = require_once basePath('config.php');

  return new Database($config['database']);
});
