<?php
// Verifica se a sessão já foi iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Definir as credenciais de conexão com o banco de dados
$host = "localhost";
$dbname = "sinuca"; // Nome do banco de dados
$username = "root"; // Usuário do banco de dados
$password = ""; // Senha do banco de dados

// Criar a conexão com o banco de dados
$conexao = new mysqli($host, $username, $password, $dbname);


