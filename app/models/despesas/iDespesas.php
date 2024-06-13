<?php

interface iDespesas{
    
    static function construct(string $tipoDaDespesa): Despesas;    

    public function getPkDespesa(): int;

    public function setPkDespesa(int $pkDespesa): self;

    public function getTipoDaDespesa(): string;
    
    public function setTipoDaDespesa(string $tipoDaDespesa): self;
    
}