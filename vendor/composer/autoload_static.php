<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5d034078892626ef9c229bb1d020337c
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Todo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Todo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/apps',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5d034078892626ef9c229bb1d020337c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5d034078892626ef9c229bb1d020337c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
