-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 07:46 PM
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
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Table structure for table `pe_alunos`
--

CREATE TABLE `pe_alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rg` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `cidade` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiencia` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terapia` tinyint(1) DEFAULT NULL,
  `terapeuta` tinyint(1) DEFAULT NULL,
  `medicamento` tinyint(1) DEFAULT NULL,
  `qualmedicamento` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autoconhecimento` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forma_pagamento` tinyint(4) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `senha` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acordo` tinyint(2) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL,
  `ip_cadastro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pe_alunos`
--

INSERT INTO `pe_alunos` (`id_aluno`, `nome`, `cpf`, `rg`, `email`, `celular`, `nascimento`, `cidade`, `estado`, `experiencia`, `terapia`, `terapeuta`, `medicamento`, `qualmedicamento`, `autoconhecimento`, `forma_pagamento`, `id_curso`, `status`, `senha`, `acordo`, `data_cadastro`, `quem_cadastrou`, `ip_cadastro`) VALUES
(2, 'teste', '12345678909', '123', 'asd@asd.xom', '119564689456', '1996-02-05', 'teste', 'SP', 'thug', 1, 2, 2, 'gadernal', 'tratamento', NULL, NULL, 1, NULL, NULL, '2021-05-03 11:15:55', 1, '192.12.343.2'),
(4, 'otorrino larin', '15832691008', NULL, 'asd@asd.xom', '(12) 31287-3612', '2000-01-01', 'caracas', 'SP', 'asdakjhdsjh', 1, 1, 1, 'sfkgjhdsfkgjdhk', 'dsfkhsdfgjhdfg', NULL, NULL, 1, NULL, NULL, '2021-05-22 14:09:57', 1, '192.12.343.2'),
(5, 'aiudshauisd asidojhasoid', '72296088058', '1565432', 'asd@asd.xom', '16712386712', '1996-01-01', 'caracas', 'SP', 'sdkfhsdk', 1, 1, 1, 'sfdkjvshdfkjshd', 'sdlkfjsldkj', NULL, NULL, 1, NULL, NULL, '2021-05-22 14:14:41', 1, '192.12.343.2'),
(6, 'sjdklfhskdjfh', '25813389032', '5456465', 'asd@asd.xom', '12731623176', '1995-01-01', 'caracas', 'SP', 'sdfhsdfjsdhfjh', 1, 1, 1, 'dsfjkghsdfkgjshdf', 'sdjkfhskdjfhsdjf', NULL, NULL, 1, NULL, NULL, '2021-05-22 14:16:04', 1, '192.12.343.2'),
(8, '', '', '', '', '', '0000-00-00', '', '', '', 0, 0, 0, '', '', 0, NULL, 1, NULL, NULL, '2021-05-23 10:43:09', 1, '192.12.343.2'),
(9, 'sfdkhsdoklfjhksdhf', '01121172016', '98798765', 'asd@asd.xom', '98324729834', '1950-01-01', 'caracas', 'SP', 'sidfhgskjdfhskjdfh', 1, 1, 1, 'sdoifjsdlkfsf', 'dsfjlsdjfkls', 2, 5, 1, NULL, NULL, '2021-05-23 10:44:30', 1, '192.12.343.2'),
(10, 'dfogdlfg fdsgkljsd', '48543891841', '34587', 'asd@asd.xom', '34589374958', '1996-01-01', 'caracas', 'SP', 'dfbjvilconfblo', 1, 2, 2, 'kgbjdflkgjdfgklj', 'sdfgljdsfl', 1, 5, 2, 'qRZxD!K_9V', 1, '2021-05-30 19:59:54', 1, '192.12.343.2');

-- --------------------------------------------------------

--
-- Table structure for table `pe_alunos_turma`
--

CREATE TABLE `pe_alunos_turma` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL,
  `ip_cadastro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pe_alunos_turma`
--

INSERT INTO `pe_alunos_turma` (`id`, `id_turma`, `id_aluno`, `data_cadastro`, `quem_cadastrou`, `ip_cadastro`) VALUES
(1, 2, 10, '2021-05-31 00:17:51', 123, '123');

-- --------------------------------------------------------

--
-- Table structure for table `pe_banner_home`
--

CREATE TABLE `pe_banner_home` (
  `id_banner` int(11) NOT NULL,
  `legenda` varchar(200) DEFAULT NULL,
  `destaque` tinyint(1) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_banner_home`
--

