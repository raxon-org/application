<?php

namespace Application;

class Composer
{

    public static function update(): void
    {
        echo 'Updating application, please wait...' . PHP_EOL;
        if(!File::exist('/usr/bin/microstorm')){
            echo 'Creating binary...' . PHP_EOL;
            ddd('where is the binary create?');
        }
    }

}