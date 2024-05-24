<?php

interface iCartaoCredito{
    
    public static function construct(   int $codigo, 
                                        string $validade, 
                                        int $numero,
                                        string $vencimentoCredito,
                                        int $limite,
                                        float $juros
                                    ): CartaoCredito;
    
}