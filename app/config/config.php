<?php

namespace MyApp\Config;

use Dotenv\Dotenv;

class Config
{
    public static function load()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();
        // Directory root
        define('APPURL', $_ENV['APP_URL']);
        define('BASEURL', $_ENV['APP_URL'] . '/public');

        // DB
        define('DB_HOST', $_ENV['DB_HOST']);
        define('DB_USER', $_ENV['DB_USERNAME']);
        define('DB_PASS', $_ENV['DB_PASSWORD']);
        define('DB_NAME', $_ENV['DB_DATABASE']);
    }
}
