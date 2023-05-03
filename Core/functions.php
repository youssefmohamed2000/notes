<?php

use Core\Session;

function dd($value)
{

  echo '<pre>';

  var_dump($value);

  echo '</pre>';

  die();
} // end of dd

function abort($code = 404)
{
  http_response_code($code);

  if ($code === 403) {
    echo 'you are not authorized to this page';
  } else {
    echo 'Page Not exist';
  }

  die();
} // end of abort 

function authorize($condition, $status = 403)
{

  if (!$condition) {
    abort($status);
  }

  return true;
} // end of authorize

function basePath($path)
{
  return BASE_PATH . DS . $path;
} // end of basePath
function assets($path)
{
  return 'http://localhost/new-notes/public/' . $path;
} // end of basePath

function view($path, $attributes = [])
{
  extract($attributes);

  require_once basePath('views' . DS . $path);
} // end of view

function auth()
{
  if (!isset($_SESSION['user'])) {
    return false;
  }

  return true;
} // end of auth

function redirect($path)
{
  header("location: {$path}");
  exit();
} // end of redirect

function old($key, $default = '')
{
  return Session::get('old')[$key] ?? $default;
} // end of old