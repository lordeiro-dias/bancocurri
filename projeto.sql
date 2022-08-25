SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `projeto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projeto`;

DROP TABLE IF EXISTS `competencias`;
CREATE TABLE `competencias` (
  `id_comp` int(11) NOT NULL,
  `competencia` varchar(255) DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `competencias` (`id_comp`, `competencia`, `id_curr`) VALUES
(1, 'jogar de jax', 1),
(2, 'php', 2),
(3, 'dasdasd', 3);

DROP TABLE IF EXISTS `curriculo`;
CREATE TABLE `curriculo` (
  `id_curr` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `curriculo` (`id_curr`, `nome`, `email`, `curso`, `telefone`) VALUES
(1, 'sampaio', 'sampas@jax.com', 'informatica', '45616548'),
(2, 'eduardo lordeiro', 'teste@teste', 'informatica', '(11)1 1111-111'),
(3, 'sampas', 'sampas@teste', 'ADM', '(11)1 1111-111');

DROP TABLE IF EXISTS `educacao`;
CREATE TABLE `educacao` (
  `id_educ` int(11) NOT NULL,
  `instituicao` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `educacao` (`id_educ`, `instituicao`, `curso`, `inicio`, `fim`, `id_curr`) VALUES
(1, 'ETEC - MCM', 'Informatica', '2021-02-08', '2023-12-20', 1),
(2, 'ETEC - MCM', 'Informática', '2021-02-16', '2023-12-20', 2),
(3, 'aasdad', 'dasddsa', '1111-11-11', '1111-11-11', 3);

DROP TABLE IF EXISTS `experiencias`;
CREATE TABLE `experiencias` (
  `id_exp` int(11) NOT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `ocupacao` varchar(255) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `experiencias` (`id_exp`, `empresa`, `ocupacao`, `inicio`, `fim`, `id_curr`) VALUES
(1, 'Silas\' Company', 'Pedreiro', '2005-05-26', '2023-05-26', 1),
(6, 'dasd', 'asdasd', '2222-02-11', '1111-11-11', 3),
(7, 'aaaa', 'aaaaaa', '2222-02-11', '3333-03-31', 3);

DROP TABLE IF EXISTS `habilidades`;
CREATE TABLE `habilidades` (
  `id_hab` int(11) NOT NULL,
  `habilidade` varchar(255) DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `habilidades` (`id_hab`, `habilidade`, `id_curr`) VALUES
(1, 'proplayer em jax', 1),
(2, 'digitação', 2),
(3, 'asdasd', 3);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`id`, `tipo`, `nome`, `senha`, `email`, `cpf`) VALUES
(1, NULL, 'eduardo lordeiro', '202cb962ac59075b964b07152d234b70', 'teste@teste', '111.222.333-44'),
(2, NULL, 'sampas', 'd93591bdf7860e1e4ee2fca799911215', 'sampas@teste', '333.333.333-33');


ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id_comp`),
  ADD KEY `id_curr` (`id_curr`);

ALTER TABLE `curriculo`
  ADD PRIMARY KEY (`id_curr`);

ALTER TABLE `educacao`
  ADD PRIMARY KEY (`id_educ`),
  ADD KEY `id_curr` (`id_curr`);

ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id_exp`),
  ADD KEY `id_curr` (`id_curr`);

ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id_hab`),
  ADD KEY `id_curr` (`id_curr`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `competencias`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `curriculo`
  MODIFY `id_curr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `educacao`
  MODIFY `id_educ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `experiencias`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `habilidades`
  MODIFY `id_hab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `competencias`
  ADD CONSTRAINT `competencias_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);

ALTER TABLE `educacao`
  ADD CONSTRAINT `educacao_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);

ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);

ALTER TABLE `habilidades`
  ADD CONSTRAINT `habilidades_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
