<?php
/**
 * Define um 
 * @author Marcelo Oliveira <marcelo@marceloweb.info>
 */

class Dispatch {

    private $controller;
    private $action;
    private $params = array();

    public function __construct() {

        $this->setController("Index");
        $this->parseUri();
    }

    protected function setController($controller) {
        $controller = ucfirst(strtolower($controller)) . "Controller";

        if (!class_exists($controller)) {
            throw new InvalidArgumentException(
            "The action controller '$controller' has not been defined.");
        }
        $this->controller = $controller;
        return $this;
    }

    protected function getControlle() {
        return $this->controller;
    }

    protected function setAction($action) {
        $reflector = new ReflectionClass($this->controller);

        if (!$reflector->hasMethod($action)) {
            $action = "index";
        }
        $this->action = $action;
        return $this;
    }

    protected function parseUri() {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        @list($action, $params) = explode("/", $path, 2);

        if (isset($action)) {
            $this->setAction($action);
        }
        if (isset($params)) {
            print_r($params); exit;
            $this->setParams(explode("/", $params));
        }
    }

    protected function getAction() {
        return $this->action;
    }

    protected function setParams(array $params) {
        $this->params = $params;
        return $this;
    }

    public function run() {
        call_user_func_array(array(new $this->controller, $this->action), $this->params);
    }

}
