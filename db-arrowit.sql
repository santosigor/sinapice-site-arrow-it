-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 08:30 PM
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
-- Database: db-arrowit
--

-- --------------------------------------------------------

--
-- Table structure for table ait_autor
--

CREATE TABLE IF NOT EXISTS ait_autor (
  id_autor int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(200) DEFAULT NULL,
  cargo varchar(200) DEFAULT NULL,
  foto varchar(200) DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id_autor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_blog_post
--

CREATE TABLE IF NOT EXISTS ait_blog_post (
  id_post int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(200) DEFAULT NULL,
  segmento varchar(200) DEFAULT NULL,
  id_categoria tinyint(4) DEFAULT NULL,
  conteudo longtext DEFAULT NULL,
  imagem varchar(200) DEFAULT NULL,
  destaque tinyint(2) DEFAULT NULL,
  linkvideo varchar(200) DEFAULT NULL,
  video varchar(200) DEFAULT NULL,
  id_autor int(11) DEFAULT NULL,
  conteudo_util int(11) DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id_post)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_clientes
--

CREATE TABLE IF NOT EXISTS ait_clientes (
  id_cliente int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(200) DEFAULT NULL,
  imagem varchar(80) DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_conteudo_util
--

CREATE TABLE IF NOT EXISTS ait_conteudo_util (
  id_conteudo int(11) NOT NULL AUTO_INCREMENT,
  id_post int(11) DEFAULT NULL,
  tipo tinyint(4) DEFAULT NULL,
  comentario varchar(500) DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  PRIMARY KEY (id_conteudo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_dadosgerais
--

CREATE TABLE IF NOT EXISTS ait_dadosgerais (
  id_dados int(11) NOT NULL AUTO_INCREMENT,
  endereco varchar(500) DEFAULT NULL,
  telefone varchar(100) DEFAULT NULL,
  celular varchar(100) DEFAULT NULL,
  email varchar(500) DEFAULT NULL,
  facebook varchar(100) DEFAULT NULL,
  instagram varchar(100) DEFAULT NULL,
  linkedin varchar(100) DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id_dados)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_depoimentos
--

CREATE TABLE IF NOT EXISTS ait_depoimentos (
  id_depoimento int(11) NOT NULL AUTO_INCREMENT,
  texto longtext DEFAULT NULL,
  cliente varchar(200) DEFAULT NULL,
  cargo varchar(200) DEFAULT NULL,
  id_projeto int(11) DEFAULT NULL,
  video varchar(100) DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id_depoimento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_home_banner
--

CREATE TABLE IF NOT EXISTS ait_home_banner (
  id_banner int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(200) DEFAULT NULL,
  imagem varchar(80) DEFAULT NULL,
  imagemmobile varchar(80) DEFAULT NULL,
  imagemtablet varchar(80) DEFAULT NULL,
  destaque tinyint(2) DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id_banner)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_log_acesso
--

CREATE TABLE IF NOT EXISTS ait_log_acesso (
  id_log int(11) NOT NULL AUTO_INCREMENT,
  id_usuario int(11) DEFAULT NULL,
  ip_usuario varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  modelo varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  data_login datetime DEFAULT NULL,
  PRIMARY KEY (id_log)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table ait_parceiros
--

CREATE TABLE IF NOT EXISTS ait_parceiros (
  id_parceiro int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(200) DEFAULT NULL,
  imagem varchar(80) DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id_parceiro)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_projetos
--

CREATE TABLE IF NOT EXISTS ait_projetos (
  id_projeto int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(500) DEFAULT NULL,
  setor varchar(500) DEFAULT NULL,
  imagem varchar(80) DEFAULT NULL,
  tempo_processo varchar(500) DEFAULT NULL,
  ambiente varchar(500) DEFAULT NULL,
  desafios longtext DEFAULT NULL,
  solucao longtext DEFAULT NULL,
  resultados longtext DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id_projeto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_projeto_servicos
--

CREATE TABLE IF NOT EXISTS ait_projeto_servicos (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_projeto int(11) DEFAULT NULL,
  id_servico int(11) DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_servicos
--

CREATE TABLE IF NOT EXISTS ait_servicos (
  id_servico int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(100) DEFAULT NULL,
  descricao varchar(500) DEFAULT NULL,
  imagem varchar(80) DEFAULT NULL,
  diferenciais longtext DEFAULT NULL,
  objetivo longtext DEFAULT NULL,
  beneficios longtext DEFAULT NULL,
  ip_cadastro varchar(50) DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  PRIMARY KEY (id_servico)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table ait_usuarios
--

CREATE TABLE IF NOT EXISTS ait_usuarios (
  id_usuario int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  id_perfil tinyint(2) DEFAULT NULL,
  login varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  password varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  data_cadastro datetime DEFAULT NULL,
  quem_cadastrou int(11) DEFAULT NULL,
  ip_cadastro varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
