<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita5b9990ee04b6a807a7ab8fcccd411ad
{
    public static $files = array (
        'dfb8e8c0a58884c591d8c9e8ca6fcdf2' => __DIR__ . '/../..' . '/comm/functions.php',
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInita5b9990ee04b6a807a7ab8fcccd411ad::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}