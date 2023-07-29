<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        $this->login([
            'email' => $email
        ]);

        return true;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
    }

    public function logout()
    {
        Session::destroy();
    }
}
