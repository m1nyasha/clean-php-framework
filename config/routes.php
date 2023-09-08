<?php

use App\Controllers\HomeController;
use App\Controllers\MovieController;
use App\Controllers\RegisterController;
use App\Kernel\Router\Route;

return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movies', [MovieController::class, 'index']),
    Route::get('/admin/movies/create', [MovieController::class, 'create']),
    Route::post('/admin/movies/store', [MovieController::class, 'store']),
    Route::get('/register', [RegisterController::class, 'index']),
];
