<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class MovieController extends Controller
{
    public function index(): void
    {
        $this->view('movies');
    }

    public function create(): void
    {
        $this->view('admin/movies/create');
    }
}
