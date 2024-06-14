<?php

require_once (dirname(__DIR__) . "/mysql.php");

require_once ("iRepositoryDespesas.php");

class RepositoryDespesas implements iRepositoryDespesas{

    private $mysql;

    public function __construct() {
        $this->mysql = new Mysql();
    }

    public function getById(int $id) {
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("SELECT * FROM despesas WHERE pkDespesa = :pk");
            
            $stmt->bindParam(':pk', $id);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

        }catch(PDOException $error){
            echo "Error: " . $error->getMessage();
        }
    }

    public function save(Despesas $despesa){
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("CALL insertDespesas(:tipoDespesa)");
            
            $stmt->bindValue(':tipoDespesa', $despesa->getTipoDaDespesa());
            $stmt->execute();
            return "save success";

        }catch(PDOException $error){
            echo "Error: " . $error->getMessage();
        }
    }

    public function getAll():array {
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("SELECT * FROM despesas");
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

    public function delete(int $id){
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("CALL deleteDespesas(:pk)");
            
            $stmt->bindValue(':pk', $id);
            $stmt->execute();
            return "delete success";
            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

    public function update(Despesas $despesa){
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("CALL updateDespesas(:pk, :tipoDespesa)");
            
            $stmt->bindValue(':pk', $despesa->getPkDespesa());
            $stmt->bindValue(':tipoDespesa', $despesa->getTipoDaDespesa());
            $stmt->execute();
            return "update success";
            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

}