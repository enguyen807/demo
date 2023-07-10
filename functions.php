<?php

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs(string $value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort(int $status = 404) {
    http_response_code($status);

    require "controllers/{$status}.php";

    die();
}