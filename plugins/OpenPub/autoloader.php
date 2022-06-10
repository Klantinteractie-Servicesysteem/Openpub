<?php

namespace KISS\OpenPub;

class Autoloader
{
    /**
     * Autoloader constructor.
     * PSR autoloader.
     */
    public function __construct()
    {
        spl_autoload_register(function (string $className) {
            $baseDir    = __DIR__ . '/src/';
            $namespace  = str_replace('\\', '/', __NAMESPACE__);
            $className  = str_replace('\\', '/', $className);
            $class      = $baseDir . (empty($namespace) ? '' : $namespace . '/') . $className . '.php';
            $class      = str_replace('/KISS/OpenPub/KISS/OpenPub/', '/OpenPub/', $class);

            if (file_exists($class)) {
                require_once $class;
            }
        });
    }
}
