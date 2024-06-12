<?php



class Bancos {
    private int $pkBancos;
    private string $tipoDaConta;
    private string $saldo;
    private string $fonteDeRenda;

    public function __construct() {
        //only dependency injection
    }

    public static function construct($tipoDaConta, $saldo, $fonteDeRenda): Bancos{
        $banco = new Bancos();
        $banco->setTipoDaConta($tipoDaConta);
        $banco->setSaldo($saldo);
        $banco->setFonteDeRenda($fonteDeRenda);

        return $banco;
    }

    public function getPkBancos(): int{
        return $this->pkBancos;
    }

    public function setPkBancos(int $pkBancos): self{
        $this->pkBancos = $pkBancos;

        return $this;
    }

    public function getTipoDaConta(): string{
        return $this->tipoDaConta;
    }

    public function setTipoDaConta(string $tipoDaConta): self{
        $this->tipoDaConta = $tipoDaConta;

        return $this;
    }

    public function getSaldo(): string{
        return $this->saldo;
    }

    public function setSaldo(string $saldo): self{
        $this->saldo = $saldo;

        return $this;
    }

    public function getFonteDeRenda(): string{
        return $this->fonteDeRenda;
    }

    public function setFonteDeRenda(string $fonteDeRenda): self{
        $this->fonteDeRenda = $fonteDeRenda;

        return $this;
    }
}