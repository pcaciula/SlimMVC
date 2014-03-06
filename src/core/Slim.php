<?php

namespace MyApp\Core;

class Slim extends \Slim\Slim
{
    public function __construct(array $userSettings = array()) {
        parent::__construct($userSettings);

        $this->defineExtensionView();
    }

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

    /**
     * Configurações extras a serem utilizadas com o template engine Twig
     */
    public function defineExtensionView()
    {
        $this->view->parserOptions = $this->config('templates.options');
        $this->view->parserExtensions = array(new \Slim\Views\TwigExtension());
    }
}
