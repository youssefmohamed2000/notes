<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$current_user_id = $_SESSION['user']['id'];

$query = 'SELECT * FROM notes WHERE id = :id';

$note = $db->query($query, ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $current_user_id);

$query = 'DELETE FROM notes WHERE id = :id';

$db->query($query, ['id' => $_POST['id']]);

header('Location: /notes');

exit();
