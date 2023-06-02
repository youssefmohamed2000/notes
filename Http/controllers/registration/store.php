<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\FormValidation;

// validation
$validator = FormValidation::validate([
  'name' => $_POST['name'],
  'email' => $_POST['email'],
  'password' => $_POST['password'],
  'password_confirmation' => $_POST['password_confirmation']
]);

// check if email exists 

$db = App::resolve(Database::class);

$user = $db->query('SELECT * from users WHERE email = :email', [
  'email' => $_POST['email']
])->find();

if ($user) {

  $validator->error(
    'email',
    'email is already exist'
  )->throw();
} else {

  // create new user
  $db->query('INSERT INTO users (name , email , password) VALUES(:name , :email , :password)', [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
  ]);

  $user = $db->query('SELECT id FROM users WHERE email = :email', [
    'email' => $_POST['email']
  ])->find();

  // store user in session
  (new Authenticator)->login([
    'id' => $user['id'],
    'name' => $_POST['name'],
    'email' => $_POST['email']
  ]);

  header('location: /');
  exit();
}
