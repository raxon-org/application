<?php
if(!defined('MICROSTORM')){
    die( 'Forbidden');
}
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Debug.php';
$autoload = require_once dirname(__DIR__) .
    DIRECTORY_SEPARATOR .
    'vendor' .
    DIRECTORY_SEPARATOR .
    'autoload.php'
;
use Microstorm\Application;
return new Application();
