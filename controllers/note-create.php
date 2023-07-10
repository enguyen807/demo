<?php

    $config = require('config.php');
    $db = new Database($config['database']);

    $heading = "Create a Note";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $db->query('INSERT INTO notes (title, user_id) VALUES(:title, :user_id)', [
            'title' => $_POST['title'],
            'user_id' => 2
        ]);
    }

    require 'views/note-create.view.php';