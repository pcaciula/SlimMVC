<?php
$_ENV['SLIM_MODE'] = 'development';

require BASEDIR . '/vendor/autoload.php';
require APPDIR . '/config/php_config.php'

use MyApp\Core\Slim as MySlim; // Set alias for my Slim class

$app = new MySlim(require_once APPDIR . '/config/app.php');

MyApp\Config\PhpConfig::setErrLog();
MyApp\Config\PhpConfig::setTimeZone();

$app->configureMode('production', function () use ($app) {
    App\Config\PhpConfig::setInis('prd');
});

$app->configureMode('development', function () use ($app) {
    $app->app->config['debug'] = 'true'; 
    App\Config\PhpConfig::setInis();
});

$app->get('/(:params+)', function ($params = []) use ($app) {
    $app->fireController($params);
});

$app->post('/(:params+)', function ($params = []) use ($app) {
    $app->fireController($params);
});