INSERT INTO `pe_banner_home` (`id_banner`, `legenda`, `destaque`, `imagem`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(8, 'legenda legenda legenda111111111', 1, '162179862660aaaee2b58f0.png', '123.123.123', '2021-05-23 15:11:46', 1),
(12, 'legenda legenda legenda222222', 1, '162179900760aab05f93828.png', '123.123.123', '2021-05-23 16:43:27', 1),
(13, 'sdf', 0, '162205048060ae86b069ae6.jpg', '123.123.123', '2021-05-26 14:34:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_cursos`
--

CREATE TABLE `pe_cursos` (
  `id_curso` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datade` date DEFAULT NULL,
  `dataate` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `matricula` decimal(10,2) DEFAULT NULL,
  `parcelas` tinyint(4) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL,
  `ip_cadastro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pe_cursos`
--

INSERT INTO `pe_cursos` (`id_curso`, `titulo`, `descricao`, `datade`, `dataate`, `valor`, `matricula`, `parcelas`, `vagas`, `id_turma`, `data_cadastro`, `quem_cadastrou`, `ip_cadastro`) VALUES
(5, '22222222', 'cxvbv', '2000-01-01', '1996-01-01', '1200.00', '300.00', 3, 10, NULL, '2021-05-23 23:51:29', 1, '123.123.123'),
(10, 'xcvxcvx', 'cvxcvxcv', '2001-01-01', '2021-01-01', '1200.00', '400.00', 4, 15, NULL, '2021-05-24 00:02:31', 1, '123.123.123');

-- --------------------------------------------------------

--
-- Table structure for table `pe_curso_exercicios`
--

CREATE TABLE `pe_curso_exercicios` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_exercicio` int(11) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_curso_exercicios`
--

INSERT INTO `pe_curso_exercicios` (`id`, `id_curso`, `id_exercicio`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(6, 10, 2, NULL, NULL, NULL),
(7, 5, 1, NULL, NULL, NULL),
(8, 5, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pe_curso_temas`
--

CREATE TABLE `pe_curso_temas` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_tema` int(11) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_curso_temas`
--

INSERT INTO `pe_curso_temas` (`id`, `id_curso`, `id_tema`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(1, 10, 1, NULL, NULL, NULL),
(2, 5, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pe_execicios_enviados`
--

CREATE TABLE `pe_execicios_enviados` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `id_exercicio` varchar(500) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `descricao_finalizado` text DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_execicios_enviados`
--

INSERT INTO `pe_execicios_enviados` (`id`, `id_aluno`, `id_exercicio`, `texto`, `imagem`, `status`, `descricao_finalizado`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(1, 10, '1', '<p>dfgdfg</p>\r\n<p>dfg</p>\r\n<p>dfg</p>\r\n<p>dg</p>', '162251708960b5a56168ce1.jpg', NULL, NULL, '123.123.123', '2021-06-01 00:11:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_exercicios`
--

CREATE TABLE `pe_exercicios` (
  `id_exercicio` int(11) NOT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `audio` varchar(200) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_exercicios`
--

INSERT INTO `pe_exercicios` (`id_exercicio`, `titulo`, `texto`, `imagem`, `audio`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(1, '11111', '<p>xcvx</p>\r\n<p>3333</p>\r\n<p>&nbsp;</p>', '162234636960b30a81bbae5.jpg', NULL, '123.123.123', '2021-05-30 00:46:09', 1),
(2, '111111222222', '<p>xcvxcv&nbsp;</p>', '162234678260b30c1e4289e.jpg', '162258984260b6c1926a57a.m4a', '123.123.123', '2021-05-30 00:53:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_facilitadora_links`
--

CREATE TABLE `pe_facilitadora_links` (
  `id_link` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `documento` varchar(80) DEFAULT NULL,
  `icone` tinyint(4) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_facilitadora_links`
--

INSERT INTO `pe_facilitadora_links` (`id_link`, `titulo`, `descricao`, `link`, `documento`, `icone`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(2, 'fdg222222', 'dfg', 'dfgSDFSDFSDFSDF', NULL, NULL, '123.123.123', '2021-05-23 17:55:26', 1),
(3, 'CVBBCV', 'CVBCVBssdddd', 'BVCBCVB', NULL, NULL, '123.123.123', '2021-05-23 18:04:05', 1),
(4, '3333333333333', 'nbmbnbnm', 'nbmbnmbmn', '162234448860b30328da171.jpg', 2, '123.123.123', '2021-05-23 18:07:00', 1),
(5, '', '', 'fgh', '162234457960b30383b40eb.jpg', 1, '123.123.123', '2021-05-23 20:25:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_forma_pagamento`
--

CREATE TABLE `pe_forma_pagamento` (
  `id_forma` int(11) NOT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_forma_pagamento`
--

INSERT INTO `pe_forma_pagamento` (`id_forma`, `titulo`, `texto`, `imagem`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(2, 'pix', '<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 10px; font-size: 18px; line-height: 28px; letter-spacing: 0.02em; color: #888888; font-family: \'Source Sans Pro\', sans-serif; background-color: #ffffff;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Nome completo:</span>&nbsp;Marcia Xavier Bandeira</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 10px; font-size: 18px; line-height: 28px; letter-spacing: 0.02em; color: #888888; font-family: \'Source Sans Pro\', sans-serif; background-color: #ffffff;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Chave:</span>&nbsp;sdklfjlsakjfkl&ccedil;saja&ccedil;skldfj</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 10px; font-size: 18px; line-height: 28px; letter-spacing: 0.02em; color: #888888; font-family: \'Source Sans Pro\', sans-serif; background-color: #ffffff;\"><span style=\"box-sizing: inherit; font-weight: 600;\">CPF:</span>&nbsp;00489380760</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0.02em; color: #888888; font-family: \'Source Sans Pro\', sans-serif; background-color: #ffffff;\"><span style=\"box-sizing: inherit; font-weight: 600;\">QR Code:</span></p>', '162195458360ad10171f526.jpg', '123.123.123', '2021-05-25 11:53:59', 1),
(3, 'trasnferencia', '<p>Nome completo: Marcia Xavier Bandeira</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Banco: Banco do Brasil</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ag&ecirc;ncia: 4884-4</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tipo de conta: Conta Corrente</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; CPF: 00489380760</p>', '', '123.123.123', '2021-05-30 19:45:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_home_cursos`
--

CREATE TABLE `pe_home_cursos` (
  `id_home_cursos` int(11) NOT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `legenda` varchar(100) DEFAULT NULL,
  `frase` varchar(500) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_home_cursos`
--

INSERT INTO `pe_home_cursos` (`id_home_cursos`, `titulo`, `imagem`, `legenda`, `frase`, `autor`, `texto`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(1, '22222', '162195757760ad1bc90ad21.jpg', '3333333', '4444444', '55555', '<p>abca</p>\r\n<p>sdas</p>\r\n<p>das</p>\r\n<p>d</p>\r\n<p>asd</p>', '192', '2021-05-25 17:34:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_integra`
--

CREATE TABLE `pe_integra` (
  `id_integra` int(11) NOT NULL,
  `id_projeto` int(11) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `data` varchar(80) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `legenda` varchar(200) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_integra`
--

INSERT INTO `pe_integra` (`id_integra`, `id_projeto`, `titulo`, `data`, `imagem`, `legenda`, `texto`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(3, 2, '3333333333', '444', '162181434660aaec4ac5104.jpg', '33333333111', '<p>4322</p>', '123.123.123', '2021-05-23 20:45:54', 1),
(5, 7, 'clvkbjcvlk', 'dfvlkjgdhfgjk', '162182016160ab0301aff9d.jpg', 'hkfhgb', '<p>dsgfsdf</p>\r\n<p>sdfusjdfpsdfsidf</p>\r\n<p>&nbsp;</p>', '123.123.123', '2021-05-23 22:36:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_links_home`
--

CREATE TABLE `pe_links_home` (
  `id_link` int(11) NOT NULL,
  `codigo_video` varchar(200) DEFAULT NULL,
  `destaque` tinyint(1) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_links_home`
--

INSERT INTO `pe_links_home` (`id_link`, `codigo_video`, `destaque`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(4, 'https://youtu.be/Pih1G46aAP4', 0, '123.123.123', '2021-05-23 15:49:00', 1),
(7, 'https://youtu.be/ZRJbnKZK_jg', 1, '123.123.123', '2021-05-23 17:12:43', 1),
(8, 'https://youtu.be/me1wLkEvXIE', 0, '123.123.123', '2021-05-30 17:12:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_log_acesso`
--

CREATE TABLE `pe_log_acesso` (
  `id_log` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `ip_usuario` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pe_log_acesso`
--

INSERT INTO `pe_log_acesso` (`id_log`, `id_usuario`, `ip_usuario`, `modelo`, `data_login`) VALUES
(1, 1, '::1', 'Windows 10 / Edge', '2021-02-08 21:12:16'),
(2, 1, '::1', 'Windows 10 / Edge', '2021-02-09 20:47:54'),
(3, 1, '::1', 'Windows 10 / Edge', '2021-02-09 20:51:23'),
(4, 1, '::1', 'Windows 10 / Edge', '2021-02-09 21:08:51'),
(5, 1, '::1', 'Windows 10 / Edge', '2021-03-24 10:27:27'),
(6, 1, '::1', 'Windows 10 / Edge', '2021-03-25 11:05:56'),
(7, 1, '::1', 'Windows 10 / Edge', '2021-03-25 20:51:03'),
(8, 1, '::1', 'Windows 10 / Edge', '2021-03-30 10:30:21'),
(9, 1, '::1', 'Windows 10 / Edge', '2021-04-19 15:32:44'),
(10, 1, '::1', 'Windows 10 / Edge', '2021-04-19 15:56:57'),
(11, 1, '::1', 'Windows 10 / Edge', '2021-04-19 15:57:03'),
(12, 1, '::1', 'Windows 10 / Edge', '2021-04-19 21:40:39'),
(13, 1, '::1', 'Windows 10 / Edge', '2021-04-24 11:19:23'),
(14, 1, '::1', 'Windows 10 / Edge', '2021-04-24 11:39:52'),
(15, 1, '::1', 'Windows 10 / Edge', '2021-04-24 12:02:18'),
(16, 1, '::1', 'Windows 10 / Edge', '2021-04-25 10:33:02'),
(17, 1, '::1', 'Windows 10 / Edge', '2021-04-25 12:14:30'),
(18, 1, '::1', 'Windows 10 / Edge', '2021-04-26 00:02:12'),
(19, 1, '::1', 'Windows 10 / Chrome', '2021-05-03 11:12:01'),
(20, 1, '::1', 'Windows 10 / Chrome', '2021-05-03 11:12:04'),
(21, 1, '::1', 'Windows 10 / Chrome', '2021-05-03 16:08:33'),
(22, 1, '::1', 'Windows 10 / Chrome', '2021-05-05 09:21:39'),
(23, 1, '::1', 'Windows 10 / Chrome', '2021-05-07 16:30:49'),
(24, 1, '::1', 'Windows 10 / Chrome', '2021-05-07 23:42:26'),
(25, 1, '::1', 'Windows 10 / Chrome', '2021-05-08 12:51:28'),
(26, 1, '::1', 'Windows 10 / Chrome', '2021-05-09 22:36:42'),
(27, 1, '::1', 'Windows 10 / Chrome', '2021-05-23 12:33:31'),
(28, 1, '::1', 'Windows 10 / Chrome', '2021-05-23 13:08:54'),
(29, 1, '::1', 'Windows 10 / Chrome', '2021-05-23 14:56:13'),
(30, 1, '::1', 'Windows 10 / Chrome', '2021-05-23 14:56:18'),
(31, 1, '::1', 'Windows 10 / Chrome', '2021-05-23 14:56:36'),
(32, 1, '::1', 'Windows 10 / Chrome', '2021-05-24 09:37:24'),
(33, 1, '::1', 'Windows 10 / Chrome', '2021-05-25 11:37:17'),
(34, 1, '::1', 'Windows 10 / Chrome', '2021-05-26 14:34:29'),
(35, 1, '::1', 'Windows 10 / Chrome', '2021-05-29 21:14:17'),
(36, 1, '::1', 'Windows 10 / Chrome', '2021-05-29 23:08:43'),
(37, 1, '::1', 'Windows 10 / Chrome', '2021-05-30 16:37:19'),
(38, 1, '::1', 'Windows 10 / Chrome', '2021-05-30 19:29:01'),
(39, 1, '::1', 'Windows 10 / Chrome', '2021-05-31 01:11:34'),
(40, 1, '::1', 'Windows 10 / Chrome', '2021-05-31 22:06:42'),
(41, 1, '::1', 'Windows 10 / Chrome', '2021-05-31 22:51:45'),
(42, 1, '::1', 'Windows 10 / Chrome', '2021-06-01 19:26:34'),
(43, 1, '::1', 'Windows 10 / Chrome', '2021-06-01 19:26:48'),
(44, 1, '::1', 'Windows 10 / Chrome', '2021-06-01 19:26:56'),
(45, 1, '::1', 'Windows 10 / Chrome', '2021-06-01 19:27:15'),
(46, 1, '::1', 'Windows 10 / Chrome', '2021-06-01 19:30:00'),
(47, 1, '::1', 'Windows 10 / Chrome', '2021-06-01 19:31:27'),
(48, 1, '::1', 'Windows 10 / Chrome', '2021-06-01 19:33:15'),
(49, 1, '::1', 'Windows 10 / Chrome', '2021-06-01 19:34:05'),
(50, 1, '::1', 'Windows 10 / Chrome', '2021-06-01 19:35:18'),
(51, 1, '::1', 'Windows 10 / Chrome', '2021-06-02 00:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `pe_log_acesso_portal`
--

CREATE TABLE `pe_log_acesso_portal` (
  `id_log` int(11) NOT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `ip_usuario` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pe_log_acesso_portal`
--

INSERT INTO `pe_log_acesso_portal` (`id_log`, `id_aluno`, `ip_usuario`, `modelo`, `data_login`) VALUES
(1, 10, '::1', 'Windows 10 / Chrome', '2021-05-31 01:06:29'),
(2, 10, '::1', 'Windows 10 / Chrome', '2021-05-31 01:13:39'),
(3, 10, '::1', 'Windows 10 / Chrome', '2021-05-31 01:24:02'),
(4, 10, '::1', 'Windows 10 / Chrome', '2021-05-31 01:27:43'),
(5, 10, '::1', 'Windows 10 / Chrome', '2021-05-31 01:41:55'),
(6, 10, '::1', 'Windows 10 / Chrome', '2021-05-31 01:51:42'),
(7, 10, '::1', 'Windows 10 / Chrome', '2021-05-31 21:50:50'),
(8, 10, '::1', 'Windows 10 / Chrome', '2021-05-31 21:59:46'),
(9, 10, '::1', 'Windows 10 / Chrome', '2021-06-01 18:56:56'),
(10, 10, '::1', 'Windows 10 / Chrome', '2021-06-01 19:43:35'),
(11, 10, '::1', 'Windows 10 / Chrome', '2021-06-01 23:04:42'),
(12, 10, '::1', 'Windows 10 / Chrome', '2021-06-01 23:08:36'),
(13, 10, '::1', 'Windows 10 / Chrome', '2021-06-01 23:47:11'),
(14, 10, '::1', 'Windows 10 / Chrome', '2021-06-01 23:49:45'),
(15, 10, '::1', 'Windows 10 / Chrome', '2021-06-02 00:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `pe_projetos`
--

CREATE TABLE `pe_projetos` (
  `id_projeto` int(11) NOT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `destaque` varchar(1000) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_projetos`
--

INSERT INTO `pe_projetos` (`id_projeto`, `titulo`, `texto`, `destaque`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(1, '222222222', '<p>1111111vg</p>', '444444444', '123.123.123', '2021-05-23 19:21:07', 1),
(2, 'cvbcvbcvb', '<p>otorrino</p>', 'cvbcvbcvb', '123.123.123', '2021-05-23 19:21:16', 1),
(7, 'ghjgh', '<p style=\"text-align: center;\"><strong>ddfgdfg</strong></p>\r\n<p style=\"text-align: center;\"><strong>fgh1111</strong></p>\r\n<p style=\"text-align: center;\"><strong>fgh</strong></p>\r\n<p style=\"text-align: center;\"><strong>fgh</strong></p>\r\n<p style=\"text-align: center;\"><strong>fgh</strong></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>', 'bbvbn', '123.123.123', '2021-05-23 19:52:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_temas`
--

CREATE TABLE `pe_temas` (
  `id_tema` int(11) NOT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `subtitulo` varchar(200) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `audio` varchar(200) DEFAULT NULL,
  `ip_cadastro` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_temas`
--

INSERT INTO `pe_temas` (`id_tema`, `titulo`, `subtitulo`, `texto`, `imagem`, `video`, `audio`, `ip_cadastro`, `data_cadastro`, `quem_cadastrou`) VALUES
(1, 'asd', 'cvb', '<p>sadfsdf</p>\r\n<p>1111</p>\r\n<p>&nbsp;</p>', '162251325660b5966855ce7.jpg', '2222222233333', '162259638060b6db1c5b271.m4a', '123.123.123', '2021-05-31 23:07:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pe_turmas`
--

CREATE TABLE `pe_turmas` (
  `id_turma` int(11) NOT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `quem_cadastrou` int(11) DEFAULT NULL,
  `ip_cadastro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pe_turmas`
--

INSERT INTO `pe_turmas` (`id_turma`, `id_curso`, `nome`, `data_cadastro`, `quem_cadastrou`, `ip_cadastro`) VALUES
(2, 5, 'PE5', '2021-05-31 00:17:51', 123, '123');

-- --------------------------------------------------------

--
-- Table structure for table `pe_usuarios`
--

CREATE TABLE `pe_usuarios` (
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
-- Dumping data for table `pe_usuarios`
--

INSERT INTO `pe_usuarios` (`id_usuario`, `nome`, `cpf`, `email`, `celular`, `perfil`, `login`, `password`, `data_cadastro`, `quem_cadastrou`, `ip_cadastro`) VALUES
(1, 'hugo', NULL, NULL, NULL, NULL, 'hugo', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pe_alunos`
--
ALTER TABLE `pe_alunos`
  ADD PRIMARY KEY (`id_aluno`) USING BTREE;

--
-- Indexes for table `pe_alunos_turma`
--
ALTER TABLE `pe_alunos_turma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pe_banner_home`
--
ALTER TABLE `pe_banner_home`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `pe_cursos`
--
ALTER TABLE `pe_cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `pe_curso_exercicios`
--
ALTER TABLE `pe_curso_exercicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pe_curso_temas`
--
ALTER TABLE `pe_curso_temas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pe_execicios_enviados`
--
ALTER TABLE `pe_execicios_enviados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pe_exercicios`
--
ALTER TABLE `pe_exercicios`
  ADD PRIMARY KEY (`id_exercicio`);

--
-- Indexes for table `pe_facilitadora_links`
--
ALTER TABLE `pe_facilitadora_links`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `pe_forma_pagamento`
--
ALTER TABLE `pe_forma_pagamento`
  ADD PRIMARY KEY (`id_forma`);

--
-- Indexes for table `pe_home_cursos`
--
ALTER TABLE `pe_home_cursos`
  ADD PRIMARY KEY (`id_home_cursos`);

--
-- Indexes for table `pe_integra`
--
ALTER TABLE `pe_integra`
  ADD PRIMARY KEY (`id_integra`);

--
-- Indexes for table `pe_links_home`
--
ALTER TABLE `pe_links_home`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `pe_log_acesso`
--
ALTER TABLE `pe_log_acesso`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pe_log_acesso_portal`
--
ALTER TABLE `pe_log_acesso_portal`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pe_projetos`
--
ALTER TABLE `pe_projetos`
  ADD PRIMARY KEY (`id_projeto`);

--
-- Indexes for table `pe_temas`
--
ALTER TABLE `pe_temas`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indexes for table `pe_turmas`
--
ALTER TABLE `pe_turmas`
  ADD PRIMARY KEY (`id_turma`);

--
-- Indexes for table `pe_usuarios`
--
ALTER TABLE `pe_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pe_alunos`
--
ALTER TABLE `pe_alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pe_alunos_turma`
--
ALTER TABLE `pe_alunos_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pe_banner_home`
--
ALTER TABLE `pe_banner_home`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pe_cursos`
--
ALTER TABLE `pe_cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pe_curso_exercicios`
--
ALTER TABLE `pe_curso_exercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pe_curso_temas`
--
ALTER TABLE `pe_curso_temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pe_execicios_enviados`
--
ALTER TABLE `pe_execicios_enviados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pe_exercicios`
--
ALTER TABLE `pe_exercicios`
  MODIFY `id_exercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pe_facilitadora_links`
--
ALTER TABLE `pe_facilitadora_links`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pe_forma_pagamento`
--
ALTER TABLE `pe_forma_pagamento`
  MODIFY `id_forma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pe_home_cursos`
--
ALTER TABLE `pe_home_cursos`
  MODIFY `id_home_cursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pe_integra`
--
ALTER TABLE `pe_integra`
  MODIFY `id_integra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pe_links_home`
--
ALTER TABLE `pe_links_home`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pe_log_acesso`
--
ALTER TABLE `pe_log_acesso`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pe_log_acesso_portal`
--
ALTER TABLE `pe_log_acesso_portal`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pe_projetos`
--
ALTER TABLE `pe_projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pe_temas`
--
ALTER TABLE `pe_temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pe_turmas`
--
ALTER TABLE `pe_turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pe_usuarios`
--
ALTER TABLE `pe_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
