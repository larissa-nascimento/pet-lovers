<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif, Helvetica;
            margin: 0;
            color: black;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center; 
            align-items: flex-start; 
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box; 
        }
        .form-container {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px; 
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); 
            margin: 20px;
            overflow-y: auto;
            max-height: 90vh;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 48%;
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;
            background-color: #e76f51; 
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover {
            background-color: #e76f51;
            background-color: #d1495b;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
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
?>
    <script>
        // Função para buscar o endereço pelo CEP
        function buscarEndereco() {
            const cep = document.getElementById("cep").value.replace(/\D/g, '');

            if (cep.length === 8) {
                const url = `https://viacep.com.br/ws/${cep}/json/`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById("endereco").value = `${data.logradouro}, ${data.bairro}, ${data.localidade} - ${data.uf}`;
                        } else {
                            alert("CEP não encontrado!");
                        }
                    })
                    .catch(() => alert("Erro ao buscar o CEP!"));
            } else {
                alert("CEP inválido! Insira apenas números e no formato correto.");
            }
        }

        // Função para validar CPF
        function validarCPF() {
            const cpf = document.getElementById("cpf").value.replace(/\D/g, '');

            if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
                alert("CPF inválido!");
                return false;
            }

            let soma = 0;
            let resto;

            // Validação do primeiro dígito verificador
            for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i-1, i)) * (11 - i);
            resto = (soma * 10) % 11;

            if ((resto === 10) || (resto === 11)) resto = 0;
            if (resto !== parseInt(cpf.substring(9, 10))) {
                alert("CPF inválido!");
                return false;
            }

            soma = 0;
            // Validação do segundo dígito verificador
            for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i-1, i)) * (12 - i);
            resto = (soma * 10) % 11;

            if ((resto === 10) || (resto === 11)) resto = 0;
            if (resto !== parseInt(cpf.substring(10, 11))) {
                alert("CPF inválido!");
                return false;
            }

            return true;
        }

        // Função para validar telefone celular e fixo
        function validarTelefones() {
            const celular = document.getElementById("celular").value;
            const telefoneFixo = document.getElementById("telefone_fixo").value;

            const celularRegex = /^\(\d{2}\)\s\d{5}-\d{4}$/;
            const telefoneFixoRegex = /^\(\d{2}\)\s\d{4}-\d{4}$/;

            if (!celularRegex.test(celular)) {
                alert("Número de celular inválido! O formato correto é (00) 00000-0000.");
                return false;
            }

            if (telefoneFixo && !telefoneFixoRegex.test(telefoneFixo)) {
                alert("Número de telefone fixo inválido! O formato correto é (00) 0000-0000.");
                return false;
            }

            return true;
        }

        // Função principal de validação antes do envio do formulário
        function validarFormulario() {
            // Verifica CPF
            if (!validarCPF()) return false;

            // Verifica telefones
            if (!validarTelefones()) return false;

            // Verifica CEP
            const cep = document.getElementById("cep").value.replace(/\D/g, '');
            if (cep.length !== 8) {
                alert("CEP inválido! Insira o CEP no formato 00000-000.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Cadastro do Usuário</h2>

        <form onsubmit="return validarFormulario()">
            <!-- Nome completo -->
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>

            <!-- Data de nascimento -->
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <!-- Sexo -->
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outro">Outro</option>
                <option value="prefiro_nao_dizer">Prefiro não dizer</option>
            </select>

            <!-- Nome materno -->
            <label for="nome_materno">Nome Materno:</label>
            <input type="text" id="nome_materno" name="nome_materno" required>

            <!-- CPF -->
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="000.000.000-00" required>

            <!-- E-mail -->
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <!-- Telefone Celular -->
            <label for="celular">Telefone Celular:</label>
            <input type="tel" id="celular" name="celular" pattern="\(\d{2}\)\s\d{5}-\d{4}" placeholder="(00) 00000-0000" required>

            <!-- Telefone Fixo -->
            <label for="telefone_fixo">Telefone Fixo:</label>
            <input type="tel" id="telefone_fixo" name="telefone_fixo" pattern="\(\d{2}\)\s\d{4}-\d{4}" placeholder="(00) 0000-0000">

            <!-- CEP -->
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" pattern="\d{5}-\d{3}" placeholder="00000-000" required onblur="buscarEndereco()">

            <!-- Endereço completo (preenchido automaticamente pelo CEP) -->
            <label for="endereco">Endereço Completo:</label>
            <input type="text" id="endereco" name="endereco" required>

            <!-- Complemento -->
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" placeholder="Ex: Apto, Bloco, Sala">

            <!-- Login -->
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>

            <!-- Senha -->
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <!-- Confirmação da senha -->
            <label for="confirm_senha">Confirmação da Senha:</label>
            <input type="password" id="confirm_senha" name="confirm_senha" required>

            <!-- Botões -->
            <div class="buttons">
                <button type="submit">Enviar</button>
                <button type="reset">Limpar Tela</button>
            </div>
        </form>
    </div>
</body>
</html>
