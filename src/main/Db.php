<?php

class Db {

    private $connection;

    function __construct() {
        $this->connection = new PDO("mysql:host=localhost;dbname=redshirt;charset=utf8", "", "");
    }

    public function getInstance() {
        return $this->connection;
    }

}
