<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit589905e90f3aeda6e0752b17de80f967
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'IntegrationHelper\\IntegrationVersion\\' => 37,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'IntegrationHelper\\IntegrationVersion\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit589905e90f3aeda6e0752b17de80f967::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit589905e90f3aeda6e0752b17de80f967::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit589905e90f3aeda6e0752b17de80f967::$classMap;

        }, null, ClassLoader::class);
    }
}