<?php
// src/Controllers/DashboardController.php

namespace Framework\Controllers;

use Framework\Attributes\Route;
use Psr\Log\LoggerInterface;

class DashboardController
{
    #[Route('/')]
    public function index(LoggerInterface $logger): string
    {
        $logger->info('Cool!', ["file"=>__FILE__]);
        return "Welcome to Dashboard!";
    }

}