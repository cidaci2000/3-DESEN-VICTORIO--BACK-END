

<?php

// Função para validação de campos
function validarCampo($campo) {
  return !empty($campo) && trim($campo) != "";
}

// Função para converter preço para float
function converterParaFloat($preco) {
  return floatval(str_replace(",", ".", $preco));
}

// Função para upload de imagem
function uploadImagem($imagem) {
  $target_dir = "images/";
  $target_file = $target_dir . basename($imagem["name"]);

  if (!move_uploaded_file($imagem["tmp_name"], $target_file)) {
    return null;
  }

  return $target_file;
}

// Conexão com o banco de dados
$conn = new PDO('mysql:host=localhost;dbname=mc', 'root', '');

// Verificação de envio do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Dados do formulário
 
  $nome = $_POST["nome"];
  $preco = converterParaFloat($_POST["preco"]);
  $descricao = $_POST["descricao"];
  $imagem = $_FILES["imagem"];

  // Validação de campos
  $erros = [];
 
  if (!validarCampo($nome)) {
    $erros[] = "O campo nome é obrigatório.";
  }
  if (!validarCampo($preco)) {
    $erros[] = "O campo preço é obrigatório e deve ser um número válido.";
  }
  if (!validarCampo($descricao)) {
    $erros[] = "O campo descrição é obrigatório.";
  }
  
  
  
  // Upload da imagem
  $imagem_path = null;
  if (isset($imagem) && $imagem["error"] === 0) {
    $imagem_path = uploadImagem($imagem);
    if (!$imagem_path) {
      $erros[] = "Erro ao enviar a imagem.";
    }
  }

  // Se não houver erros, cadastra o produto
  if (empty($erros)) {
    $stmt = $conn->prepare("INSERT INTO produto (nome, preco, descricao, imagem) VALUES (:nome, :preco, :descricao, :imagem)");
    
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':imagem', $imagem_path);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      echo "<p>Produto cadastrado com sucesso!</p>";
    } else {
      echo "<p>Erro ao cadastrar o produto.</p>";
    }
  } else {
    // Exibe os erros
    echo "<ul>";
    foreach ($erros as $erro) {
      echo "<li>$erro</li>";
    }
    echo "</ul>";
  }
}
?>

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="cadastprod.css">
</head>
<body>
    <div class="logo"></div>
<div class="container">
    <h2>Cadastro de Produto</h2>
    <form action="cadastprod.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" min="0" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="images/*">
        </div>
        <div class="form-group">
        <button type="submit">Enviar</button>
        </div>
    </form>
</div>

</body>
</html>
