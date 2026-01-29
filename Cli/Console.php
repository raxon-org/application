<?php
define('MICROSTORM', microtime(true));
require_once dirname(__DIR__) . '/vendor/autoload.php';
$app = require dirname(__DIR__) . '/src/Application.php';
echo 'Happy Console...' . PHP_EOL;
d($app);
//ignore_user_abort(true);