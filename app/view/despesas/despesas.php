<?php

include_once ("../../autoload.php");


$session = new Session();

$session->validate();

$serializeUser = $session->get("serializeUser");

$user = unserialize($serializeUser);

$repository = new RepositoryDespesas;

$despesas = $repository->getAll();

function showListDespesas($despesas){

    echo "<div class='red'><p> {$despesas["tipoDaDespesa"]} </p> <form action='' method='post' class='crash'> <input type='text' name='delete' value='{$despesas["pkDespesa"]}' > <input type='submit' value='Enviar'> </form> <i class='fa-solid fa-trash delete' ></i> <i class='fa-solid fa-pen'></i> </div>";
    
}

if($_POST){


}

?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../CSS/despesas.css">
    <title>Despesas</title>
</head>
<body>

<nav>
    <ul id="menu">
        <li><a href="#" class="li"><i class="fas fa-home"></i></a></li>
        <li><a href="#" class="li"><i class="fas fa-user"></i></a></li>
        <li><a href="#" class="li"><i class="fas fa-bell"></i></a></li>
        <li><a href="#" class="li"><i class="fa-solid fa-credit-card"></i></a></li>
        <li><a href="#" class="li active" ><i class="fa-solid fa-chart-column"></i></a></li>
        <li><a href="setting/userSetting.php" class="li"><i class="fa-solid fa-gear"></i></a></li>
        <li><a href="#" class="li"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
    </ul>
    
</nav>

<div class="container">

    <h1 class="title">Configurações de Dispesas</h1>

    
    <?php
        array_map("showListDespesas", $despesas);
    ?>

</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../JS/despesas.js"></script>
</body>
</html>