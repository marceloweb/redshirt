<?php

class Dispatch {

    private $controller;
    private $action;
    private $params = array();
    private $basePath = "mybasepath/";

    public function __construct(array $options = array()) {

        $controller = isset($options["controller"]) ?
                $options["controller"] : "Index";

        $action = isset($options["action"]) ?
                $options["action"] : "index";

        $params = isset($options["params"]) ?
                $options["params"] : array();

        $this->setController($controller);
        $this->setAction($action);
        $this->setParams($params);
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
            throw new InvalidArgumentException(
            "The controller action '$action' has been not defined.");
        }
        $this->action = $action;
        return $this;
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