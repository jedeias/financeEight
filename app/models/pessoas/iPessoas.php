<?php

interface iPessoas{
 
    static function construct(string $cpf, string $email, string $password, string $dataNascimento): Pessoas;

    public function getPkPessoa(): int;

    public function setPkPessoa(int $pkPessoa): self;

    public function getCpf(): string;

    public function setCpf(string $cpf): self;

    public function getEmail(): string;
    
    public function setEmail(string $email): self;

    public function getPassword(): string;

    public function setPassword(string $password): self;

    public function getDataNascimento(): string;

    public function setDataNascimento(string $dataNascimento): self;


}
