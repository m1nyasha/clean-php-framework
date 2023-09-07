<?php

define('APP_PATH', __DIR__);

require_once APP_PATH.'/vendor/autoload.php';

$routes = require APP_PATH.'/config/routes.php';

$uri = $_SERVER['REQUEST_URI'];

$routes[$uri]();
