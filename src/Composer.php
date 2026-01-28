<?php

namespace Application;
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Debug.php';
use Module\File;

class Composer
{

    public static function update(): void
    {
        echo 'Updating application, please wait...' . PHP_EOL;
        echo 'Starting Frankenphp...' . PHP_EOL;
//        exec("frankenphp run --config /Application/Caddyfile &", $output, $code);
//        echo 'Frankenphp exited with code ' . $code . PHP_EOL;
//        d($output);
        if(!File::exist('/usr/bin/microstorm')){
            echo 'Creating binary...' . PHP_EOL;
            ddd('where is the binary create?');
        }
    }

}