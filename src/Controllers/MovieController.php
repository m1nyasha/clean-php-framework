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
        $image = $this->request()->file('image');

        dd($image->move('movies'));

        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
        ]);

        if (! $validation) {
            $this->session()->set('errors', $this->request()->errors());
            $this->redirect('/admin/movies/create');
        }

        $id = $this->db()->insert('movies', [
            'name' => $this->request()->input('name'),
        ]);

        dd("Фильм с ID $id успешно добавлен");
    }
}
