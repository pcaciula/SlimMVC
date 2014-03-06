<?php

namespace MyApp\Core;

class Slim extends \Slim\Slim
{
    /**
     * Executa a classe do controller requisitado
     * Caso não exista será devolvido 'Page Not Found'
     */
    public function fireController($params)
    {
        $name = array_shift($params);
        $name = (empty($name)) ? 'Index': ucfirst($name);
        $namespace = $this->config('controller.prefix');
        $classe = $namespace . $name . 'Controller';

        if (!class_exists($classe))
            $this->notFound();

        $controller = new $classe($this);
        $controller->setName($name);
        $controller->setUriParams($params);
        $controller->execute();
    }
}
