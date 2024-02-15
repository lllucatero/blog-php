<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteeaa0c57f25bc6c120f87788b4bec0a4
{
    public static $files = array (
        'df885570b8cc50036db6130b2d615cb3' => __DIR__ . '/../..' . '/system/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'system\\' => 7,
        ),
        'P' => 
        array (
            'Pecee\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'system\\' => 
        array (
            0 => __DIR__ . '/../..' . '/system',
        ),
        'Pecee\\' => 
        array (
            0 => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteeaa0c57f25bc6c120f87788b4bec0a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteeaa0c57f25bc6c120f87788b4bec0a4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteeaa0c57f25bc6c120f87788b4bec0a4::$classMap;

        }, null, ClassLoader::class);
    }
}
