<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$current_user_id = $_SESSION['user']['id'];

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $_GET['id']]
)->findOrFail();

authorize($note['user_id'] === $current_user_id);

view('notes/edit.view.php', [
    'note' => $note
]);
