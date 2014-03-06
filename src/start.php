<?php

require BASEDIR . '/vendor/autoload.php';

use MyApp\Core\Slim as MySlim; // Set alias for my Slim class

$app = new MySlim(require_once APPDIR . '/config/app.php');

$app->get('/(:params+)', function ($params = []) use ($app) {
    $app->execute($params);
});
