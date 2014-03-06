<?php

namespace MyApp\Core;

abstract class Controller {

    protected $app;

    public function __construct(\MyApp\Core\Slim &$app)
    {
        $this->app = $app;
    }

}
