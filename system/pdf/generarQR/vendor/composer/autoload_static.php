<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0054b04dc5b27435c00f08f7e530bdbc
{
    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'BaconQrCode' => 
            array (
                0 => __DIR__ . '/..' . '/bacon/bacon-qr-code/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit0054b04dc5b27435c00f08f7e530bdbc::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit0054b04dc5b27435c00f08f7e530bdbc::$classMap;

        }, null, ClassLoader::class);
    }
}
