<?php

// http://php.net/manual/en/language.oop5.autoload.php#120258
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', '/', $class);
            require "$file.php";
        });
    }
}

Autoloader::register();