<?php

use Core\App;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];



// validation 
$errors = [];
if (!Validator::string($name, 2, 255)) {
  $errors['name'] = 'name must be more than 2 characters and less than 255';
}

if (!Validator::email($email)) {
  $errors['email'] = 'email is invalid';
}

if (!Validator::string($password, 6, 255)) {
  $errors['password'] = 'password must be more than 6 characters and less than 255';
}

if ($password !== $password_confirmation) {
  $errors['password_confirmation'] = 'confirm password is not identical to password';
}

if (!empty($errors)) {
  return view('registration/create.view.php', [
    'errors' => $errors
  ]);
}
// check if email exists 

$db = App::resolve(Database::class);

$user = $db->query('SELECT * from users WHERE email = :email', [
  'email' => $email
])->find();

if ($user) {
  $errors['email'] = 'email is already exist';
  return view(
    'registration/create.view.php',
    ['errors', $errors]
  );
} else {

  // create new user
  $db->query('INSERT INTO users (name , email , password) VALUES(:name , :email , :password)', [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
  ]);

  $user = $db->query('SELECT id FROM users WHERE email = :email', [
    'email' => $email
  ])->find();

  // store user in session
  login([
    'id' => $user['id'],
    'name' => $name,
    'email' => $email
  ]);

  header('location: /');
  exit();
}
