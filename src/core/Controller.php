<?php
namespace MyApp\Core;

abstract class Controller {

    protected $app;
    private $controller;
    private $action;
    private $params;
    /**
     * Default Model Matching ControllerName
     **/
    protected $mdl = null;

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
     * Get the action from the uri, if it exists
     * If it doesn't existe, call the default action, index
     * If it doesn't exist, do 404
     */
    protected function defineAction()
    {
        $name = trim(array_shift($this->params));
        if (empty($name))
            $name = 'index';

        $method = strtolower($this->app->request()->getMethod());
        $this->action = $method . $name;

        if (!method_exists($this, $this->action))
            $this->app->notFound();

    }

    /**
     * Execute a controller action passing in all params
     * including get params from URL
     */
    public function execute()
    {
        $this->defineAction();
        $this->params = array_merge($this->params, $_GET);
        call_user_func_array(array($this, $this->action), $this->params);
    }

    public function render($template, $params = array())
    {
        $suffix = $this->app->config('templates.suffix');
        if ($suffix && !preg_match('/\.' . $suffix . '$/', $template)) {
            $template .= '.' . $suffix;
        }

        $this->app->render($template, $params);
    }
    
    public function setDefaultModel()
    {
         $this->mdl = $this->_model($this->controller);
    }
    /** Retrieve new ORM table representation **/
    public function _model($table)
    {
        $config = $this->app->config['db']['connections']['mysql'];
        $mdl = new Model();
        $mdl->init($table,$config);
    }
}
