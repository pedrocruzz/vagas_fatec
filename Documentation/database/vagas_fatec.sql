-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Dez-2022 às 16:50
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vagas_fatec`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `checarDataFechar` ()   BEGIN
DECLARE idSelecionado INT;
DECLARE checarData DATE;
DECLARE i INT; 
SELECT idSelecionado = id 
FROM vagas 
ORDER BY id DESC 
LIMIT 1;
SET i = 0;
loopVagas: LOOP
SELECT checarData = dataFechar, id
FROM vagas
WHERE ativa = 1 && aprovada = 1 && id = idSelecionado; 
IF idSelecionado = 0 THEN
	LEAVE loopVagas;
END IF;
IF checarData = CURRENT_DATE THEN
	UPDATE vagas 
     SET fechada = 1 
     WHERE id = idSelecionado;
END IF;
SET i = i + 1;
SET idSelecionado = idSelecionado - i;
END LOOP loopVagas;  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `ra` varchar(14) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `curriculo` longtext DEFAULT NULL,
  `curso` varchar(55) NOT NULL,
  `periodo` int(2) NOT NULL,
  `dataNascimento` date NOT NULL,
  `areaInteresse` varchar(200) NOT NULL,
  `dataCadastro` date DEFAULT current_timestamp(),
  `fotoPerfil` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `nomeFantasia` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `website` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `senha` varchar(55) NOT NULL,
  `parceria` tinyint(1) DEFAULT 0,
  `id_vagas` varchar(11) NOT NULL,
  `nome_vagas` varchar(255) NOT NULL,
  `cep` varchar(12) NOT NULL,
  `areaAtuacao` varchar(200) NOT NULL,
  `aprovada` int(11) NOT NULL DEFAULT 2,
  `dataCadastro` date DEFAULT current_timestamp(),
  `fotoPerfil` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatec`
--

CREATE TABLE `fatec` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagapreenchida`
--

CREATE TABLE `vagapreenchida` (
  `id` int(11) NOT NULL,
  `id_vagas` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `dataPreenchimento` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `dataAbrir` date NOT NULL,
  `periodoVagaAberta` int(11) NOT NULL,
  `salario` float NOT NULL,
  `nivelExperiencia` varchar(55) NOT NULL,
  `descricaoQualificacao` varchar(550) NOT NULL,
  `descricaoFuncoes` varchar(550) NOT NULL,
  `descricaoBeneficios` varchar(550) NOT NULL,
  `tipo` varchar(55) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `ativa` tinyint(1) NOT NULL DEFAULT 1,
  `aprovada` int(1) DEFAULT 2,
  `dataFechar` date DEFAULT NULL,
  `fechada` int(11) NOT NULL DEFAULT 2,
  `nome_empresa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fatec`
--
ALTER TABLE `fatec`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vagapreenchida`
--
ALTER TABLE `vagapreenchida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vagapreenchida_ibfk_1` (`id_vagas`),
  ADD KEY `vagapreenchida_ibfk_2` (`id_aluno`);

--
-- Índices para tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fatec`
--
ALTER TABLE `fatec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vagapreenchida`
--
ALTER TABLE `vagapreenchida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `vagapreenchida`
--
ALTER TABLE `vagapreenchida`
  ADD CONSTRAINT `vagapreenchida_ibfk_1` FOREIGN KEY (`id_vagas`) REFERENCES `vagas` (`id`),
  ADD CONSTRAINT `vagapreenchida_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`);

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `vagas_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `vagas_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `FecharVagas` ON SCHEDULE EVERY 1 DAY STARTS '2022-12-01 16:35:41' ON COMPLETION PRESERVE ENABLE DO CALL checarDataFechar()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
