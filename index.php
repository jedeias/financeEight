<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="app/view/CSS/index.css">
    <title>Login</title>
</head>
<body>
<div class="container" id="container">

    <div class="form-container sign-up-container">

        <form action="app/controllers/register/register.php" method="POST" id="cadastro">

            <h1>Criar Usuário</h1>

            <span>Use seu email para registrar</span>

            <input type="email" name="email" placeholder="Email" required />

            <input type="password" name="password" placeholder="Password" required />

            <input type="text" name="CPF" placeholder="CPF" required />

            <input type="date" name="dataNasc" placeholder="01/01/2000" required />

            <?php if(!empty($_GET["status"])){echo "<span>" . $_GET["status"] . "</span>";}?>
            
            <button type="submit" form="cadastro">Criar</button>
        </form>

    </div>

    <div class="form-container sign-in-container">

        <form action="app/controllers/login/login.php" method="post" id="login">

            <h1>Login</h1>

            <span> Use sua conta registrada! </span>

            <input type="email" name="email" placeholder="Email" required/>

            <input type="password" name="password" placeholder="Password" required/>

            <?php if(!empty($_GET["status"])){echo "<span> email não cadastrado </span>";}?>

            <button type="submit" form="login">Login</button>

        </form>

    </div>

    <div class="overlay-container">
        <div class="overlay">

            <div class="overlay-panel overlay-left">

                <h1>Bem vindo de volta!</h1>

                <p>Use sua conta para entrar</p>

                <button class="ghost" id="signIn">Login</button>

            </div>

            <div class="overlay-panel overlay-right">

                <h1>Bem vindo!</h1>

                <p>Crie sua conta para começar</p>

                <button class="ghost" id="signUp">Criar</button>

            </div>
        </div>
    </div>
</div>

    <script src="app/view/JS/index.js"></script>
</body>
</html>

