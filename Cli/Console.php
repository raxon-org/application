<?php
require_once dirname(__DIR__) .
    DIRECTORY_SEPARATOR .
    '..' .
    DIRECTORY_SEPARATOR .
    'vendor/autoload.php';
//ignore_user_abort(true);
define('MICROSTORM', microtime(true));
$app = require dirname(__DIR__) . '/src/Application.php';
echo 'Happy Console...' . PHP_EOL;
d($app);