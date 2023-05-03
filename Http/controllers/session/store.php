<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// validation 
$validator = LoginForm::validate($attributes = [
  'email' => $_POST['email'],
  'password' => $_POST['password']
]);

// check if user exist 
$auth = (new Authenticator)->attempt(
  $attributes['email'],
  $attributes['password']
);

if (!$auth) {

  $validator->error(
    'email',
    'these credentials doesn\'t match our records'
  )
    ->throw();
}

redirect('/');
