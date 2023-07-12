<?php

    require('Validator.php'); 
    $config = require('config.php');

    $db = new Database($config['database']);

    $heading = "Create a Note";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = [];

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

    require 'views/notes/create.view.php';