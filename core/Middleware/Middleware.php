<?php

namespace Core\Middleware;

class Middleware 
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key) 
    {
        if (!$key) {
            return;
        }

        if (!array_key_exists($key, static::MAP)) {
            throw new \Exception("No matching middleware found for '{$key}'.");
        }

        $middleware = static::MAP[$key];
        (new $middleware)->handle();
    }
}