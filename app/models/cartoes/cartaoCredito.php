<?php

require_once ("iCartaoCredito.php");

class CartaoCredito implements iCartaoCredito{

    private int $pkCartaoCredito;
    private string $vencimentoCredito;
    private string $limite;
    private float $juros;
    private Cartoes $cartao;

    public function __construct() {
        $this->cartao = new Cartoes(); // this is a dependency injection
    }

    public static function construct(   int $codigo, 
                                        string $validade, 
                                        int $numero,
                                        string $vencimentoCredito,
                                        int $limite,
                                        float $juros
                                    ): CartaoCredito{

        $cartaoCredito = new CartaoCredito();

        $cartaoCredito->getCartao()->setCodigo($codigo);
        $cartaoCredito->getCartao()->setValidade($validade);
        $cartaoCredito->getCartao()->setNumero($numero);
        $cartaoCredito->setVencimentoCredito($vencimentoCredito);
        $cartaoCredito->setLimite($limite);
        $cartaoCredito->setJuros($juros);
        
        return $cartaoCredito;
    }

    public function getPkCartaoCredito(): int{
        return $this->pkCartaoCredito;
    }

    public function setPkCartaoCredito(int $pkCartaoCredito): self{
        $this->pkCartaoCredito = $pkCartaoCredito;

        return $this;
    }

    public function getVencimentoCredito(): string{
        return $this->vencimentoCredito;
    }

    public function setVencimentoCredito(string $vencimentoCredito): self{
        $this->vencimentoCredito = $vencimentoCredito;

        return $this;
    }

    public function getLimite(): string{
        return $this->limite;
    }

    public function setLimite(string $limite): self{
        $this->limite = $limite;

        return $this;
    }

    public function getJuros(): float{
        return $this->juros;
    }

    public function setJuros(float $juros): self{
        $this->juros = $juros;

        return $this;
    }

    public function getCartao(): Cartoes
    {
        return $this->cartao;
    }

    public function setCartao(Cartoes $cartao): self
    {
        $this->cartao = $cartao;

        return $this;
    }
}