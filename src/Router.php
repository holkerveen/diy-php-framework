<?php
// src/Router.php

namespace Framework;

class Router
{
    public function getController(string $path): callable
    {
        $home = fn() => "Hello World!";
        $test = fn() => "Test route";

        return match ($path) {
            '/' => $home,
            '/test' => $test,
        };
    }
}

