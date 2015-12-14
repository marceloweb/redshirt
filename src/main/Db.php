<?php
/**
 * Conexão com base de dados
 * @author Marcelo Oliveira <marcelo@marceloweb.info>
 */

class Db {

    private $connection;

    function __construct() {
        $this->connection = new PDO("mysql:host=localhost;dbname=redshirt;charset=utf8", "", "");
    }

    public function getInstance() {
        return $this->connection;
    }

}
