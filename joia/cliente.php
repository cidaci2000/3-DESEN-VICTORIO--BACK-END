<?php
// Include database configuration file
include_once('config.php');

// Check database connection
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

// Initialize variables to store user data
$nome = "nome";
$email = "email";
$senha = "senha";
$confirmarSenha = "confirmaSenha";

// Check if form data has been submitted
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirmaSenha'])) {
    // Sanitize and escape user input to prevent XSS attacks
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $confirmarSenha = filter_input(INPUT_POST, 'confirmaSenha', FILTER_SANITIZE_STRING);

    // Validate user data
    if (empty($nome) || empty($email) || empty($senha) || empty($confirmarSenha)) {
        $errorMessage = "Preencha todos os campos.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Formato de email inválido.";
    } else if (strlen($senha) < 8) {
        $errorMessage = "A senha deve ter no mínimo 8 caracteres.";
    } else if ($senha !== $confirmarSenha) {
        $errorMessage = "As senhas não coincidem.";
    } else {
        // Hash the password using a strong hashing algorithm
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Check if email already exists in the database
        $sqlVerificaEmail = "SELECT COUNT(*) FROM usuarios WHERE email = '$email'";
        $resultadoVerificaEmail = $conexao->query($sqlVerificaEmail);
        if ($resultadoVerificaEmail->fetch_row()[0] > 0) {
            $errorMessage = "Email já cadastrado.";
        } else {
            // Insert new user into the database
            $sqlInsertUser = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";
            if ($conexao->query($sqlInsertUser) === TRUE) {
                $successMessage = "Usuário cadastrado com sucesso!";
            } else {
                $errorMessage = "Erro ao cadastrar o usuário: " . $conexao->error;
            }
        }
    }
}

// Close database connection
$conexao->close();
?>

<?php if (isset($errorMessage)) : ?>
    <div class="error-message"><?php echo $errorMessage; ?></div>
<?php elseif (isset($successMessage)) : ?>
    <div class="success-message"><?php echo $successMessage; ?></div>
<?php endif; 
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
    <span class="password-strength" id="passwordStrength"></span>  </div>

  <div class="form-group">
    <label for="confirmaSenha">Confirmar Senha:</label>
    <input type="password" id="confirmaSenha" name="confirmaSenha" placeholder="Digite a senha novamente" required>
  </div>

  <div class="form-actions">
    <button type="submit">Cadastrar</button>
    <button type="reset">Limpar</button>
  </div>

  <p class="form-message" id="formMessage"></p> </form>
 
    </div>
</body>
</html>