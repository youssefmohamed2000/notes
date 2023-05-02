<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$current_user_id = 1; // hard code until authentication

$query = 'SELECT notes.* , users.name AS username
            FROM notes  
            INNER JOIN users
            ON notes.user_id = users.id';

$notes = $db->query($query)->all();
$resultCount = count($notes);

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$resulPerPage = 3;
$pageFirstResult = ($page - 1) * $resulPerPage;

$numberOfPages = ceil($resultCount / $resulPerPage);

$query .= " LIMIT " . $pageFirstResult . ',' . $resulPerPage;

$notes = $db->query($query)->all();

view('notes/index.view.php', [
  'notes' => $notes,
  'numberOfPages' => $numberOfPages,
  'page_number' => $_GET['page'] ?? 1,
]);
