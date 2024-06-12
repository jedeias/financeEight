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

        try{

            
            $this->connect = new PDO("mysql:host=$host;
            dbname=$database", 
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

