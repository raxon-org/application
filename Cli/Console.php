<?php
define('MICROSTORM', microtime(true));
require_once dirname(__DIR__) . '/vendor/autoload.php';
$app = require dirname(__DIR__) . '/src/Application.php';
echo $app->run($_SERVER, $_FILES, $_COOKIE);
//ignore_user_abort(true);