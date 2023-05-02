<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validation 
$errors = [];

if (!Validator::email($email)) {
  $errors['email'] = 'email is invalid';
}

if (!Validator::string($password, 6, 255)) {
  $errors['password'] = 'password is invalid';
}

if (!empty($errors)) {
  return view('session/create.view.php', [
    'errors' => $errors
  ]);
}

// check if user exist 

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email,
])->find();

if ($user) {
  // check password 

  if (!password_verify($password, $user['password'])) {
    login([
      'name' => $user['name'],
      'email' => $user['email']
    ]);

    header('location: /');

    exit();
  }
}

return view('session/create.view.php', [
  'errors' => [
    'email' => 'these credentials doesn\'t match our records'
  ]
]);
