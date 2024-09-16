<?php
include_once('config.php');

class Usuario {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function cadastrar($nome, $email, $senha, $confirmarSenha) {
        // Validações
        if (empty($nome) || empty($email) || empty($senha) || empty($confirmarSenha)) {
            return ['error' => 'Preencha todos os campos.'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['error' => 'Formato de email inválido.'];
        }

        if (strlen($senha) < 8) {
            return ['error' => 'A senha deve ter no mínimo 8 caracteres.'];
        }

        if ($senha !== $confirmarSenha) {
            return ['error' => 'As senhas não coincidem.'];
        }

        // Verifica se o email já existe
        $sql = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            return ['error' => 'Email já cadastrado.'];
        }

        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Insere o usuário
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param('sss', $nome, $email, $senhaHash);

        if ($stmt->execute()) {
            return ['success' => 'Usuário cadastrado com sucesso!'];
        } else {
            return ['error' => 'Erro ao cadastrar o usuário: ' . $stmt->error];
        }
    }
}

// Verifica conexão com o banco de dados
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

// Cria um objeto usuário
$usuario = new Usuario($conexao);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário (com validação adicional recomendada)
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmaSenha'];

    $resultado = $usuario->cadastrar($nome, $email, $senha, $confirmarSenha);
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="cliente.css">
</head>
<body>
<div class="container">
  <h1>Cadastro de Cliente</h1>
  <form action="cliente.php" method="post" id="registrationForm">
    <div class="form-group">
      <label for="nome">Nome Completo:</label>
      <input type="text" id="nome" name="nome" placeholder="Entre com seu nome completo" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Entre com seu email" required>
    </div>

    <div class="form-group">
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" placeholder="Crie uma senha" required>
      <span class="password-strength" id="passwordStrength"></span>
    </div>

    <div class="form-group">
      <label for="confirmaSenha">Confirmar Senha:</label>
      <input type="password" id="confirmaSenha" name="confirmaSenha" placeholder="Digite a senha novamente" required>
    </div>

    <div class="form-actions">
      <button type="submit">Cadastrar</button>
      <a href="venda.php"><button>Carrinho</button></a> <button type="reset">Limpar</button>
    </div>

    <p class="form-message" id="formMessage"></p>
  </form>
</div>
</body>
</html>