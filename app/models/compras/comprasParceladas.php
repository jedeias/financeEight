<?php

require_once ("iComprasParceladas.php");

class ComprasParceladas implements iComprasParceladas{
    private int $pkComprasParceladas;
    private Compras $compra;
    private CartaoCredito $cartaoCreditores;
    private float $juros;
    private int $parcelas;
    private string $diaDeVencimento;

    public function __construct(){
        //only dependency injection
    }

    public static function construct(
        Compras $compras,
        CartaoCredito $cartaoCreditores,
        float $juros,
        int $parcelas,
        string $diaDeVencimento
    ): ComprasParceladas{

        $comprasParceladas = new ComprasParceladas();
        $comprasParceladas->setCompra($compras);
        $comprasParceladas->setCartaoCreditores($cartaoCreditores);
        $comprasParceladas->setJuros($juros);
        $comprasParceladas->setDiaDeVencimento($diaDeVencimento);

        return $comprasParceladas;
    }

    public function getPkComprasParceladas(): int{
        return $this->pkComprasParceladas;
    }

    public function setPkComprasParceladas(int $pkComprasParceladas): self{
        $this->pkComprasParceladas = $pkComprasParceladas;

        return $this;
    }

    public function getCompra(): Compras{
        return $this->compra;
    }

    public function setCompra(Compras $compra): self{
        $this->compra = $compra;

        return $this;
    }

    public function getCartaoCreditores(): CartaoCredito{
        return $this->cartaoCreditores;
    }

    public function setCartaoCreditores(CartaoCredito $cartaoCreditores): self{
        $this->cartaoCreditores = $cartaoCreditores;

        return $this;
    }

    public function getJuros(): float{
        return $this->juros;
    }

    public function setJuros(float $juros): self{
        $this->juros = $juros;

        return $this;
    }

    public function getParcelas(): int{
        return $this->parcelas;
    }

    public function setParcelas(int $parcelas): self{
        $this->parcelas = $parcelas;

        return $this;
    }

    public function getDiaDeVencimento(): string{
        return $this->diaDeVencimento;
    }

    public function setDiaDeVencimento(string $diaDeVencimento): self{
        $this->diaDeVencimento = $diaDeVencimento;

        return $this;
    }
}

