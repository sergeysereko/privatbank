<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdb13f1d052cb93f78c57c8f43d0888f5
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitdb13f1d052cb93f78c57c8f43d0888f5', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdb13f1d052cb93f78c57c8f43d0888f5', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdb13f1d052cb93f78c57c8f43d0888f5::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
