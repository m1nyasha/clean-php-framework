<?php

use App\App;

define('APP_PATH', __DIR__);

require_once APP_PATH.'/vendor/autoload.php';

$app = new App();

$app->run();
