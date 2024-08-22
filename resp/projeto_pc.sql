-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/08/2024 às 14:08
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
-- Banco de dados: `projeto pc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `nome` varchar(59) NOT NULL,
  `cpf` int(11) NOT NULL,
  `cep` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `headset`
--

CREATE TABLE `headset` (
  `codhs` int(20) NOT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `mic` tinyint(1) DEFAULT NULL,
  `idprod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `monitor`
--

CREATE TABLE `monitor` (
  `codmonitor` int(20) NOT NULL,
  `resolucao` varchar(59) DEFAULT NULL,
  `idprod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mouse`
--

CREATE TABLE `mouse` (
  `codmouse` int(20) NOT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `idprod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pc`
--

CREATE TABLE `pc` (
  `codpc` int(20) NOT NULL,
  `processador` varchar(59) DEFAULT NULL,
  `armazenamento` int(255) DEFAULT NULL,
  `placamae` varchar(59) DEFAULT NULL,
  `memram` varchar(59) DEFAULT NULL,
  `placavid` varchar(59) DEFAULT NULL,
  `fonte` varchar(59) DEFAULT NULL,
  `idprod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `disponibilidade` enum('em_estoque','esgotado','em_breve') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `tipo`, `marca`, `descricao`, `preco`, `disponibilidade`) VALUES
(1, 'bala', 'bala', 'bala', 'sdfdffdf', 11.00, 'em_estoque'),
(2, 'bala', 'bala', 'bala', 'fdfdfdf', 111.00, 'em_estoque'),
(3, 'bala', 'bala', 'bala', 'dfgfgfgfsd', 11.00, 'em_estoque'),
(4, 'bala', 'bala', 'bala', 'fdfdfd', 12.00, 'em_estoque'),
(5, 'bala', 'bala', 'bala', 'fdfdfd', 12.00, 'em_estoque'),
(6, 'bala', 'bala', 'bala', 'fdfdfd', 12.00, 'em_estoque'),
(7, 'bala', 'bala', 'bala', 'fdfdfd', 12.00, 'em_estoque');

-- --------------------------------------------------------

--
-- Estrutura para tabela `teclado`
--

CREATE TABLE `teclado` (
  `codteclado` int(20) NOT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `idprod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `cep`, `data_nascimento`, `email`, `senha`) VALUES
(1, 'APARECIDA DA SILVA FERREIRA', '222.222.222-09', '85807-670', '2024-08-01', 'aparecida.ferreira@gmail.com', '12345678');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `headset`
--
ALTER TABLE `headset`
  ADD PRIMARY KEY (`codhs`),
  ADD KEY `idprod` (`idprod`);

--
-- Índices de tabela `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`codmonitor`),
  ADD KEY `idprod` (`idprod`);

--
-- Índices de tabela `mouse`
--
ALTER TABLE `mouse`
  ADD PRIMARY KEY (`codmouse`),
  ADD KEY `idprod` (`idprod`);

--
-- Índices de tabela `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`codpc`),
  ADD KEY `idprod` (`idprod`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `teclado`
--
ALTER TABLE `teclado`
  ADD PRIMARY KEY (`codteclado`),
  ADD KEY `idprod` (`idprod`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cpf`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `headset`
--
ALTER TABLE `headset`
  ADD CONSTRAINT `headset_ibfk_1` FOREIGN KEY (`idprod`) REFERENCES `produto` (`idprod`);

--
-- Restrições para tabelas `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `monitor_ibfk_1` FOREIGN KEY (`idprod`) REFERENCES `produto` (`idprod`);

--
-- Restrições para tabelas `mouse`
--
ALTER TABLE `mouse`
  ADD CONSTRAINT `mouse_ibfk_1` FOREIGN KEY (`idprod`) REFERENCES `produto` (`idprod`);

--
-- Restrições para tabelas `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `pc_ibfk_1` FOREIGN KEY (`idprod`) REFERENCES `produto` (`idprod`);

--
-- Restrições para tabelas `teclado`
--
ALTER TABLE `teclado`
  ADD CONSTRAINT `teclado_ibfk_1` FOREIGN KEY (`idprod`) REFERENCES `produto` (`idprod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
