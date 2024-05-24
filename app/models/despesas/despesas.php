<?php

class Despesas{
    private int $pkDespesa;
    private string $tipoDaDespesa;

    public function __construct() {
        //I will leave the constructor for exclusive dependency injection.
    }

    static function construct(string $tipoDaDespesa): Despesas{
        $despesa = new Despesas();

        $despesa->setTipoDaDespesa($tipoDaDespesa);

        return $despesa;
    }

    public function getPkDespesa(): int{
        return $this->pkDespesa;
    }

    public function setPkDespesa(int $pkDespesa): self{
        $this->pkDespesa = $pkDespesa;

        return $this;
    }

    public function getTipoDaDespesa(): string{
        return $this->tipoDaDespesa;
    }

    public function setTipoDaDespesa(string $tipoDaDespesa): self{
        $this->tipoDaDespesa = $tipoDaDespesa;

        return $this;
    }
}