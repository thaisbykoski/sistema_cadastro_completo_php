-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Jul-2020 às 04:06
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `employees`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `employees`
--

CREATE TABLE `employees` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `re` int(11) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `admission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `employees`
--

INSERT INTO `employees` (`id_employee`, `name`, `email`, `re`, `cpf`, `address`, `role`, `department`, `admission_date`) VALUES
(1, 'Maria Silva', 'maria@gmail.com', 1, '000.000.000-00', 'Rua Central, 00', 'Contadora', 'Financeiro', '2020-01-07'),
(2, 'John Smith', 'john@gmail.com', 2, '111.111.111-11', 'Avenida da Lomba, 01', 'Vendedor', 'Comercial', '2019-09-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_mail` varchar(250) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_level` int(2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_mail`, `user_password`, `user_level`, `status`) VALUES
(1, 'Admin', 'admin@mail.com', '7b902e6ff1db9f560443f2048974fd7d386975b0', 1, 'Ativo'),
(2, 'João', 'joao@gmail.com', '81bce1f3bf343c464685d875c626820cdb58e309', 2, 'Ativo'),
(3, 'Maria', 'maria@gmail.com', '81bce1f3bf343c464685d875c626820cdb58e309', 3, 'Ativo'),
(8, 'John Smith', 'john@gmail.com', '81bce1f3bf343c464685d875c626820cdb58e309', 0, 'Inativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
