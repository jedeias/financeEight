<?php

require_once (dirname(__DIR__) . "/mysql.php");

require_once ("iRepositoryCartoes.php");

class RepositoryCartoes{

    private $mysql;

    public function __construct() {
        $this->mysql = new Mysql();
    }

    public function getById(int $id) {
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("SELECT * FROM cartoes WHERE pkCartao = :pk");
            
            $stmt->bindParam(':pk', $id);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

        }catch(PDOException $error){
            echo "Error: " . $error->getMessage();
        }
    }

    public function save(Cartoes $cartoes){
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("CALL insertCartoes(:codigo, :validade, :numero)");
            
            $stmt->bindValue(':codigo', $cartoes->getCodigo());
            $stmt->bindValue(':validade', $cartoes->getValidade());
            $stmt->bindValue(':numero', $cartoes->getNumero());
            $stmt->execute();

            return "save success";

        }catch(PDOException $error){
            echo "Error: " . $error->getMessage();
        }
    }

    public function getAll():array {
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("SELECT * FROM cartoes");
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

    public function delete(int $id){
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("CALL deleteCartoes(:pk)");
            
            $stmt->bindValue(':pk', $id);
            $stmt->execute();
            return "delete success";
            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

    public function update(Cartoes $cartoes){
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("CALL insertCartoes(:codigo, :validade, :numero)");
            
            $stmt->bindValue(':codigo', $cartoes->getCodigo());
            $stmt->bindValue(':validade', $cartoes->getValidade());
            $stmt->bindValue(':numero', $cartoes->getNumero());
            $stmt->execute();

            return "update success";
            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

}