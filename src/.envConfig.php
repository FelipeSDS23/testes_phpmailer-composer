<?php
    require '../vendor/autoload.php';

    USE Dotenv\Dotenv;
    USE app\core\App;

    $path = dirname(__FILE__, 2);

    $dotenv = Dotenv::createUnsafeImmutable($path);
    $dotenv->load();