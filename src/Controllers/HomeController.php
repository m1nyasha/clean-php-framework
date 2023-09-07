<?php

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        include APP_PATH.'/views/pages/home.php';
    }
}
