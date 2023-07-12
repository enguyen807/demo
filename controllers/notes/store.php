<?php

use Core\Database;
use Core\Validator;

require base_path('core/Validator.php');
$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if (!Validator::string($_POST['title'], 1, 500)) {
    $errors['title'] = 'A body of no more than 500 characters is required.';
}

if (!empty($errors)) {
    return view("notes/create", [
        "heading" => "Create a note",
        "errors" => $errors
    ]);
}

$db->query('INSERT INTO notes (title, user_id) VALUES(:title, :user_id)', [
    'title' => $_POST['title'],
    'user_id' => 2
]);

header('location: /notes');
exit();
