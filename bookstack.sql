-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 06:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `valor_total` double(4,2) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_livro` int(11) NOT NULL,
  `quantidade` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `desconto`
--

CREATE TABLE `desconto` (
  `codigo` int(11) NOT NULL,
  `cupom` varchar(10) DEFAULT NULL,
  `valido` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

CREATE TABLE `favoritos` (
  `codigo_livro` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `data_adicao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `livro`
--

CREATE TABLE `livro` (
  `codigo` int(3) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `editora` varchar(50) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `publicacao` varchar(30) DEFAULT NULL,
  `paginas` int(4) DEFAULT NULL,
  `edicao` int(2) DEFAULT NULL,
  `dimensoes` varchar(20) DEFAULT NULL,
  `idioma` varchar(10) DEFAULT NULL,
  `preco` double(4,2) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `endereco_CEP` varchar(10) DEFAULT NULL,
  `endereco_Estado` varchar(50) DEFAULT NULL,
  `endereco_Cidade` varchar(50) DEFAULT NULL,
  `endereco_Bairro` varchar(50) DEFAULT NULL,
  `endereco_Rua` varchar(50) DEFAULT NULL,
  `endereco_Numero` int(10) DEFAULT NULL,
  `pagamento_NomeTitular` varchar(100) DEFAULT NULL,
  `pagamento_CPFTitular` int(11) DEFAULT NULL,
  `pagamento_CVV` int(3) DEFAULT NULL,
  `pagamento_NumeroCartao` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utiliza`
--

CREATE TABLE `utiliza` (
  `valor_total` double(4,2) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_livro` int(11) NOT NULL,
  `codigo_desconto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`valor_total`,`codigo_usuario`,`codigo_livro`),
  ADD KEY `codigo_usuario` (`codigo_usuario`),
  ADD KEY `codigo_livro` (`codigo_livro`);

--
-- Indexes for table `desconto`
--
ALTER TABLE `desconto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`codigo_livro`,`codigo_usuario`,`data_adicao`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `utiliza`
--
ALTER TABLE `utiliza`
  ADD PRIMARY KEY (`valor_total`,`codigo_usuario`,`codigo_livro`,`codigo_desconto`),
  ADD KEY `codigo_usuario` (`codigo_usuario`),
  ADD KEY `codigo_livro` (`codigo_livro`),
  ADD KEY `codigo_desconto` (`codigo_desconto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desconto`
--
ALTER TABLE `desconto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `codigo` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`codigo_livro`) REFERENCES `livro` (`codigo`);

--
-- Constraints for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`codigo_livro`) REFERENCES `livro` (`codigo`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`);

--
-- Constraints for table `utiliza`
--
ALTER TABLE `utiliza`
  ADD CONSTRAINT `utiliza_ibfk_1` FOREIGN KEY (`valor_total`) REFERENCES `compra` (`valor_total`),
  ADD CONSTRAINT `utiliza_ibfk_2` FOREIGN KEY (`codigo_usuario`) REFERENCES `compra` (`codigo_usuario`),
  ADD CONSTRAINT `utiliza_ibfk_3` FOREIGN KEY (`codigo_livro`) REFERENCES `compra` (`codigo_livro`),
  ADD CONSTRAINT `utiliza_ibfk_4` FOREIGN KEY (`codigo_desconto`) REFERENCES `desconto` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
