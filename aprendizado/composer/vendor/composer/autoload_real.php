<?php

// autoload_real.php @generated by Composer

namespace aprendizado\composer\vendor\composer;
class ComposerAutoloaderInitcb35abe5042da1560bb2ec2067803b03
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

        spl_autoload_register(array('ComposerAutoloaderInitcb35abe5042da1560bb2ec2067803b03', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcb35abe5042da1560bb2ec2067803b03', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcb35abe5042da1560bb2ec2067803b03::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
