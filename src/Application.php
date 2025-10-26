<?php // src/Application.php

namespace Framework;

class Application {
    public function run(): string {
        $path =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        $router = new Router();
        $callable = $router->getController($path);
        
        return $callable();
    }
}