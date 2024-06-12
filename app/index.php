<?php

include("autoload.php");

$pessoa = Pessoas::construct("1234567890123", "backTest@backtest.com", "123456789", "2000-05-22");

$repository = new RepositoryPessoas();


