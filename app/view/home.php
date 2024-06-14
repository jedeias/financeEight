<?php 

include_once ("../autoload.php");

$session = new Session();

$session->validate();

$serializeUser = $session->get("serializeUser");

$user = unserialize($serializeUser);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./CSS/home.css">
    <title>Home</title>
</head>
<body>

<nav>
    <ul id="menu">
        <li><a href="#" class="li active"><i class="fas fa-home"></i></a></li>
        <li><a href="#" class="li"><i class="fas fa-user"></i></a></li>
        <li><a href="#" class="li"><i class="fas fa-bell"></i></a></li>
        <li><a href="#" class="li"><i class="fa-solid fa-credit-card"></i></a></li>
        <li><a href="despesas/despesas.php" class="li"><i class="fa-solid fa-chart-column"></i></a></li>
        <li><a href="setting/userSetting.php" class="li"><i class="fa-solid fa-gear"></i></a></li>
        <li><a href="#" class="li"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
    </ul>
    
</nav>

<section class="home">

    <div class="container">
        <h1 class="title">Home</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            It has survived not only five centuries, but also the leap into electronic typesetting,
            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
    </div>

</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./JS/home.js"></script>
</body>
</html>