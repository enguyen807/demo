<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attr = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$isAuth = (new Authenticator)->attempt($attr['email'], $attr['password']);

if (!$isAuth) {
    $form
        ->setError('email', 'Incorrect username or password.')
        ->throw();
}

\redirect('/');