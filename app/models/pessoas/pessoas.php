<?php

require_once ("iPessoas.php");

class Pessoas{
    private int $pkPessoa;
    private string $cpf;
    private string $email;
    private string $password;
    private string $dataNascimento;
    
    public function __construct() {
        //I will leave the constructor for exclusive dependency injection.
    }

    static function construct(string $cpf, string $email, string $password, string $dataNascimento): Pessoas{
        $pessoa = new Pessoas();
        $pessoa->setCpf($cpf);
        $pessoa->setEmail($email);
        $pessoa->setPassword($password);
        $pessoa->setDataNascimento($dataNascimento);

        return $pessoa;
    }

    public function getPkPessoa(): int{
        return $this->pkPessoa;
    }

    public function setPkPessoa(int $pkPessoa): self{
        $this->pkPessoa = $pkPessoa;

        return $this;
    }

    public function getCpf(): string{
        return $this->cpf;
    }

    public function setCpf(string $cpf): self{
        $this->cpf = $cpf;

        return $this;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail(string $email): self{
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function setPassword(string $password): self{
        $this->password = $password;

        return $this;
    }

    public function getDataNascimento(): string{
        return $this->dataNascimento;
    }

    public function setDataNascimento(string $dataNascimento): self{
        $this->dataNascimento = $dataNascimento;

        return $this;
    }
}