<?php

include_once ("../../autoload.php");


$session = new Session();

$session->validate();

$serializeUser = $session->get("serializeUser");

$user = unserialize($serializeUser);

$repository = new RepositoryDespesas;

$despesas = $repository->getAll();


function showListDespesas($despesas){
  
    //echo "<div class='red'><p> {$despesas["tipoDaDespesa"]} </p> <form action='' method='post' class='crash'> <input type='text' name='delete' value='{$despesas["pkDespesa"]}' > <input type='submit' value='Enviar'> </form> <i class='fa-solid fa-trash delete' ></i> <i class='fa-solid fa-pen'></i> </div>";
    
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
        <li><a href="../home.php" class="li"><i class="fas fa-home"></i></a></li>
        <li><a href="#" class="li"><i class="fas fa-user"></i></a></li>
        <li><a href="#" class="li"><i class="fas fa-bell"></i></a></li>
        <li><a href="#" class="li"><i class="fa-solid fa-credit-card"></i></a></li>
        <li><a href="#" class="li active" ><i class="fa-solid fa-chart-column"></i></a></li>
        <li><a href="../setting/userSetting.php" class="li"><i class="fa-solid fa-gear"></i></a></li>
        <li><a href="#" class="li"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
    </ul>

    

    
</nav>

<i id="add" class="fa-solid fa-circle-plus"></i>

<div class="form-container">
    <h2>Adicionar Despesa</h2>

    <form action="" method="POST">
       

        <label for="descricao">Descrição:</label>

        <input type="text" id="descricao" name="descricao" required>

        <label for="valor">Valor:</label>

        <input type="number" id="valor" name="valor" step="0.01" required>

        <label for="categoria">Categoria:</label>

        <select id="categoria" name="categoria" required>
            <option value="">Selecione</option>
            <option value="red" style="background-color: rgba(254, 101, 101, 1);">Red</option>
            <option value="blue" style="background-color: rgba(54, 243, 255, 1);">Blue</option>
            <option value="green" style="background-color: rgba(167, 255, 136, 1);">Green</option>
            <option value="Brown" style="background-color: rgba(184, 155, 100, 1);">Brown</option>
            <option value="purple" style="background-color: rgba(117,129,236,1);">Purple</option>
            <option value="black" style="background-color: rgb(0,0,0); color:#fff;">Black</option>
            <option value="magent" style="background-color: rgba(153, 15, 146, 0.774);">Magenta</option>
        </select>

        <button type="submit">Adicionar Despesa</button>
    </form>
  
    <?php
        array_map("showListDespesas", $despesas);
    ?>
</div>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../JS/despesas.js"></script>
</body>
</html>