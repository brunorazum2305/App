<?php

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($className)
    {
        $classFile = __DIR__ . '/' . $className . '.php';

        if (file_exists($classFile)) {
            require_once $classFile;
        }
    }
}

?>
