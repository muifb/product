<?php

namespace MyApp\Config;

class Config
{
    public static function load()
    {
        // Directory root
        define('APPURL', $_ENV['APP_URL']);
        define('BASEURL', $_ENV['APP_URL'] . '/public');
    }
}
