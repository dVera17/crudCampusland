<?php

namespace App;
use PDO;

class Connect{
    public $conn;
    function __construct()
    {
        try{
            $this->conn = new \PDO($_ENV['DSN'].":host=".$_ENV['HOST'].";dbname=".$_ENV['DBNAME']."; user=".$_ENV['USER']."; password=".$_ENV['PASSWORD']."; port=".$_ENV['PORT']);
        } catch (\PDOException $e){
            print_r($e->getMessage());
        }
    }
}

?>