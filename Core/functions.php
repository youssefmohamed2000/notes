<?php

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

function login($user)
{
  $_SESSION['user'] = [
    'name' => $user['name'],
    'email' => $user['email'],
  ];

  session_regenerate_id(true);
} // end of login

function logout()
{
  $_SESSION = [];

  session_destroy();

  $params = session_get_cookie_params();

  setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
} // end of logout

function auth()
{
  if (!isset($_SESSION['user'])) {
    return false;
  }

  return true;
} // end of auth
