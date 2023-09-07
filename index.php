<?php

require_once __DIR__.'/vendor/autoload.php';

$routes = require __DIR__.'/config/routes.php';

$uri = ltrim($_SERVER['REQUEST_URI'], '/');

$routes[$uri]();
