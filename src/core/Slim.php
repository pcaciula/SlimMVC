<?php

namespace MyApp\Core;

class Slim extends \Slim\Slim
{
    public function execute($params = [])
    {
        var_dump($params);
    }
}