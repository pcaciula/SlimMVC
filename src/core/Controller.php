<?php

namespace MyApp\Core;

abstract class Controller {

    protected $app;
    private $controller;
    private $action;
    private $params;

    public function __construct(\MyApp\Core\Slim &$app)
    {
        $this->app = $app;
    }

    public function setName($name)
    {
        $this->controller = $name;
    }

    public function setUriParams($params)
    {
        $this->params = $params;
    }

    /**
     * Obtem a action da uri, caso exista
     * Se nao existe, chama a action padrao, index
     * Se não há metodo para a action informada, devolve 'Page Not Found'
     */
    protected function defineAction()
    {
        $name = trim(array_shift($this->params));
        if (empty($name))
            $name = 'index';

        $this->action = $name;

        if (!method_exists($this, $this->action))
            $this->app->notFound();
    }

    /**
     * Executa a action do controle passando como parametros para a action
     * os demais argumentos da URL
     */
    public function execute()
    {
        $this->defineAction();
        $this->params = array_merge($this->params, $_GET);
        call_user_func_array([$this, $this->action], $this->params);
    }

}
