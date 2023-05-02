<?php

spl_autoload_register(function ($calss) {

  $calss = str_replace('\\', DIRECTORY_SEPARATOR, $calss);
  require_once basePath($calss . '.php');
});
