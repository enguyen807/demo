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

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters.';
}

if (!empty($errors)) {
    return view('registration/create', [
        'errors' => $errors
    ]);
}

// Check if account already exists

$user = $db->query('SELECT * FROM users where email = :email', [
    'email' => $email
])->find();

// dd($result);
if ($user) {
    return view('registration/create', [
        'errors' => [
            'email' => 'Email has already been registered!'
        ]
    ]);
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    login($user);

    header('location: /');
    exit();
}
