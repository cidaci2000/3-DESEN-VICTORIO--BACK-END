<?php

include_once('config.php');

   // Checkar conexão
   if ($conexao->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
}
     

// Receber dados do formulário
if (
    isset($_POST['nome']) && isset($_POST['ID']) && isset($_POST['cpf']) &&
    isset($_POST['data de entrada no estoque']) && isset($_POST['email']) &&
    isset($_POST[''])
) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data de entrada no estoque'];
    $email = $_POST['email'];
    $senha = $_POST[''];


    // Preparar e executar a inserção dos dados
    $sql = "INSERT INTO usuarios (nome, cpf, cep, data_nascimento, email, senha) VALUES ('$nome', '$cpf', '$cep', '$data_nascimento', '$email', '$senha')";

    if ($conexao->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . $conexao->error;
    }
} else {
    echo "Erro: Dados do formulário não enviados corretamente.";
}

$conexao->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="div2f"><br>
        
        <main>
            <form id="formulario-cadastro" action="form.php" method="post">
              <fieldset id="borda">
                <legend id="title">Cadastro de produto</legend>
        
                <div class="secao-nome">
                  <label for="nome">Nome do produto:</label>
                  <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>
                </div>
                
                <div class="secao-contato">
                  <label for="cpf">ID produto:</label>
                  <input type="text" id="ID" name="ID" placeholder="000.000.000.000" inputmode="numeric" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}" required>
                  <br>
                  <label for="data_nascimento">Data de Entrada no estoque:</label>
                  <input type="date" id="data_nascimento" name="data_nascimento" required>
                  <br>
                  <label for="email">E-mail:</label>
                  <input type="email" id="email" name="email" placeholder="Seu e-mail" required>
                <br>
                  <br>
                </div>
        
                <button type="submit" class="botao-enviar">Cadastrar produto</button>
              </fieldset>
            </form>
</body>
</html>