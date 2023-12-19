-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/12/2023 às 12:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prefeitura`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Marieli Reis', 'marieli.reis@paradis.gov.br', '123456'),
(2, 'Flávio Duarte', 'flavio.duarte@paradis.gov.br', '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `protocolos`
--

CREATE TABLE `protocolos` (
  `id` int(11) NOT NULL,
  `descr` varchar(350) NOT NULL,
  `data` date NOT NULL,
  `prazo` date NOT NULL,
  `nomecont` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `protocolos`
--

INSERT INTO `protocolos` (`id`, `descr`, `data`, `prazo`, `nomecont`) VALUES
(60, 'Problemas nos muros da cidade, pedaços caindo e machucando pessoas.', '2023-08-10', '2023-09-10', 'Mikasa Ackerman'),
(63, 'Garotos menores de idade causando confusão na feira local, roubando e agredindo cidadões.', '2023-06-13', '2023-07-13', 'Armin Arlet');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuários`
--

CREATE TABLE `usuários` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `datanasc` varchar(10) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `cidade` varchar(140) NOT NULL,
  `bairro` varchar(140) NOT NULL,
  `rua` varchar(140) NOT NULL,
  `numero` int(50) NOT NULL,
  `complemento` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuários`
--

INSERT INTO `usuários` (`id`, `nome`, `datanasc`, `cpf`, `sexo`, `cidade`, `bairro`, `rua`, `numero`, `complemento`) VALUES
(12, 'Mikasa Ackerman', '2004-02-10', '08100228000', 'Feminino', 'Paradis', 'Maria', 'Lancelote Alves', 50, 'Porta branca'),
(13, 'Armin Arlet', '2004-11-03', '391.206.360', 'Masculino', 'Paradis', 'Maria', 'Carvalho Dourado', 45, 'Cerca de madeira');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `protocolos`
--
ALTER TABLE `protocolos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuários`
--
ALTER TABLE `usuários`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `protocolos`
--
ALTER TABLE `protocolos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `usuários`
--
ALTER TABLE `usuários`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
