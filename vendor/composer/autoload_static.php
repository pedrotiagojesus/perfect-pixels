<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit743d659bb2e640c874df6fad2804f370
{
    public static $files = array (
        'df6ac099a9adca39fc48dd471ede6656' => __DIR__ . '/../..' . '/app/config.php',
        '1a1a6e787c795fa0c2fef031b61ff9db' => __DIR__ . '/../..' . '/app/helpers/Functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\System\\' => 11,
            'App\\Controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\System\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/system',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTTP_Request2' => 
            array (
                0 => __DIR__ . '/..' . '/pear/http_request2',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Net_URL2' => __DIR__ . '/..' . '/pear/net_url2/Net/URL2.php',
        'PEAR_Exception' => __DIR__ . '/..' . '/pear/pear_exception/PEAR/Exception.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit743d659bb2e640c874df6fad2804f370::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit743d659bb2e640c874df6fad2804f370::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit743d659bb2e640c874df6fad2804f370::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit743d659bb2e640c874df6fad2804f370::$classMap;

        }, null, ClassLoader::class);
    }
}
