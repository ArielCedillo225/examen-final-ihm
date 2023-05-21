<?php

class Connection{
    
    private $connection;
    private $error;
    
    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=on_line_store";
        $user ='root';
        $password = 'admin';
        $this->connection = new PDO($dsn, $user, $password);    
    }

    public function query($query){
        $result = $this->connection->query($query);
        if($result === false){
            return null;
        }

        $list = [];
        foreach($result as $item){
            $list[] = $item;
        }
        return $list;
    }
    
    public function getLastId(){
        return $this->connection->lastInsertId();
    }
}