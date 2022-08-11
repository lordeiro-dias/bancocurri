-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Ago-2022 às 13:21
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencias`
--

CREATE TABLE `competencias` (
  `id_comp` int(11) NOT NULL,
  `competencia` varchar(255) DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `competencias`
--

INSERT INTO `competencias` (`id_comp`, `competencia`, `id_curr`) VALUES
(1, 'jogar de jax', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculo`
--

CREATE TABLE `curriculo` (
  `id_curr` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curriculo`
--

INSERT INTO `curriculo` (`id_curr`, `nome`, `email`, `curso`, `telefone`) VALUES
(1, 'sampaio', 'sampas@jax.com', 'informatica', '45616548');

-- --------------------------------------------------------

--
-- Estrutura da tabela `educacao`
--

CREATE TABLE `educacao` (
  `id_educ` int(11) NOT NULL,
  `instituicao` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `educacao`
--

INSERT INTO `educacao` (`id_educ`, `instituicao`, `curso`, `inicio`, `fim`, `id_curr`) VALUES
(1, 'ETEC - MCM', 'Informatica', '2021-02-08', '2023-12-20', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencias`
--

CREATE TABLE `experiencias` (
  `id_exp` int(11) NOT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `ocupacao` varchar(255) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `experiencias`
--

INSERT INTO `experiencias` (`id_exp`, `empresa`, `ocupacao`, `inicio`, `fim`, `id_curr`) VALUES
(1, 'Silas\' Company', 'Pedreiro', '2005-05-26', '2023-05-26', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilidades`
--

CREATE TABLE `habilidades` (
  `id_hab` int(11) NOT NULL,
  `habilidade` varchar(255) DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `habilidades`
--

INSERT INTO `habilidades` (`id_hab`, `habilidade`, `id_curr`) VALUES
(1, 'proplayer em jax', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nome`, `senha`, `email`, `cpf`) VALUES
(1, NULL, 'eduardo lordeiro', '202cb962ac59075b964b07152d234b70', 'teste@teste', '111.222.333-44');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id_comp`),
  ADD KEY `id_curr` (`id_curr`);

--
-- Índices para tabela `curriculo`
--
ALTER TABLE `curriculo`
  ADD PRIMARY KEY (`id_curr`);

--
-- Índices para tabela `educacao`
--
ALTER TABLE `educacao`
  ADD PRIMARY KEY (`id_educ`),
  ADD KEY `id_curr` (`id_curr`);

--
-- Índices para tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id_exp`),
  ADD KEY `id_curr` (`id_curr`);

--
-- Índices para tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id_hab`),
  ADD KEY `id_curr` (`id_curr`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `curriculo`
--
ALTER TABLE `curriculo`
  MODIFY `id_curr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `educacao`
--
ALTER TABLE `educacao`
  MODIFY `id_educ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id_hab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `competencias_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);

--
-- Limitadores para a tabela `educacao`
--
ALTER TABLE `educacao`
  ADD CONSTRAINT `educacao_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);

--
-- Limitadores para a tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);

--
-- Limitadores para a tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `habilidades_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
