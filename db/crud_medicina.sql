-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2023 às 12:49
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_medicina`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `consulta_com` varchar(255) NOT NULL,
  `data` varchar(10) NOT NULL,
  `horario` varchar(5) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `nome`, `telefone`, `consulta_com`, `data`, `horario`, `valor`) VALUES
(4, 'Esther Vera Lima', '(83) 99584-8369', 'Dr. Francisco Mendonça', '26/10/2023', '18:40', 'R$ 320,00'),
(5, 'Antonio Felipe Aparício', '(83) 2999-9340', 'Dra. Giulia Fontana', '08/06/2023', '12:50', 'R$ 305,00'),
(6, 'Amanda Isis Peixoto', '(83) 3504-8629', 'Dra. Giulia Fontana', '12/09/2023', '17:00', 'R$ 315,00'),
(7, 'Nathan Daniel Ribeiro', '(83) 99608-7249', 'Dr. Francisco Mendonça', '14/06/2023', '15:20', 'R$ 300,00'),
(8, 'Daniela Fogaça', '(83) 98145-5172', 'Dr. Francisco Mendonça', '08/06/2023', '18:10', 'R$ 305,00'),
(10, 'j', 'h', 'dr.', '7', '8', '78');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
