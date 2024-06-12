<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./view/CSS/index.css">
    <title>Login</title>
</head>
<body>
<div class="container" id="container">

    <div class="form-container sign-up-container">

        <form action="" method="POST" id="cadastro">

            <h1>Criar Usuário</h1>

            <span>Use seu email para registrar</span>

            <input type="email" name="email" placeholder="Email" required />

            <input type="password" name="password" placeholder="Password" required />

            <input type="password" name="confirmPassword" placeholder="Confirm Password" required />

            <button type="submit" form="POST">Criar</button>
        </form>

    </div>

    <div class="form-container sign-in-container">

        <form action="" method="post" id="login">

            <h1>Login</h1>

            <span>Use sua conta registrada!</span>

            <input type="email" name="email" placeholder="Email" required />

            <input type="password" name="password" placeholder="Password" required />

            <a href="#">Esqueceu sua senha?</a>

            <button type="submit" form="POST">Login</button>

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

    <script src="./view/JS/index.js"></script>
</body>
</html>

