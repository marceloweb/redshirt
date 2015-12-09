<?php

class Autoloader {

    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }

    private function loader($className) {
        include "main/" . $className . ".php";
    }

}
