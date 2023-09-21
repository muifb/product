<?php

use Dotenv\Dotenv;
use MyApp\Config\Config;

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/helpers/Autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
Config::load();
