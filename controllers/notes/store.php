<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$errors = [];

if (!Validator::string($_POST['body'], 2, 225)) {
  $errors['body']
    = 'A Body is can not be more than 255 characters or less than 3 characters';
}

if (!empty($errors)) {
  // view('notes/create.view.php', [
  //   'errors' => $errors,
  // ]);
  echo '<script>
          window.history.back(-1);
        </script>';

  exit();
}

$db->query(
  'INSERT INTO notes (body , user_id) VALUES (:body , :user_id)',
  [
    'body' => $_POST['body'],
    'user_id' => 1,
  ]
);

header('Location: /notes');
exit();
