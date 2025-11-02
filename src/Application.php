<?php // src/Application.php

namespace Framework;

use Psr\Log\LoggerInterface;

class Application {
    public function run(): string {
        $container = new Container();
        $container->set(LoggerInterface::class, fn() => new FileLogger());
        
        $path =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        $router = new Router();
        $callable = $router->getController($path);
        
        return new Injector($container)->call($callable);
    }
}