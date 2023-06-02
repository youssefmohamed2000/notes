<?php

use Core\App;
use Core\Database;
use Http\Forms\FormValidation;

// validation 
$validator = FormValidation::validate([
    'body' => $_POST['body']
]);


$db = App::resolve(Database::class);

$current_user_id = $_SESSION['user']['id'];

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $_POST['id']]
)->findOrFail();

authorize($note['user_id'] === $current_user_id);



$db->query(
    'UPDATE notes set body = :body WHERE id = :id',
    [
        'id' => $_POST['id'],
        'body' => $_POST['body']
    ]
);

header('Location: /notes');
exit();
