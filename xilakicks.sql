-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Abr-2022 às 22:08
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `xilakicks`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `Modelo` text NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `images`
--

INSERT INTO `images` (`Modelo`, `image_url`) VALUES
('Air Jordan', 'uploads/IMG-6266f5fe6c47c7.85000072.png'),
('beluga', 'uploads/IMG-62680a821671a8.80969635.png'),
('Disruptor', 'uploads/IMG-62681b04775dd0.00973034.png'),
('VaporMax', 'uploads/IMG-62681b4e9e7a12.23850367.png'),
('550', 'uploads/IMG-62681ca112d7f7.69524854.png'),
('Foam runner', 'uploads/IMG-62681d3832b910.46167545.png'),
('Old Skool', 'uploads/IMG-62689bd047a838.10180294.png'),
('OZWEEGO White', 'uploads/IMG-62689c84952bd7.66054371.png'),
('exemplo', 'uploads/IMG-626aa732b34109.99650443.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `ID` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`ID`, `Marca`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(5, 'Puma'),
(6, 'New Balance'),
(11, 'Vans'),
(12, 'Yeezy'),
(13, 'Fila'),
(14, 'Massimo Dutti'),
(15, 'sadasd'),
(16, 'sdfgdhtry'),
(17, 'exemplo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sneakers`
--

CREATE TABLE `sneakers` (
  `ID` int(11) NOT NULL,
  `Marca` varchar(75) NOT NULL,
  `Modelo` varchar(75) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sneakers`
--

INSERT INTO `sneakers` (`ID`, `Marca`, `Modelo`, `Quantidade`, `Valor`) VALUES
(1, 'Nike', 'Air Jordan', 96, 498),
(5, 'Yeezy', 'beluga', 100, 400),
(7, 'Fila', 'Disruptor', 10, 100),
(9, 'Nike', 'VaporMax', 2, 100),
(22, 'New Balance', '550', 10, 300),
(23, 'Yeezy', 'Foam runner', 20, 300),
(24, 'Vans', 'Old Skool', 5, 50),
(25, 'Adidas', 'OZWEEGO White', 20, 120),
(27, 'exemplo', 'exemplo', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'xila', '$2y$10$9phDpSxsuv7mIFcj87ynMeF4z3CVnyWHzUx38WWo6XX5TsLH71AGC', '2022-01-12 15:26:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `ID` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Modelo` varchar(75) NOT NULL,
  `Quantidade` bigint(255) NOT NULL,
  `Valor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
