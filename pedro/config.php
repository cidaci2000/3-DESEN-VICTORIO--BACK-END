<?php
$dbHost = 'localhost';        // Corrigido para 'localhost'
$dbUsername = 'root';         // Seu nome de usuário para o banco de dados
$dbPassword = '';       // Sua senha para o banco de dados
$dbName = 'pizzaria'; // Nome do banco de dados (sem '.clientes')

// Criar a conexão com o banco de dados
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
}
?>

