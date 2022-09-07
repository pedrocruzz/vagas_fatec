-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Set-2022 às 01:57
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `parceiro` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `titulo`, `descricao`, `empresa`, `parceiro`) VALUES
(1, 'titulo', 'descricao', 'empresa', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
