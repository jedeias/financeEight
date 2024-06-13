<?php
include_once ("../../autoload.php");


$session = new Session();

$session->validate();

$serializeUser = $session->get("serializeUser");

$user = unserialize($serializeUser);

if($_POST){

    if($_POST["method"] == "update"){
        $repositoryPessoas = new RepositoryPessoas();

        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setCpf($_POST["CPF"]);
        $user->setDataNascimento($_POST["dataNasc"]);

        $repositoryPessoas->update($user);
    }else if($_POST["method"] == "delete"){
        $repositoryPessoas = new RepositoryPessoas();

        $teste = $repositoryPessoas->delete($user->getPkPessoa());

        $session->destroy();

        
        $url = "http://localhost/financeEight";
        
        header("Location: $url");
    }

}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/userSettings.css">
    <title>Setting</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" id="userUpdate">

            <h1 class="title">Atualização de Usuario</h1>

            <input type="email" name="email" <?php echo "value='{$user->getEmail()}'" ?> placeholder="Email" required />

            <input type="password" name="password" <?php echo "value='{$user->getPassword()}'" ?> placeholder="Password" required />

            <input type="text" name="CPF" placeholder="CPF" <?php echo "value='{$user->getCpf()}'" ?> required />

            <input type="date" name="dataNasc" placeholder="01/01/2000" <?php echo "value='{$user->getDataNascimento()}'" ?> required />

            
            <input type="submit" value="update" name="method">
        </form>

        <form action="" method="post" id="userDelete">
            <input type="submit" name="method" value="delete">
        </form>
    </div>

</body>
</html>