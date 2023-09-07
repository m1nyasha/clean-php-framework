<?php

return [
    '/home' => function () {
        include APP_PATH.'/views/pages/home.php';
    },
    '/movies' => function () {
        include APP_PATH.'/views/pages/movies.php';
    }
];
