<?php
// src/Controllers/CommentController.php

namespace Framework\Controllers;

use Framework\Attributes\Route;

class CommentController
{
    #[Route('/comments')]
    public function index(): string
    {
        return "All comments will be listed here!";
    }
}