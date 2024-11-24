<?php
// Conexão com o banco de dados
$servername = "localhost"; // ou o endereço do seu servidor
$username = "root";
$password = "";
$dbname = "mg";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
$usuario = null;
$usuario_cad = null;
if (isset($_GET['id'])) {
    $id = intval($_POST['id']);

    // Recuperando os dados do usuário
    $sql = "SELECT * FROM login WHERE id = $id";
    $email_sql = "SELECT email from usuarios where id = $id";

    
    $result = $conn->query($sql);
    $result_cad = $conn->query($email_sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "<p>Usuário não encontrado.</p>";
        exit;
    }
    
    if ($result_cad->num_rows > 0) {
        $usuario_cad = $result->fetch_assoc();
    } else {
        echo "<p>Usuário não encontrado.</p>";
        exit;
    }
}

// Verificando se os dados foram enviados para atualização
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);

    // Atualizando os dados do usuário
    $sql = "UPDATE login SET login = '$nome' where id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Usuário atualizado com sucesso!</p>";
        // Recupere os dados novamente após a atualização
        $result = $conn->query("SELECT * FROM usuarios WHERE id = $id");
        $usuario = $result->fetch_assoc();
    } else {
        echo "<p>Erro ao atualizar usuário: " . $conn->error . "</p>";
    }
    $sql_email = "UPDATE usuarios SET email = '$email' where id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Usuário atualizado com sucesso!</p>";
        // Recupere os dados novamente após a atualização
        $result = $conn->query("SELECT * FROM usuarios WHERE id = $id");
        $usuario = $result->fetch_assoc();
    } else {
        echo "<p>Erro ao atualizar usuário: " . $conn->error . "</p>";
    }
}

// Fechando a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Administração de Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .message {
            margin-top: 20px;
            font-size: 1.2em;
            color: #d9534f;
        }
    </style>
</head>
<body>
    <h1>Administração de Usuário</h1>
    
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $usuario['login']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $usuario_cad['email']; ?>" required>

            <button type="submit">Atualizar</button>
        </form>

</body>
</html>
