<?php

namespace app\core;


use app\core\Application;
use app\core\Database;


require_once __DIR__.'/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$config = [
    'db' =>[
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
 ];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();



?>

