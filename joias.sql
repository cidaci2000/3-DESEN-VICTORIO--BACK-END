-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/08/2024 às 17:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `joias`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `joia_id` int(11) NOT NULL,
  `nome_joia` varchar(255) NOT NULL,
  `tipo_joia` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `imagens` text DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`joia_id`, `nome_joia`, `tipo_joia`, `material`, `valor`, `imagens`, `data_cadastro`) VALUES
(1, 'APARECIDA DA SILVA FERREIRA', 'anel', 'dasdasdas', 123.00, '668723fa38cc0.jpg', '2024-07-04 19:36:42'),
(2, 'APARECIDA DA SILVA FERREIRA', 'anel', 'dasdasdas', 123.00, '66872475d61d8.jpg', '2024-07-04 19:38:45'),
(3, 'bolsa', 'brinco', 'dasdasdas', 100.00, '66b215c816b0b.jpg', '2024-08-06 09:23:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ConfirmaSenha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_cliente`, `nome`, `email`, `senha`, `ConfirmaSenha`) VALUES
(1, '', '', '', ''),
(5, 'ANABELL', 'ANABELL@GMAIL.COM', '$2y$10$3EK86Ak3kZyd8/x1kVpSU.YoOkcfTt3DDSpiOX.HV4k2noz1prVJO', ''),
(4, 'APARECIDA DA SILVA FERREIRA', 'aparecida.ferreira@gmail.com', '$2y$10$fTa4YWEWpspy/Dz2hfPzneHUUb8MPsqGwMDGEPtDbLXU03v9sqDOO', ''),
(2, 'APARECIDA DA SILVA FERREIRA', 'junes@gmail.com', '$2y$10$tpC5viLSh4QCCIaP0WG6nuinUGbGL7yjP5zM4EcXyXTBW4MBCWUeK', ''),
(3, 'SEGUNDO ANO BANCO DE DADOS', 'maria@gmail.com', '$2y$10$qYWiYhKeyQU/x8zIJ7egXuvm3QGZUvWom7BrNdDri3OgA5XlXCSwW', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`joia_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD UNIQUE KEY `id_cliente` (`id_cliente`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `joia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
