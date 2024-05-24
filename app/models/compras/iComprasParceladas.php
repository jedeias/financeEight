<?php

interface iComprasParceladas{
    public static function construct(
        Compras $compras,
        CartaoCredito $cartaoCreditores,
        float $juros,
        int $parcelas,
        string $diaDeVencimento
    ): ComprasParceladas;

    public function setPkComprasParceladas(int $pkComprasParceladas): self;
    public function getPkComprasParceladas(): int;
    
    public function setCompra(Compras $compra): self;
    public function getCompra(): Compras;

    public function setCartaoCreditores(CartaoCredito $cartaoCreditores): self;
    public function getCartaoCreditores(): CartaoCredito;

    public function setJuros(float $juros): self;
    public function getJuros(): float;

    public function setParcelas(int $parcelas): self;
    public function getParcelas(): int;

    public function setDiaDeVencimento(string $diaDeVencimento): self;
    public function getDiaDeVencimento(): string;
}