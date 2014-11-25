<?php

define('APP_MODE_DEV', 'development');
define('APP_MODE_PRO', 'production');
define('APP_MODE', APP_MODE_DEV);

return array(
    'app.name' => 'Slim MVC',
    'mode' => APP_MODE,
    'debug' => APP_MODE === APP_MODE_DEV,
    'controller.prefix' => '\\MyApp\\Controllers\\',

    'view' => new \Slim\Views\Twig(),
    'templates.path' => APPDIR . '/views',
    'templates.suffix' => 'html',
    'templates.options' => array(
        'charset' => 'utf-8',
        'cache' => APPDIR . '/storage/cache/twig',
        'auto_reload' => true,
        'strict_variables' => false,
        'autoescape' => true
    ),
    'db' => array(
         'default' => 'mysql',
         'connections' => array(
            'mysql' => array(
                'driver' => 'mysql',
                'dbname' => 'calls',
                'username' => 'cr2',
                'password' => 'rtv1916clay',
                'charset'  => 'utf8',
                'prefix'   => '',
                'schema'   => 'public',
            )
         )
    )
);
