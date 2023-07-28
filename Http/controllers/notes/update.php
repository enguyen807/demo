<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$currentUserId = 2;

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['_id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['title'], 1, 500)) {
    $errors['title'] = 'A body of no more than 500 characters is required.';
}

if (!empty($errors)) {
    return view("notes/edit", [
        "heading" => "Edit a note",
        "errors" => $errors
    ]);
}

$db->query('UPDATE notes SET title = :title WHERE id = :id', [
    'id' => $_POST['_id'],
    'title' => $_POST['title']
]);

header('location: /notes');
die();
