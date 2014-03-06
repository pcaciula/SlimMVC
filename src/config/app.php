<?php

define('APP_MODE_DEV', 'development');
define('APP_MODE_PRO', 'production');
define('APP_MODE', APP_MODE_DEV);

return [
    'mode' => APP_MODE,
    'debug' => APP_MODE === APP_MODE_DEV,
    'controller.prefix' => '\\MyApp\\Controllers\\'
];