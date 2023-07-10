<?php

    $config = require('config.php');
    $db = new Database($config['database']);

    $heading = "Create a Note";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = [];

        if (strlen($_POST['title']) === 0) {
            $errors['title'] = 'Note cannot be empty';
        }

        if (strlen($_POST['title']) > 500) {
            $errors['title'] = 'Note cannot be more than 500 characters.';
        }

        if (empty($errors)) {
            $db->query('INSERT INTO notes (title, user_id) VALUES(:title, :user_id)', [
                'title' => $_POST['title'],
                'user_id' => 2
            ]);
        }

    }

    require 'views/note-create.view.php';