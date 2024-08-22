<?php

include_once('config.php');

   // Checkar conexão
   if ($conexao->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
}
     

// Receber dados do formulário
if (
    isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['cep']) &&
    isset($_POST['data_nascimento']) && isset($_POST['email']) &&
    isset($_POST['senha'])
) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];


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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Oferta de Computadores</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Oferta Especial: Computadores Incríveis!</h1>
        <p>Confira nossas promoções exclusivas em computadores de última geração.</p>
        <ul>
            <li>Desktops potentes para trabalho e jogos</li>
            <li>Notebooks ultrafinos com alta performance</li>
            <li>Monitores de alta resolução</li>
            <li>Acessórios essenciais: teclados, mouses e muito mais</li>
        </ul>
        <p>Não perca essa oportunidade! Visite nossa loja online agora mesmo.</p>
        <p><a href="https://www.exemplo.com/loja-de-computadores">Clique aqui para ver as ofertas</a></p>
    </div>
</body>
</html>
