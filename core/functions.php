<?php

function dd($value) 
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs(string $value) 
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort(int $status = 404) 
{
    http_response_code($status);

    require base_path("views/{$status}.view.php");

    die();
}

function authorize(bool $condition, int $status = Core\Response::FORBIDDEN) 
{
    if (!$condition) {
        abort($status);
    }

    return true;
}

function base_path($path) 
{
    return BASE_PATH . $path;
}

function view($path, $attr = [])
{
    extract($attr);
    require base_path("views/{$path}.view.php");
}