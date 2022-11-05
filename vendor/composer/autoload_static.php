<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit965e7fe75a8e648d1c649db26f6c8db2
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'ListaCompras\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ListaCompras\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit965e7fe75a8e648d1c649db26f6c8db2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit965e7fe75a8e648d1c649db26f6c8db2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit965e7fe75a8e648d1c649db26f6c8db2::$classMap;

        }, null, ClassLoader::class);
    }
}