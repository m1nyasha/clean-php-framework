<?php

namespace App\Kernel\Config;

class Config implements ConfigInterface
{
    public function get(string $key, $default = null): mixed
    {
        [$config, $param] = explode('.', $key);

        $config = require_once APP_PATH."/config/$config.php";

        return $config[$param] ?? $default;
    }
}
