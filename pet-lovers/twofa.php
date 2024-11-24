<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA</title>
    <link rel="stylesheet" href="css/twofa.css">
</head>
<body>
 

<?php
 $id = $_POST['id'];
?>
<div class="login-container">
        <img src="img/logo.png" alt="Logo" class="logo">
        <h1>Bem-vindo de Volta!</h1>
        <form action="process-twofa.php" method="post" >
            <input type="hidden" name="caralho" id="" value="<?php echo $id;?>">
            <h3>Qual o nome da sua mãe ?</h3>
            <input type="text" id="login" name="pergunta1" placeholder="Digite aqui..." required>
            <h3>Qual a sua data de nascimento ?</h3>
            <input type="date" id="login" name="pergunta2" placeholder="Digite aqui..." pattern="\d{4}-\d{2}-\d{2}" required>
            <h3>Qual o cep do seu endereço ?</h3>
            <input type="text" id="login" name="pergunta3" placeholder="Digite aqui..." required>
            <button type="submit">Entrar</button>
            <p>Não tem uma conta? <a href="cadastro.php">Criar Conta</a></p>
        </form>
    </div>
    <script src="login.js"></script>
</body>
</html>