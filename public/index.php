<?php

error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/New York');

define('BASEDIR', dirname(__DIR__)); // root directory
define('APPDIR', BASEDIR . '/src'); // app directory

require_once APPDIR . '/start.php';

$app->run();
