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

    public function store(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
        ]);

        if (! $validation) {
            $this->redirect('/admin/movies/create');
            // dd('Validation failed', $this->request()->errors());
        }

        dd('All good');
    }
}
