<?php
// src/Controllers/DashboardController.php

namespace Framework\Controllers;

use Framework\Attributes\Route;

class DashboardController
{
    #[Route('/')]
    public function index(): string
    {
        return "Welcome to Dashboard!";
    }

}