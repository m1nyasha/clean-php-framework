<?php

return [
    '/home' => function () {
        include __DIR__.'/../views/pages/home.php';
    },
    '/movies' => function () {
        include __DIR__.'/../views/pages/movies.php';
    }
];
