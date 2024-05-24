<?php

interface iCartoes{
    public static function construct(int $codigo, string $validade, int $numero): Cartoes;
    public function getPkCartoes(): int;
    public function setPkCartoes(int $pkCartoes): self;
    public function getCodigo(): int;
    public function setCodigo(int $codigo): self;
    public function getValidade(): string;
    public function setValidade(string $validade): self;
    public function getNumero(): int;
    public function setNumero(int $numero): self;
    
}