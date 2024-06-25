<?php
include_once('config.php');

// Checkar conexão
if ($conexao->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
}

// Receber dados do formulário
if (isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['email']) && isset($_POST['data_nascimento'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
} else {
    echo "Erro: Dados do formulário não enviados corretamente.";
}

// Verificar se o e-mail já existe
$sql_verifica_email = "SELECT COUNT(*) FROM usuarios WHERE email = '$email'";
$resultado_verifica = $conexao->query($sql_verifica_email);

if ($resultado_verifica->fetch_row()[0] > 0) {
    echo "Erro: E-mail já cadastrado. Tente outro e-mail.";
} else {
    // Se o e-mail não existir, prosseguir com a inserção
    $sql = "INSERT INTO usuarios (nome, senha, email, data_nascimento) VALUES ('$nome', '$senha', '$email', '$data_nascimento')";

    if ($conexao->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . $conexao->error;
    }
}

$conexao->close();


?>
<!DOCTYPE html>
<head>
<html lang="pt-br">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="pg_cadast.css"> 
<title>Cadastro de Usuários</title>
</head>
<body>
<div class="logo"></div>
 <h1>Cadastro de Usuário</h1>
<form action="pg_cadastro.php" method="post" onsubmit="limparFormulario()">
  <label for="nome">Nome:</label>
  <input type="text" id="nome" name="nome" required>

  <label for="senha">Senha:</label>
  <input type="password" id="senha" name="senha" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="data_nascimento">Data de Nascimento:</label>
  <input type="date" id="data_nascimento" name="data_nascimento" required>

  <button type="submit">Cadastrar</button>
</form>


</body>
</html>
