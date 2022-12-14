<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitea9cbfcd42e584bdb84bf4549a34b5ab
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Picqer\\Barcode\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Picqer\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/picqer/php-barcode-generator/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitea9cbfcd42e584bdb84bf4549a34b5ab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitea9cbfcd42e584bdb84bf4549a34b5ab::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitea9cbfcd42e584bdb84bf4549a34b5ab::$classMap;

        }, null, ClassLoader::class);
    }
}
