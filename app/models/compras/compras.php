<?php

require_once ("iCompras.php");

class Compras implements ICompras{
    private Despesas $despesa;
    private Cartoes $cartoes;
    private float $valorTotal;
    private string $produto;
    private string $dataCompra;
    private int $pkCompra;

    public function __construct() {
        //only dependency injection
    }

    public static function construct(
        Despesas $despesa,
        Cartoes $cartoes, 
        float $valorTotal,
        string $produto,
        string $dataCompra) : Compras {
        
        $compra = new Compras();

        $compra->setDespesa($despesa);
        $compra->setCartoes($cartoes);
        $compra->setValorTotal($valorTotal);
        $compra->setProduto($produto);
        $compra->setDataCompra($dataCompra);
    
        return $compra;
    }

    public function getPkCompra(): int{
        return $this->pkCompra;
    }

    public function setPkCompra(int $pkCompra): self{
        $this->pkCompra = $pkCompra;

        return $this;
    }

    public function getDespesa(): Despesas{
        return $this->despesa;
    }

    public function setDespesa(Despesas $despesa): self{
        $this->despesa = $despesa;

        return $this;
    }

    public function getCartoes(): Cartoes{
        return $this->cartoes;
    }

    public function setCartoes(Cartoes $cartoes): self{
        $this->cartoes = $cartoes;

        return $this;
    }

    public function getValorTotal(): float{
        return $this->valorTotal;
    }

    public function setValorTotal(float $valorTotal): self{
        $this->valorTotal = $valorTotal;

        return $this;
    }

    public function getProduto(): string{
        return $this->produto;
    }

    public function setProduto(string $produto): self{
        $this->produto = $produto;

        return $this;
    }

    public function getDataCompra(): string{
        return $this->dataCompra;
    }

    public function setDataCompra(string $dataCompra): self{
        $this->dataCompra = $dataCompra;

        return $this;
    }

}

