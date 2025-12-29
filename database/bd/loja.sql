-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Dez-2025 às 18:43
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--
CREATE DATABASE IF NOT EXISTS `loja` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `loja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `descricao` text,
  `preco` decimal(10,2) NOT NULL DEFAULT '0.00',
  `imagem` varchar(255) DEFAULT NULL,
  `estoque` int UNSIGNED NOT NULL DEFAULT '0',
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `estoque`, `criado_em`, `atualizado_em`) VALUES
(7, 'Tênis Nike Revolution 8 Masculino', 'Defina o ritmo no início da sua corrida com a sensação de maciez do Nike Revolution 8. Como o conforto é essencial para uma corrida de sucesso, garantimos que cada passo seja amortecido e flexível para uma corrida suave. É a evolução de um favorito com um design ventilado.', '300.00', '1766773304_rrrr.webp', 100, '2025-12-26 14:56:29', '2025-12-26 15:21:44'),
(8, 'Tênis Nike Revolution 8 Masculino', '- Os pontos de toque no calcanhar e na língua criam uma sensação natural ao calçar e remover o tênis.\r\n- O solado tem um design Nike intuitivo e ranhuras flexíveis que criam um efeito confortável e amortecido enquanto você corre.', '500.00', '1766771913_ee.webp', 10, '2025-12-26 14:57:44', '2025-12-26 14:58:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` enum('admin','cliente') DEFAULT 'cliente',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel`) VALUES
(1, 'Administrador', 'admin@loja.com', '123456', 'admin'),
(2, 'Vinicius Ferreira', 'vinicius@gestaopro.com.br', '$2y$10$wtr1KpQK8weCsG38PuQk5.CSTPOeVWkPwkB1gknQGgWQEXPLBJ7im', 'admin'),
(3, 'Ricardo João', 'ricardo@gestaopro.com.br', '$2y$10$cEaEgBOtbhGOS6V73eEjC.xL/0J0PvQDgC/S1lcmBJv4R6RiVQcA6', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
