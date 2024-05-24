<?php

require_once('iCartoes.php');

class cartoes implements iCartoes{
    private int $pkCartoes;
    private int $codigo;
    private string $validade;
    private int $numero;

    public function __construct() {
        //I will leave the constructor for exclusive dependency injection.
    }

    public static function construct(int $codigo, string $validade, int $numero): Cartoes{
        $cartao = new Cartoes();
        $cartao->setCodigo($codigo);
        $cartao->setValidade($validade);
        $cartao->setNumero($numero);
        
        return $cartao;
    }

    public function getPkCartoes(): int{
        return $this->pkCartoes;
    }

    public function setPkCartoes(int $pkCartoes): self{
        $this->pkCartoes = $pkCartoes;

        return $this;
    }

    public function getCodigo(): int{
        return $this->codigo;
    }

    public function setCodigo(int $codigo): self{
        $this->codigo = $codigo;

        return $this;
    }

    public function getValidade(): string{
        return $this->validade;
    }

    public function setValidade(string $validade): self{
        $this->validade = $validade;

        return $this;
    }

    public function getNumero(): int{
        return $this->numero;
    }

    public function setNumero(int $numero): self{
        $this->numero = $numero;

        return $this;
    }
}