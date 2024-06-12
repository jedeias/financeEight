<?php
include_once ("../../autoload.php");


$session = new Session();

$session->validate();

$serializeUser = $session->get("serializeUser");

$user = unserialize($serializeUser);

if($_POST){
    
    $repositoryPessoas = new RepositoryPessoas();

    $user->setEmail($_POST["email"]);
    $user->setPassword($_POST["password"]);
    $user->setCpf($_POST["CPF"]);
    $user->setDataNascimento($_POST["dataNasc"]);

    $repositoryPessoas->update($user);

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
</head>
<body>
    <form action="" method="post" id="userUpdate">

        <input type="email" name="email" <?php echo "value='{$user->getEmail()}'" ?> placeholder="Email" required />

        <input type="password" name="password" <?php echo "value='{$user->getPassword()}'" ?> placeholder="Password" required />

        <input type="text" name="CPF" placeholder="CPF" <?php echo "value='{$user->getCpf()}'" ?> required />

        <input type="date" name="dataNasc" placeholder="01/01/2000" <?php echo "value='{$user->getDataNascimento()}'" ?> required />

        <button type="submit" from="userUpdate">Enviar</button>
            
    </form>
</body>
</html>