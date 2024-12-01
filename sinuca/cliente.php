<?php
// Incluindo o arquivo de configuração do banco de dados
include_once('config.php');



// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados do formulário
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $senha = $_POST['Senha'];

       
       

        // Inserir dados no banco de dados
        $sql = "INSERT INTO clientes (nome, cpf, data_nascimento, email, senha) 
                VALUES ('$nome', '$cpf', '$data_nascimento', '$email', '$senha')";

        if ($conexao->query($sql) === TRUE) {
            echo "<p style='color: green;'>Cadastro realizado com sucesso!</p>";
        } else {
            echo "<p style='color: red;'>Erro ao cadastrar: " . $conexao->error . "</p>";
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Sinuca</title>
    <style>
        /* Estilo Geral do Corpo da Página */
        body {
            font-family: Arial, sans-serif;
            background-color: #84b084;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            padding: 20px;
            
        }

        /* Estilos do Header */
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            width: 100%;
            margin-bottom: 30px;
        }

        /* Estilos do Formulário */
        form {
            max-width: 500px;
            padding: 30px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 40px;
        }

        /* Inputs e botões do formulário */
        form input, form button {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Estilo do botão (Cadastrar) */
        form button {
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        form button:hover {
            background-color: #575757;
        }

        /* Estilos dos Cards (Seções de Links) */
        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin-top: 40px;
            width: 100%;
            
        }
        .form{
            display: flex;
            flex-direction: column;
        }

        /* Estilo Geral dos Cards */
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 5px;
            text-align: center;
            width: 22%; /* Aumento da largura do card */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 30px;
           
        }
        .card h2{
            margin-left: 10%;
        }
        .card:hover {
            transform: scale(1.05);
        }

        /* Ajuste nas Imagens dentro dos Cards */
        .card img {
            width: 100px;
            max-width: 180px;
            height: 80px;
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        header nav{
            background-color: #333;
            
        }

        /* Estilos para o Link dentro do Card */
        .card a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            color: #fff;
            background-color: #333;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        h2{
            margin-left: 20%;
        }
        .card a:hover {
            background-color: #575757;
        }

        /* Responsividade para telas pequenas */
        @media (max-width: 768px) {
            /* Ajusta os cards para que fiquem 2 por linha em telas menores */
            .card {
                width: 48%;
            }
        }

        @media (max-width: 480px) {
            /* Ajuste de estilo para telas ainda menores */
            .card {
                width: 100%;
            }
            form {
                padding: 15px;
                max-width: 100%;
            }
        }
    

        nav {
    background-color: #f2f2f2;
    overflow: hidden;
}


.logo {
    float: left;
}

.nav-links, .nav-actions {
    list-style-type: none;
    margin: 0;
    padding: 0;
    float: right;
    
}

.nav-links li, .nav-actions li {
    display: inline-block;
}

.nav-links li a, .nav-actions li a {
    color: #fff;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.nav-links li a:hover, .nav-actions li a:hover {
    background-color: #ddd;
}
    </style>
</head>
<body>
    <header>
 
        <h1>Bem-vindo ao Site de Sinuca</h1>
        <nav>
            
            <ul class="nav-actions">
                <li><a href="login.php">Login</a></li>
                <li><a href="cliente.php">Cadastro</a></li>
                <li><a href="carrinho.php"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="form">
            <h2>Formulário de Cadastro de Cliente</h2>
            <form action="cliente.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required>

                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>

                <label for="E-mail">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="Senha">Senha:</label>
                <input type="password" id="Senha" name="Senha" required>

                <button type="submit">Cadastrar</button>
            </form>
        </section>
       