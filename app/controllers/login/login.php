<?php 

include_once "c:/laragon/www/financeEight/app/autoload.php";

class login{
    
    private RepositoryPessoas $database;
    private Pessoas $cliente;
    private Session $session;

    public function __construct() {
        $this->database = new RepositoryPessoas();
        $this->session = new Session();
    }

    public function login($email, $password) {

        foreach ($_POST as $key){
            if($key == "" || $key == null || empty($key)){
                $url = "http://localhost/financeEight/?status=>'email ou senha não podem estar vazios'";
            
                header("Location: $url");
            }
        }

        $dataUser = $this->database->getByEmail($email);

        if($email == $dataUser["email"] && $password == $dataUser["password"]){
            $cliente = Pessoas::construct(
                $dataUser["CPF"], 
                $dataUser["email"],
                $dataUser["password"],
                $dataUser["dataNascimento"]
            );

            $cliente->setPkPessoa($dataUser["pkPessoa"]);

            $serialize = serialize($cliente);

            $this->session->set("serializeUser", $serialize);

            $url = "http://localhost/financeEight/app/view/home.php";
            
            header("Location: $url");

        }else if($email != $dataUser["email"]){

            $url = "http://localhost/financeEight/?status=>'email não registrado'";
            
            header("Location: $url");
        }else{
            $url = "http://localhost/financeEight/?status=>'email ou senha incorreto'";
            
            header("Location: $url");
        }
    }



}

$login = new Login();

$login->login($_POST["email"], $_POST["password"]);