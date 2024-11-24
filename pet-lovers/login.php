<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
 
<div class="login-container">
        <h1>Bem-vindo de Volta!</h1>
        <form action="process-login.php" method="post" >
            <input type="text" id="login" name="login" placeholder="Digite seu login" required>
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
            <button type="submit">Entrar</button>
            <p>Não tem uma conta? <a href="cadastro.html">Criar Conta</a></p>
        </form>
    </div>
</body>
</html>
