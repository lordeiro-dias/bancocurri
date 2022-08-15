CREATE DATABASE projeto;
USE projeto;


CREATE TABLE `competencias` (
  `id_comp` int(11) NOT NULL,
  `competencia` varchar(255) DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `competencias` (`id_comp`, `competencia`, `id_curr`) VALUES
(1, 'jogar de jax', 1);


CREATE TABLE `curriculo` (
  `id_curr` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `curriculo` (`id_curr`, `nome`, `email`, `curso`, `telefone`) VALUES
(1, 'sampaio', 'sampas@jax.com', 'informatica', '45616548');



CREATE TABLE `educacao` (
  `id_educ` int(11) NOT NULL,
  `instituicao` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `educacao` (`id_educ`, `instituicao`, `curso`, `inicio`, `fim`, `id_curr`) VALUES
(1, 'ETEC - MCM', 'Informatica', '2021-02-08', '2023-12-20', 1);



CREATE TABLE `experiencias` (
  `id_exp` int(11) NOT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `ocupacao` varchar(255) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `experiencias` (`id_exp`, `empresa`, `ocupacao`, `inicio`, `fim`, `id_curr`) VALUES
(1, 'Silas\' Company', 'Pedreiro', '2005-05-26', '2023-05-26', 1);



CREATE TABLE `habilidades` (
  `id_hab` int(11) NOT NULL,
  `habilidade` varchar(255) DEFAULT NULL,
  `id_curr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `habilidades` (`id_hab`, `habilidade`, `id_curr`) VALUES
(1, 'proplayer em jax', 1);


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `usuarios` (`id`, `tipo`, `nome`, `senha`, `email`, `cpf`) VALUES
(1, NULL, 'eduardo lordeiro', '202cb962ac59075b964b07152d234b70', 'teste@teste', '111.222.333-44');


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
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `curriculo`
  MODIFY `id_curr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `educacao`
  MODIFY `id_educ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `experiencias`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `habilidades`
  MODIFY `id_hab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `competencias`
  ADD CONSTRAINT `competencias_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);


ALTER TABLE `educacao`
  ADD CONSTRAINT `educacao_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);


ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);


ALTER TABLE `habilidades`
  ADD CONSTRAINT `habilidades_ibfk_1` FOREIGN KEY (`id_curr`) REFERENCES `curriculo` (`id_curr`);
COMMIT;


