<?php
session_start();
include 'config.php'; // Arquivo com as configurações do banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Get form data
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$tipo = $_POST['tipo'];

// Handle image upload
$target_dir = "imagem/";
$target_file = $target_dir . basename($_FILES["imagem"]["name"]);
move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

// Prepare and execute the SQL statement
$sql = "INSERT INTO produtos (nome, descricao, preco, tipo, imagem) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssdss", $nome, $descricao, $preco, $tipo, $target_file);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar produto: " . $conexao->error;
}
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #84b084;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            flex-direction: column;
        }
        .form-container {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Cadastrar Novo Produto</h2>
    <form method="POST" action="cadastrar_produto.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" required>
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" required>
    </div>
    <div class="form-group">
        <label for="tipo">Tipo de Produto:</label>
        <select id="tipo" name="tipo" required>
            <option value="mesa">Mesa de Sinuca</option>
            <option value="ficha">Ficha de Sinuca</option>
        </select>
    </div>
    <div class="form-group">
        <label for="imagem">Imagem do Produto:</label>
        <input type="file" id="imagem" name="imagem">
    </div>
    <div class="form-group">
        <button type="submit">Cadastrar Produto</button>
    </div>
</form>
</div>

</body>
</html>
