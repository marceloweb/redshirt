<?php

Class Model {
    
    private $instance;
    
    function __construct() {
        $db = new Db();
        $this->instance = $db->getInstance();
    }

    public function get() {
        $conn = $this->instance;
        
        $sql = "select c.firstname, c.lastname, ct.city, u.uf "
                . "from client c "
                . "left join address a on c.client_id=a.client_id "
                . "left join city ct on a.city_id=ct.city_id "
                . "left join uf u on ct.uf_id=u.uf_id";
        
        $result = $conn->query($sql);
        
        return $result;

    }
    
    public function insert($data) {
        $conn = $this->instance;
        
        $conn->beginTransaction();
        $conn->exec("insert into client values (null,'{$data['firstname']}','{$data['lastname']}',"
        . "'{$data['email']}','{$data['birth']}')");
        
        $client = $conn->lastInsertId();
        
        $conn->exec("insert into address values ('{$data['address']}',{$client})");
        return $conn->commit();
    }
}
