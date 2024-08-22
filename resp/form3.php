<?php

include_once('config.php');


// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Coleta os dados do formulário
  $nome = $_POST['nome']; 
  $tipo = $_POST['tipo'];
  $marca = $_POST['marca'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $disponibilidade = $_POST['disponibilidade'];

  // Insere os dados na tabela
  $sql = "INSERT INTO produtos (nome, tipo, marca, descricao, preco, disponibilidade)
          VALUES ('$nome', '$tipo', '$marca', '$descricao', '$preco', '$disponibilidade')";

  if ($conexao->query($sql) === TRUE) {
      echo "Novo produto cadastrado com sucesso!";
  } else {
      echo "Erro ao cadastrar produto: " . $conexao->error;
  }
}

// Fecha a conexão
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
    <fieldset id="borda">
    <br>
<form id="formulario-cadastro" action="form3.php" method="post">
    <fieldset id="borda">
      <br>
        <legend id="title">Cadastro de produto</legend>

        <div class="secao-contato">
            
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br>
            <br> 
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" placeholder="Tipo" required>
            <br>
            <br>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>
            <br>
            <br>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
            <br>
            <br>
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco"  step="0.01" required>
            <br>
            <br>
            <label for="disponibilidade">Disponibilidade:</label>
            <br>
            <select id="disponibilidade" name="disponibilidade" required>
                <option value="em_estoque">Em estoque</option> 
                <option value="esgotado">Esgotado</option>
                <option value="em_breve">Em breve</option>
            </select>
        </div>
   
        <br>
        <button type="submit" class="botao-enviar">Cadastrar produto</button>
    </fieldset>
    </div> 
</form>
        
        
            
</body>
</html>