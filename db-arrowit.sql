-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 04:30 AM
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
-- Table structure for table `ait_autor`
--

CREATE TABLE `ait_autor` (
  `id_autor` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `cargo` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ait_autor`
--

INSERT INTO `ait_autor` (`id_autor`, `nome`, `cargo`, `foto`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(1, 'hugo', 'dev', '162492872660da71d6c3cea.png', '123.123.123', '2021-06-28 22:05:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ait_blog_post`
--

CREATE TABLE `ait_blog_post` (
  `id_post` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `segmento` varchar(200) DEFAULT NULL,
  `id_categoria` tinyint(4) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `destaque` tinyint(2) DEFAULT NULL,
  `linkvideo` varchar(200) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `conteudo_util` int(11) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ait_blog_post`
--

INSERT INTO `ait_blog_post` (`id_post`, `titulo`, `segmento`, `id_categoria`, `conteudo`, `imagem`, `destaque`, `linkvideo`, `video`, `id_autor`, `conteudo_util`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(3, 'bnm', 'mnb', 1, '<p>33333</p>', '', NULL, NULL, NULL, 0, NULL, '123.123.123', '2021-07-28 00:52:29', 1),
(4, 'teste', 'banco', 2, '<p>cvkihbdf dflf</p>', '162450555860d3fcd6bb36f.png', NULL, NULL, NULL, 0, NULL, '123.123.123', '2021-06-24 00:32:38', 1),
(5, 'sdf', 'sdf', 2, '<p>xcv</p>', '', NULL, NULL, NULL, 0, NULL, '123.123.123', '2021-06-24 01:20:20', 1),
(6, 'vbn', 'vbn', 2, '<p>dfg</p>', '', NULL, NULL, NULL, 0, NULL, '123.123.123', '2021-06-24 01:20:37', 1),
(7, 'dfgdfg', '34tdrt', 1, '<p>dfgdfg</p>', '', NULL, NULL, NULL, 0, NULL, '123.123.123', '2021-06-24 01:20:48', 1),
(8, '11111111', '', 0, '', '', 0, '', '', 0, NULL, '123.123.123', '2021-06-28 21:41:26', 1),
(9, '2222222', '', 1, '', '', 0, '', '', 0, NULL, '123.123.123', '2021-06-28 21:41:55', 1),
(10, '33333333', '', 2, '', '162492734060da6c6ce3c91.png', 0, 'gnbmbnm', '162492734060da6c6ce3db0.png', 0, NULL, '123.123.123', '2021-06-28 21:42:20', 1),
(11, 'cvb', 'cvb', 1, '<p>cvbcvb</p>', '162492872660da71d6c39c8.png', 1, '', '', 0, NULL, '123.123.123', '2021-06-28 22:05:26', 1),
(12, 'cvb2222', 'cvbcvb', 1, '<p>bcvb111</p>', '162492895460da72baa5ce1.png', 1, '', '', 1, NULL, '123.123.123', '2021-06-28 22:09:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ait_clientes`
--

CREATE TABLE `ait_clientes` (
  `id_cliente` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `imagem` varchar(80) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ait_clientes`
--

INSERT INTO `ait_clientes` (`id_cliente`, `titulo`, `imagem`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(2, 'hugao1', '162493068460da797ce9cc4.png', '::1', '2021-06-28 22:37:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ait_conteudo_util`
--

CREATE TABLE `ait_conteudo_util` (
  `id_conteudo` int(11) NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ait_conteudo_util`
--

INSERT INTO `ait_conteudo_util` (`id_conteudo`, `id_post`, `tipo`, `comentario`, `ip_cadastro`, `data_cadastro`) VALUES
(2, 12, 1, NULL, '::1', '2021-06-29 22:09:09'),
(3, 12, 2, 'cvbcb cvb cvb cbv cvb c', '::1', '2021-06-29 22:09:27'),
(4, 12, 2, 'teste', '::1', '2021-06-29 22:24:38');

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
-- Table structure for table `ait_depoimentos`
--

CREATE TABLE `ait_depoimentos` (
  `id_depoimento` int(11) NOT NULL,
  `texto` text DEFAULT NULL,
  `cliente` varchar(200) DEFAULT NULL,
  `cargo` varchar(200) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ait_depoimentos`
--

INSERT INTO `ait_depoimentos` (`id_depoimento`, `texto`, `cliente`, `cargo`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(2, '1111 covjb cvjbhckjvbhckjlvhbcjklhvbcjhvbcj   cvhbcjk j kcvjkb ncjk cjk jncjk vblcvb hcjk bhcklj hc jkc vb ', '123nmbmn', 'mnbbbnmbn', '123.123.123', '2021-06-28 23:24:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ait_home_banner`
--

CREATE TABLE `ait_home_banner` (
  `id_banner` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `imagem` varchar(80) DEFAULT NULL,
  `destaque` tinyint(2) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ait_home_banner`
--

INSERT INTO `ait_home_banner` (`id_banner`, `titulo`, `imagem`, `destaque`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(11, 'ghjghj', '162492583160da6687137b1.png', 1, '123.123.123', '2021-06-28 21:17:11', 1),
(12, 'fvghfgh', '162492583660da668c83ff8.png', 0, '123.123.123', '2021-06-28 21:17:16', 1),
(13, 'xzcxzcv', '162492584160da6691c8064.png', 0, '123.123.123', '2021-06-28 21:17:21', 1),
(14, 'xcvxcv', '162492584860da669806d8a.png', 0, '123.123.123', '2021-06-28 21:17:28', 1),
(15, 'zxcvxcv', '162492585560da669fba687.png', 1, '123.123.123', '2021-06-28 21:17:35', 1),
(16, 'cvbcvb', '162492586660da66aa5f29e.png', 1, '123.123.123', '2021-06-28 21:17:46', 1),
(17, 'bnbnm', '162492592360da66e3346b8.png', 1, '123.123.123', '2021-06-28 21:18:43', 1);

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

--
-- Dumping data for table `ait_log_acesso`
--

INSERT INTO `ait_log_acesso` (`id_log`, `id_usuario`, `ip_usuario`, `modelo`, `data_login`) VALUES
(1, 1, '::1', 'Windows 10 / Chrome', '2021-06-20 21:05:52'),
(2, 1, '::1', 'Windows 10 / Chrome', '2021-06-21 21:35:44'),
(3, 1, '::1', 'Windows 10 / Chrome', '2021-06-22 12:39:45'),
(4, 1, '127.0.0.1', 'Windows 10 / Chrome', '2021-06-22 18:46:47'),
(5, 1, '::1', 'Windows 10 / Chrome', '2021-06-23 23:36:16'),
(6, 1, '::1', 'Windows 10 / Chrome', '2021-06-27 21:17:49'),
(7, 1, '::1', 'Windows 10 / Chrome', '2021-06-27 21:42:51'),
(8, 1, '::1', 'Windows 10 / Chrome', '2021-06-27 22:02:34'),
(9, 1, '::1', 'Windows 10 / Chrome', '2021-06-27 22:24:29'),
(10, 1, '::1', 'Windows 10 / Chrome', '2021-06-28 21:01:49'),
(11, 1, '::1', 'Windows 10 / Chrome', '2021-06-29 21:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `ait_parceiros`
--

CREATE TABLE `ait_parceiros` (
  `id_parceiro` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `imagem` varchar(80) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ait_parceiros`
--

INSERT INTO `ait_parceiros` (`id_parceiro`, `titulo`, `imagem`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(2, '1111', '162493017760da7781b2e6b.png', '123.123.123', '2021-06-28 22:28:49', 1);

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

--
-- Dumping data for table `ait_projetos`
--

INSERT INTO `ait_projetos` (`id_projeto`, `titulo`, `setor`, `imagem`, `tempo_processo`, `ambiente`, `desafios`, `solucao`, `resultados`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(2, 'cracolandia', 'dorgas', '162432940960d14cc1e4892.png', 'otorrino', 'larin', '<p>sdfg</p>', '<p>fds</p>', '<p>asdf</p>', '123.123.123', '2021-06-21 23:36:50', 1),
(3, 'cvbcvb', 'cvbcvb', '162432945360d14ced4eaf8.png', 'cvbcvb', 'cvbcvb', '<p>cvb</p>', '<p>cv</p>', '<p>cvb</p>', '123.123.123', '2021-06-21 23:37:33', 1);

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

--
-- Dumping data for table `ait_projeto_servicos`
--

INSERT INTO `ait_projeto_servicos` (`id`, `id_projeto`, `id_servico`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(4, 3, 1, NULL, NULL, NULL),
(5, 2, 2, NULL, NULL, NULL);

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

--
-- Dumping data for table `ait_servicos`
--

INSERT INTO `ait_servicos` (`id_servico`, `titulo`, `descricao`, `imagem`, `diferenciais`, `objetivo`, `beneficios`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(1, '999999999', '999999999', '162432880860d14a68b0f97.svg', '<p>3333333333333</p>', '', '', '123.123.123', '2021-06-17 23:38:58', 1),
(2, '1111111', '1111111', '162432882860d14a7c79403.svg', '<p>11111</p>', '<p>222222</p>', '<p>3333333</p>', '123.123.123', '2021-06-17 23:39:33', 1),
(3, 'sdfsdf', 'sdf', '162439886060d25c0c46316.svg', '<p>sdf</p>', '<p>sdf</p>', '<p>sdf</p>', '123.123.123', '2021-06-22 18:54:20', 1),
(4, 'vbn', 'vbn', '162439887660d25c1ce27d6.svg', '<p>vbn</p>', '<p>vbn</p>', '<p>nbv</p>', '123.123.123', '2021-06-22 18:54:37', 1),
(5, 'zxc', 'cxz', '162439889660d25c30d209c.svg', '<p>asdasd</p>', '<p>sdadsaasd</p>', '<p>dsadasd</p>', '123.123.123', '2021-06-22 18:54:56', 1),
(6, 'bnvmvbnm', 'bvnmvbnmbnvm', '162439891060d25c3e282f6.svg', '<p>bnmbnm</p>', '<p>bnmbnm</p>', '<p>mnjbmbn</p>', '123.123.123', '2021-06-22 18:55:10', 1);

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
(1, 'hugo', NULL, NULL, NULL, NULL, 'hugo', '81dc9bdb52d04dc20036dbd8313ed055', '2021-06-18 03:48:22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ait_autor`
--
ALTER TABLE `ait_autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `ait_blog_post`
--
ALTER TABLE `ait_blog_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `ait_clientes`
--
ALTER TABLE `ait_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `ait_conteudo_util`
--
ALTER TABLE `ait_conteudo_util`
  ADD PRIMARY KEY (`id_conteudo`);

--
-- Indexes for table `ait_dadosgerais`
--
ALTER TABLE `ait_dadosgerais`
  ADD PRIMARY KEY (`id_dados`);

--
-- Indexes for table `ait_depoimentos`
--
ALTER TABLE `ait_depoimentos`
  ADD PRIMARY KEY (`id_depoimento`);

--
-- Indexes for table `ait_home_banner`
--
ALTER TABLE `ait_home_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `ait_log_acesso`
--
ALTER TABLE `ait_log_acesso`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `ait_parceiros`
--
ALTER TABLE `ait_parceiros`
  ADD PRIMARY KEY (`id_parceiro`);

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
-- AUTO_INCREMENT for table `ait_autor`
--
ALTER TABLE `ait_autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ait_blog_post`
--
ALTER TABLE `ait_blog_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ait_clientes`
--
ALTER TABLE `ait_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ait_conteudo_util`
--
ALTER TABLE `ait_conteudo_util`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ait_dadosgerais`
--
ALTER TABLE `ait_dadosgerais`
  MODIFY `id_dados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ait_depoimentos`
--
ALTER TABLE `ait_depoimentos`
  MODIFY `id_depoimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ait_home_banner`
--
ALTER TABLE `ait_home_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ait_log_acesso`
--
ALTER TABLE `ait_log_acesso`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ait_parceiros`
--
ALTER TABLE `ait_parceiros`
  MODIFY `id_parceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ait_projetos`
--
ALTER TABLE `ait_projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ait_projeto_servicos`
--
ALTER TABLE `ait_projeto_servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ait_servicos`
--
ALTER TABLE `ait_servicos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ait_usuarios`
--
ALTER TABLE `ait_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
