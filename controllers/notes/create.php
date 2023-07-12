<?php

    require base_path('Validator.php'); 
    $config = require base_path('config.php');
    $db = new Database($config['database']);

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!Validator::string($_POST['title'], 1, 500)) {
            $errors['title'] = 'A body of no more than 500 characters is required.';
        }

        if (empty($errors)) {
            $db->query('INSERT INTO notes (title, user_id) VALUES(:title, :user_id)', [
                'title' => $_POST['title'],
                'user_id' => 2
            ]);
        }

    }

    view("notes/create", [
        "heading" => "Create a note",
        "errors" => $errors
    ]);