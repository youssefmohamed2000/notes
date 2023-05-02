<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$current_user_id = 2;

$query = "SELECT notes.* , users.name AS username
						FROM notes 
						INNER JOIN users 
						ON notes.user_id = users.id 
						where notes.user_id = {$current_user_id}";

$notes = $db->query($query)->all();

authorize($notes[0]['user_id'] === $current_user_id);

view('notes/show.view.php', [
	'notes' => $notes,
]);
