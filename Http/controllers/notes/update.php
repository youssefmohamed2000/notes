<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$current_user_id = $_SESSION['user']['id'];

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $_POST['id']]
)->findOrFail();

authorize($note['user_id'] === $current_user_id);


$errors = [];

if (!Validator::string($_POST['body'], 2, 225)) {
    $errors['body']
        = 'A Body is can not be more than 255 characters or less than 3 characters';
}

if (!empty($errors)) {
    view('notes/edit.view.php', [
        'errors' => $errors,
        'note' => $note,
    ]);

    exit();
}

$db->query(
    'UPDATE notes set body = :body WHERE id = :id',
    [
        'id' => $_POST['id'],
        'body' => $_POST['body']
    ]
);

header('Location: /notes');
exit();
