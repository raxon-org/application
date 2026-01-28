<?php

namespace Application;
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Debug.php';

class Composer
{

    public static function binary()
    {
        touch('/usr/bin/microstorm');
    }

    public static function update(): void
    {
        echo 'Updating application, please wait...' . PHP_EOL;
        echo 'Creating binary...' . PHP_EOL;
        Composer::binary();
    }

}