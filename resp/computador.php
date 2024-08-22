<?php

include_once('config.php');

   // Checkar conexão
   if ($conexao->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
}
     

// Receber dados do formulário
if (
    isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['tipo']) &&
    isset($_POST['marca']) && isset($_POST['descricao']) &&isset($_POST['preco'])
    &&isset($_POST['disponibilidade'])
) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $disponibilidade = $_POST['disponibiidade'];


    // Preparar e executar a inserção dos dados
    $sql = "INSERT INTO computador (id, nome, tipo, marca, descricao, preco, disponibilidade) VALUES ('$id', '$nome', '$tipo', '$marca', '$descricao', '$spreco', '$disponibilidade')";

    if ($conexao->query($sql) === TRUE) {
        echo "maquina cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar a maquina: " . $conexao->error;
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
            <form id="formulario-cadastro" action="computador" method="post">
              <fieldset id="borda">
                <legend id="title">Cadastro de produto</legend>
         
                <div class="secao-contato">
                  <label for="id produto">id :</label>
                  <input type="number" id="ID" name="ID" placeholder="000.000.000.000" inputmode="numeric" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}" required>
                  <br>
                  <label for="nome">nome:</label>
                  <input type="text" id="nome" name="nome" placeholder = nome required>
                  <br>
                  <label for="tipo">tipo:</label>
                  <input type="text" id="tipo" name="tipo" placeholder="tipo" required>
                <br>
                <label for="marca">marca:</label>
                  <input type="text" id="marca" name="marca" placeholder= marca required>
                  <br>
                <label for="descricao">descricao:</label>
                  <input type="text" id="descricao" name="descricao"placeholder=descricao required>
                  <br>
                  <label for="preco">preco:</label>
                  <input type="number" id="preco" name="preco" placeholder= preco required>
                  <br>
                  <label for="disponibilidade">disponibilidade:</label>
                  <input type="number" id="preco" name="disponibilidade" placeholder=disponibilidade required>
                </div>
                <button type="submit" class="botao-enviar">Cadastrar produto</a>
              </fieldset>
            </form>
</body>
</html>