<?php

namespace App\Controllers;

class MovieController
{
    public function index(): void
    {
        include APP_PATH.'/views/pages/movies.php';
    }
}
