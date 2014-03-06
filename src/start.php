<?php

require BASEDIR . '/vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/(:params+)', function ($params = []) {
    var_dump($params);
});
