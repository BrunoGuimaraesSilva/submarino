-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2021 às 21:39
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `icone` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `tabela` varchar(50) NOT NULL,
  `submenu` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `nome`, `icone`, `url`, `tabela`, `submenu`) VALUES
(1, 'Categorias', 'fas fa-tags', 'cadastros/categorias', 'categorias', 'C'),
(2, 'Cidades', 'fas fa-map-marker', 'cadastros/cidades', 'cidades', 'C'),
(3, 'Clientes', 'fas fa-users', 'cadastros/clientes', 'clientes', 'C'),
(4, 'Acessos', 'fas fa-cogs', 'cadastros/acessos', 'acessos', 'C'),
(5, 'Menus', 'fas fa-bars', 'cadastros/menus', 'menus', 'C'),
(6, 'Produtos', 'fas fa-box-open', 'cadastros/produtos', 'produtos', 'C'),
(7, 'Tipo de Usuário', 'fas fa-tag', 'cadastros/tipos', 'tipo', 'C'),
(8, 'Usuários', 'fas fa-user', 'cadastros/usuarios', 'usuarios', 'C'),
(9, 'Vendas', 'fas fa-shopping-cart', 'cadastros/vendas', 'vendas', 'P'),
(10, 'Logs', 'fas fa-file', 'relatorios/logs', 'logs', 'R'),
(11, 'Vendas', 'fas fa-search', 'relatorios/vendas', 'vendas', 'R'),
(12, 'Clentes', 'fas fa-users', 'relatorios/clientes', 'clientes', 'R');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
