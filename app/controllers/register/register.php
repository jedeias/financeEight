<?php

include_once "c:/laragon/www/financeEight/app/autoload.php";

class Register{
    
    private RepositoryPessoas $database;
    private Pessoas $cliente;
    private Session $session;

    public function __construct() {
        $this->database = new RepositoryPessoas();
        $this->session = new Session();
    }

    public function Register(){

        $email = $_POST["email"];
        $password = $_POST["password"];
        $CPF = $_POST["CPF"];
        $dataNasc = $_POST["dataNasc"];

        $dataUser = $this->database->getByEmail($email);

        if(($dataUser["email"] != $email && $dataUser["CPF"] != $CPF)){

            $this->cliente = Pessoas::construct(
                $CPF, 
                $email, 
                $password, 
                $dataNasc
            );

            $this->database->save($this->cliente);
            
            $login = new Login();

            $login->login($email, $password);

        }else{

            $url = "http://localhost/financeEight/?status=>'email ou CPF já cadatrados'";
            
            header("Location: $url");
        }
        
    }   

}

$Register = new Register();

$Register->Register();