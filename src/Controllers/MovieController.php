<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\Validator\Validator;

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
        $validator = new Validator();

        $validator->validate(['name' => null], ['name' => ['required', 'min:3']]);

        dd($validator->errors());

        dd($this->request()->input('name'));
    }
}
