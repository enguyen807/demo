<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    return view('sessions/create', [
        'errors' => $form->getErrors()
    ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if (!$user || !password_verify($password, $user['password'])) {
    return view('sessions/create', [
        'errors' => [
            'email' => 'Incorrect username or password.'
        ]
    ]);
}

login([
    'email' => $email
]);
header('location: /');
exit();