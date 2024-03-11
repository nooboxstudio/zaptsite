-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 08-Mar-2024 às 19:23
-- Versão do servidor: 8.0.30
-- versão do PHP: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `zapt`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clinic_list`
--

CREATE TABLE `clinic_list` (
  `clinic_id` int NOT NULL,
  `clinic_schema` varchar(50) NOT NULL,
  `clinic_status` int NOT NULL DEFAULT '1',
  `clinic_name` varchar(100) NOT NULL,
  `clinic_user` varchar(10) NOT NULL DEFAULT 'ZAPT',
  `clinic_pass` varchar(10) NOT NULL DEFAULT 'zipzip',
  `clinic_obs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

CREATE TABLE `email` (
  `mail_id` int NOT NULL,
  `mail_name` varchar(255) NOT NULL,
  `mail_email` varchar(255) NOT NULL,
  `mail_message` longtext NOT NULL,
  `mail_company` varchar(255) NOT NULL,
  `is_read` int NOT NULL DEFAULT '0',
  `date_in` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`mail_id`, `mail_name`, `mail_email`, `mail_message`, `mail_company`, `is_read`, `date_in`, `is_deleted`) VALUES
(5, 'sdfsdf', 'sdf@mail.com', 'asdasdasd', 'asdasd', 0, '2024-03-08 16:14:42', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Admin', 'adm', '123', '0');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clinic_list`
--
ALTER TABLE `clinic_list`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Índices para tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`mail_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clinic_list`
--
ALTER TABLE `clinic_list`
  MODIFY `clinic_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `mail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
