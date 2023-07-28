<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUserId = 2;

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show", [
    "heading" => "My Note",
    "note" => $note
]);
