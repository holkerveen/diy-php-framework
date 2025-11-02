<?php
// src/Router.php

namespace Framework;

use Closure;
use Framework\Attributes\Route;
use ReflectionClass;
use ReflectionMethod;

class Router
{
    private array $routes = [];

    public function __construct()
    {
        $controllerFiles = glob(__DIR__ . '/Controllers/*.php');

        foreach ($controllerFiles as $file) {
            $className = 'Framework\\Controllers\\' . basename($file, '.php');

            foreach (new ReflectionClass($className)->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                $attributes = $method->getAttributes(Route::class);

                foreach ($attributes as $attribute) {
                    $route = $attribute->newInstance();

                    $this->routes[$route->path] = [
                        'controller' => $className,
                        'method' => $method->getName(),
                    ];
                }
            }
        }
    }

    public function getController(string $path): Closure
    {
        $route = $this->routes[$path];
        return Closure::fromCallable([new $route['controller'](), $route['method']]);
    }
}

