<?php
session_start();
require 'conexao.php'; 


if (!isset($_SESSION['usuario_id'])) {
    die("Você precisa estar logado para alterar sua senha.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['usuario_id'];
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    
    if ($nova_senha !== $confirmar_senha) {
        die("A nova senha e a confirmação não correspondem.");
    }

    
    $sql = "SELECT senha FROM usuarios WHERE id = $usuario_id";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        
        if (!password_verify($senha_atual, $usuario['senha'])) {
            die("Senha atual incorreta.");
        }

        
        $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        
        $sql = "UPDATE usuarios SET senha = '$nova_senha_hash' WHERE id = $usuario_id";
        if (mysqli_query($conexao, $sql)) {
            echo "Senha alterada com sucesso!";
        } else {
            die("Erro ao alterar a senha: " . mysqli_error($conexao));
        }
    } else {
        die("Usuário não encontrado.");
    }
} else {
    die("Método inválido.");
}
?>
