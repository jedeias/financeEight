<?php 


interface iBancos{
    public static function construct($tipoDaConta, $saldo, $fonteDeRenda): Bancos;
    public function getPkBancos(): int;
    public function setPkBancos(int $pkBancos): self;
    public function getTipoDaConta(): string;
    public function setTipoDaConta(string $tipoDaConta): self;
    public function getSaldo(): string;
    public function setSaldo(string $saldo): self;
    public function getFonteDeRenda(): string;
    public function setFonteDeRenda(string $fonteDeRenda): self;





}