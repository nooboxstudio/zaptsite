-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 05-Mar-2024 às 13:48
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
(2, 'sdfsdfsdf', 'sdfsdfsfd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis velit ipsum. Donec tincidunt magna ut arcu scelerisque, vitae varius velit maximus. Nulla sem felis, vestibulum non neque ut, cursus interdum leo. Nunc id nunc mauris. Vivamus convallis rutrum magna at laoreet. Quisque ullamcorper nisl ac nunc tempus pretium. Sed porttitor nunc magna, quis dictum turpis pellentesque eu. Quisque fringilla arcu elit, sed dapibus nisi consequat sed. Quisque egestas magna ut augue condimentum, vel accumsan enim scelerisque. Morbi eget elit eu ligula consectetur pulvinar non a nunc. Nunc faucibus libero eget facilisis pharetra. Sed eget massa ante. Cras metus lacus, pellentesque posuere tellus at, dictum venenatis mauris. ', 'sdfsfsf', 0, '2024-03-21 00:00:00', 0),
(3, 'lljljklkj', 'jljkljkl', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis velit ipsum. Donec tincidunt magna ut arcu scelerisque, vitae varius velit maximus. Nulla sem felis, vestibulum non neque ut, cursus interdum leo. Nunc id nunc mauris. Vivamus convallis rutrum magna at laoreet. Quisque ullamcorper nisl ac nunc tempus pretium. Sed porttitor nunc magna, quis dictum turpis pellentesque eu. Quisque fringilla arcu elit, sed dapibus nisi consequat sed. Quisque egestas magna ut augue condimentum, vel accumsan enim scelerisque. Morbi eget elit eu ligula consectetur pulvinar non a nunc. Nunc faucibus libero eget facilisis pharetra. Sed eget massa ante. Cras metus lacus, pellentesque posuere tellus at, dictum venenatis mauris. ', 'ljljkll', 0, '2024-03-14 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Demo', 'root', 'root');

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `mail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
