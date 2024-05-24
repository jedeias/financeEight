<?php 

interface iCompras{
    public static function construct(
        Despesas $despesa,
        Cartoes $cartoes, 
        float $valorTotal,
        string $produto,
        string $dataCompra
    ) : Compras;
    
    public function setDespesa(Despesas $despesa): self;
    public function getDespesa(): Despesas;

    public function setCartoes(Cartoes $cartoes): self;
    public function getCartoes(): Cartoes;
    
    public function setValorTotal(float $valorTotal): self;
    public function getValorTotal(): float;

    public function setProduto(string $produto): self;
    public function getProduto(): string;

    public function setDataCompra(string $dataCompra): self;
    public function getDataCompra(): string;

    public function setPkCompra(int $pkCompra): self;
    public function getPkCompra(): int;
}