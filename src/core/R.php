<?php

namespace MyApp\Core;

class R extends \RedBean_Facade
{
    public static function initDb($cfg = [], \MyApp\Core\Slim $app)
    {
        $conn = null;
        if (!empty($cfg) && isset($cfg['default'])) {
            $conn = $cfg['default'];
        }

        if ($conn && isset($cfg['connections'][$conn])) {
            $conn = $cfg['connections'][$conn];
            if ($conn['driver'] == 'pgsql') {
                self::setup($conn['dsn'], $conn['username'], $conn['password']);
            } else if ($conn['driver'] == 'sqlite') {
                self::setup($conn['driver'] . ':' . $con['dsn']);
            }

            self::defineFreeze($app);
        }
    }

    /**
     * Freeze DB if app mode equals APP_MODE_PRO
     */
    public static function defineFreeze(\MyApp\Core\Slim $app)
    {
        $app->configureMode(APP_MODE_PRO, function () {
            R::freeze(true);
        });
    }
}