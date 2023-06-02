<?php

use Core\App;
use Core\Database;
use Http\Forms\FormValidation;

$db = App::resolve(Database::class);

// validation 
$validator = FormValidation::validate([
  'body' => $_POST['body'],
]);


$db->query(
  'INSERT INTO notes (body , user_id) VALUES (:body , :user_id)',
  [
    'body' => $_POST['body'],
    'user_id' => $_SESSION['user']['id'],
  ]
);

header('Location: /notes');
exit();
