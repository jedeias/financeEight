<?php

include ("C:/laragon/www/financeEight/app/config/host.php");

// use PDO;

class Mysql{

    private $connect; 

    public function __construct() {

        $host = SERVER;
        $database = DATABASE;
        $user = USER;
        $password = PASSWORD;
        $port = PORT;

        try{

            
            $this->connect = new PDO("mysql:host=$host;
            dbname=$database;
            port=$port", 
            $user, 
            $password);
        }catch(PDOException $error){
            echo "Error: " . $error->getMessage();
        }
    }

	public function getConnect() {
		return $this->connect;
	}

    function __destruct() {
        $this->connect = null;
    }
}



$mysql = new Mysql();
