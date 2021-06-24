-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 02:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-arrowit`
--

-- --------------------------------------------------------

--
-- Table structure for table `ait_blog_banner`
--

CREATE TABLE `ait_blog_banner` (
  `id_banner` int(11) NOT NULL,
  `imagem` varchar(80) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ait_blog_post`
--

CREATE TABLE `ait_blog_post` (
  `id_post` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `segmento` varchar(200) DEFAULT NULL,
  `id_categoria` tinyint(4) DEFAULT NULL,
  `autor` varchar(200) DEFAULT NULL,
  `cargo_autor` varchar(200) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `foto_autor` varchar(200) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ait_dadosgerais`
--

CREATE TABLE `ait_dadosgerais` (
  `id_dados` int(11) NOT NULL,
  `endereco` varchar(500) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ait_dadosgerais`
--

INSERT INTO `ait_dadosgerais` (`id_dados`, `endereco`, `telefone`, `celular`, `email`, `facebook`, `instagram`, `linkedin`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(1, 'Av. Trindade, 254 - Sala 1208 Bethaville I - Barueri - SP', '1141695743', '11946749597', '444444', 'https://www.facebook.com/arrowitsolucoes/', 'https://www.instagram.com/arrowitsolucoes/', 'https://www.linkedin.com/company/arrowitsolucoes/', NULL, '2021-06-18 05:22:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ait_log_acesso`
--

CREATE TABLE `ait_log_acesso` (
  `id_log` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `ip_usuario` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ait_projetos`
--

CREATE TABLE `ait_projetos` (
  `id_projeto` int(11) NOT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `setor` varchar(500) DEFAULT NULL,
  `imagem` varchar(80) DEFAULT NULL,
  `tempo_processo` varchar(500) DEFAULT NULL,
  `ambiente` varchar(500) DEFAULT NULL,
  `desafios` text DEFAULT NULL,
  `solucao` text DEFAULT NULL,
  `resultados` text DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ait_projeto_servicos`
--

CREATE TABLE `ait_projeto_servicos` (
  `id` int(11) NOT NULL,
  `id_projeto` int(11) DEFAULT NULL,
  `id_servico` int(11) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ait_servicos`
--

CREATE TABLE `ait_servicos` (
  `id_servico` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `imagem` varchar(80) DEFAULT NULL,
  `diferenciais` text DEFAULT NULL,
  `objetivo` text DEFAULT NULL,
  `beneficios` text DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ait_usuarios`
--

CREATE TABLE `ait_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` int(12) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `perfil` tinyint(2) DEFAULT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL,
  `ip_cadastro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ait_usuarios`
--

INSERT INTO `ait_usuarios` (`id_usuario`, `nome`, `cpf`, `email`, `celular`, `perfil`, `login`, `password`, `data_cadastro`, `quem_cadastrou`, `ip_cadastro`) VALUES
(1, 'hugo', NULL, NULL, NULL, NULL, 'hugo', '202cb962ac59075b964b07152d234b70', '2021-06-18 03:48:22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ait_blog_banner`
--
ALTER TABLE `ait_blog_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `ait_blog_post`
--
ALTER TABLE `ait_blog_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `ait_dadosgerais`
--
ALTER TABLE `ait_dadosgerais`
  ADD PRIMARY KEY (`id_dados`);

--
-- Indexes for table `ait_log_acesso`
--
ALTER TABLE `ait_log_acesso`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `ait_projetos`
--
ALTER TABLE `ait_projetos`
  ADD PRIMARY KEY (`id_projeto`);

--
-- Indexes for table `ait_projeto_servicos`
--
ALTER TABLE `ait_projeto_servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ait_servicos`
--
ALTER TABLE `ait_servicos`
  ADD PRIMARY KEY (`id_servico`);

--
-- Indexes for table `ait_usuarios`
--
ALTER TABLE `ait_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ait_blog_banner`
--
ALTER TABLE `ait_blog_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ait_blog_post`
--
ALTER TABLE `ait_blog_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ait_dadosgerais`
--
ALTER TABLE `ait_dadosgerais`
  MODIFY `id_dados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ait_log_acesso`
--
ALTER TABLE `ait_log_acesso`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ait_projetos`
--
ALTER TABLE `ait_projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ait_projeto_servicos`
--
ALTER TABLE `ait_projeto_servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ait_servicos`
--
ALTER TABLE `ait_servicos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ait_usuarios`
--
ALTER TABLE `ait_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
