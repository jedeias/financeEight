<?php

require_once (dirname(__DIR__) . "/mysql.php");

require_once ("iRepositoryPessoas.php");

class RepositoryPessoas implements iRepositoryPessoas{

    private $mysql;

    public function __construct() {
        $this->mysql = new Mysql();
    }

    public function getById(int $id) {
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("SELECT * FROM pessoas WHERE pkPessoa = :pk");
            
            $stmt->bindParam(':pk', $id);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

        }catch(PDOException $error){
            echo "Error: " . $error->getMessage();
        }
    }

    public function save(Pessoas $pessoa){
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("CALL insertPessoas(:cpf, :email, :password, :dataNasc)");
            
            $stmt->bindValue(':cpf', $pessoa->getCpf());
            $stmt->bindValue(':email', $pessoa->getEmail());
            $stmt->bindValue(':password', $pessoa->getPassword());
            $stmt->bindValue(':dataNasc', $pessoa->getDataNascimento());
            $stmt->execute();
            
            return "save success";

        }catch(PDOException $error){
            echo "Error: " . $error->getMessage();
        }
    }

    public function getAll():array {
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("SELECT * FROM pessoas;");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

    public function delete(int $id){
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("CALL deletePessoas(:pk)");

            $stmt->bindValue(':pk', $id);
            $stmt->execute();
            
            return "delete success";
            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

    public function getByEmail(string $email){
        
        try{

            $stmt =  $this->mysql->getConnect()->prepare("SELECT * FROM pessoas WHERE email = :email");

            $stmt->bindValue(':email', $email);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

    public function update(Pessoas $pessoa){
        
        try{

            $pkConsult = $this->getById($pessoa->getPkPessoa());

            if(empty($pkConsult) && !is_array($pkConsult)){
                return "invalid ID to update";
            }

            $stmt =  $this->mysql->getConnect()->prepare("CALL updatePessoas(:pk, :cpf, :email, :password, :dataNasc)");

            $stmt->bindValue(':pk', $pessoa->getPkPessoa());
            $stmt->bindValue(':cpf', $pessoa->getCpf());
            $stmt->bindValue(':email', $pessoa->getEmail());
            $stmt->bindValue(':password', $pessoa->getPassword());
            $stmt->bindValue(':dataNasc', $pessoa->getDataNascimento());
            $stmt->execute();
            
            return "update success";

            
        }catch(PDOException $error){
            return [$error->getMessage()];
        }
    }

}