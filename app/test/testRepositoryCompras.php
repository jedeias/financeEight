<?php

include("C:/laragon/www/financeEight/app/autoload.php");

$repositoryDespesas = new RepositoryDespesas();

$despesas = Despesas::construct($repositoryDespesas->getById(1)["tipoDaDespesa"]);
$despesas->setPkDespesa($repositoryDespesas->getById(1)["pkDespesa"]);

$compras = Compras::construct($despesas);

//givei pq tem que ter os cartões prontos para fazer esse repository
//vou fazer os cartções e retorno novamente para finalizar isso