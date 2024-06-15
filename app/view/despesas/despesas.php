<?php

include_once ("../../autoload.php");


$session = new Session();

$session->validate();

$serializeUser = $session->get("serializeUser");

$user = unserialize($serializeUser);

$repository = new RepositoryDespesas;

$despesasData = $repository->getAll();

function showListDespesas($despesas){

    if($despesas["pkDespesa"] % 2 == 0){

        echo "<div class='red'>

        <p> {$despesas["tipoDaDespesa"]} </p> 

            <form action='' method='post' class='crashred'> 
                <input type='hidden' name='key' value='{$despesas["pkDespesa"]}'}> 
                <input type='text' name='novaDespesa'>
                <input type='submit' name='method' value='update'>
            </form> 
        
            <form action='' method='post' class='trash'>
                <label for='btnDelete{$despesas['pkDespesa']}'>
                    <i class='fa-solid fa-trash' ></i>
                </label>

                <input type='hidden' name='key' value='{$despesas['pkDespesa']}'>
                <input hidden type='submit' id='btnDelete{$despesas['pkDespesa']}' name='method' value='delete'>
            
            </form>

            <form action='' method='post' class='pen'>
                <i class='fa-solid fa-pen {$despesas['pkDespesa']} deletered'></i>
            </form>

    </div>";
    
    }else{
        echo "<div class='blue'>

                <p> {$despesas["tipoDaDespesa"]} </p> 
                <span hidden id='primaryKey'>{$despesas["pkDespesa"]}</span>
                <form action='' method='post' class='crashblue {$despesas["pkDespesa"]} '> 
                    <input type='hidden' name='key' value='{$despesas["pkDespesa"]}'}> 
                    <input type='text' name='novaDespesa'>
                    <input type='submit' name='method' value='update'>
                </form> 
                
                    <form action='' method='post' class='trash'>
                        <label for='btnDelete{$despesas['pkDespesa']}'>
                            <i class='fa-solid fa-trash'></i>
                        </label>
                            <input type='hidden' name='key' value='{$despesas['pkDespesa']}'>
                            <input hidden type='submit' id='btnDelete{$despesas['pkDespesa']}' name='method' value='delete'>

                        
                    </form>

                    <form action='' method='post' class='pen'>
                        <label for='update{$despesas['pkDespesa']}'>
                            <i class='fa-solid fa-pen deleteblue'></i>
                        </label>
                        
                    </form>

            </div>";
        
    }
}
if($_POST){

    if($_POST["method"] == "delete"){
    
        $repository->delete($_POST["key"]);

        // echo "<span> DELETE {$_POST["key"]}</span>";

        header("Refresh: 0");
    
    }else if($_POST["method"] == "update"){

        $despesas = Despesas::construct($_POST["novaDespesa"]);
        
        $despesas->setPkDespesa($_POST["key"]);

        $repository->update($despesas); 
        
        header("Refresh: 0");
        // echo "<span> UPDATE {$_POST["key"]}</span>";
    
    }else if($_POST["method"] == "create"){

        $despesas = Despesas::construct($_POST["despesa"]);

        $repository->save($despesas); 
        
        header("Refresh: 0");
    
    }

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
        <li><i id="add" class="fa-solid fa-circle-plus"></i></li>
    </ul>

    

    
    
</nav>



<div class="container">
    <h1 class="title">Despesas</h1>
    
    <?php
        array_map("showListDespesas", $despesasData);
    ?>

    <form action="" method="POST" id="formNew">
        <label for="crearDespesas">Nova despesa</label>
        <input type="text" id="crearDespesas" name="despesa">
        <input type="submit" name="method" value="create">
    </form>
    <div class="desc"></div>
    
</div>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../JS/despesas.js"></script>
</body>
</html>
