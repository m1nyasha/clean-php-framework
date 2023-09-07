<?php

namespace App\Controllers;

use App\Kernel\View\View;

class HomeController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function index(): void
    {
        $this->view->page('home');
    }
}
