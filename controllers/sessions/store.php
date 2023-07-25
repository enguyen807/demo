<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password  .';
}

if (!empty($errors)) {
    return view('sessions/create', [
        'errors' => $errors
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