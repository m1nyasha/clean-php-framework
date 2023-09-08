<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->view('login');
    }

    public function login(): void
    {
        $validation = $this->request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (! $validation) {
            $this->session()->set('error', 'Проверьте правильность введенных данных');
            $this->redirect('/login');
        }

        $email = $this->request()->input('email');
        $password = $this->request()->input('password');

        if ($this->auth()->attempt($email, $password)) {
            $this->redirect('/home');
        }

        $this->session()->set('error', 'Проверьте правильность введенных данных');

        $this->redirect('/login');
    }

    public function logout(): void
    {
        $this->auth()->logout();

        $this->redirect('/login');
    }
}
