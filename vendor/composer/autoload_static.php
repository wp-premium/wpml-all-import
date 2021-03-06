<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a115710dabb529a8f55aa12245b5f06
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPML\\AI\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPML\\AI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a115710dabb529a8f55aa12245b5f06::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a115710dabb529a8f55aa12245b5f06::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
