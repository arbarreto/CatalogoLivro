-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.10-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema db_livraria
--

CREATE DATABASE IF NOT EXISTS db_livraria;
USE db_livraria;

--
-- Definition of table `autores_destaque`
--

DROP TABLE IF EXISTS `autores_destaque`;
CREATE TABLE `autores_destaque` (
  `cod_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(60) NOT NULL,
  `foto_autor` varchar(60) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `bibliografia` text,
  PRIMARY KEY (`cod_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autores_destaque`
--

/*!40000 ALTER TABLE `autores_destaque` DISABLE KEYS */;
INSERT INTO `autores_destaque` (`cod_autor`,`nome_autor`,`foto_autor`,`dt_nasc`,`bibliografia`) VALUES 
 (1,'Jey Caroa','','1989-05-26',''),
 (2,'Toquen Jr','','1856-04-05',''),
 (3,'Jon Gren','','1869-05-02',''),
 (4,'Friedrich Nietzsche','','1844-10-15',''),
 (5,'Augusto Cury','','1958-10-02',''),
 (6,'Martin Luther King','','1929-01-15',''),
 (7,'Álvares de Azevedo','','1831-09-12','');
/*!40000 ALTER TABLE `autores_destaque` ENABLE KEYS */;


--
-- Definition of table `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE `contato` (
  `cod_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `profissao` varchar(60) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `celular` varchar(13) NOT NULL,
  `email` varchar(60) NOT NULL,
  `home` varchar(60) DEFAULT NULL,
  `face` varchar(60) DEFAULT NULL,
  `sugestoes` text,
  `informacoes` text,
  PRIMARY KEY (`cod_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contato`
--

/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` (`cod_contato`,`nome`,`sexo`,`profissao`,`telefone`,`celular`,`email`,`home`,`face`,`sugestoes`,`informacoes`) VALUES 
 (1,'Maria','F','auxiliar de auxiliar','1141418899','11987453232','maria@maria.com','maria.com','facebook.com/maria','nao há','não há'),
 (2,'Joao','M','aprovador','1146465698','11987874521','joao@joao.com','joao.com','facebook.com/joao','nao há','nao há'),
 (3,'Ana','F','comediante','1236364587','12965652145','ana@ana.com','ana.com','facebook.com/ana','nao há','nao há'),
 (4,'Pedro','M','ator','2136259874','21963214578','pedro@pedro.com','pedro.com','facebook.com/pedro','nao há','nao há'),
 (5,'Sebastiao','M','medico','1332548974','13932141596','sebastiao@sebastiao.com','sebastiao.com','facebook.com/sebastiao','nao há','nao há'),
 (6,'Juliana','F','psicologa','1336549874','13987423216','juliana@juliana.com','juliana.com','facebook.com/juliana','nao há','nao há'),
 (7,'Mariana','F','enfermeira','1146693214','11969687898','mariana@mariana.com','mariana.com','facebook.com/mariana','nao há','nao há');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;


--
-- Definition of table `funcao`
--

DROP TABLE IF EXISTS `funcao`;
CREATE TABLE `funcao` (
  `cod_funcao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_funcao` varchar(30) NOT NULL,
  PRIMARY KEY (`cod_funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `funcao`
--

/*!40000 ALTER TABLE `funcao` DISABLE KEYS */;
INSERT INTO `funcao` (`cod_funcao`,`nome_funcao`) VALUES 
 (1,'administrador'),
 (2,'cataloguista'),
 (3,'operador básico'),
 (4,'peao'),
 (5,'rainha'),
 (6,'torre'),
 (7,'bispo');
/*!40000 ALTER TABLE `funcao` ENABLE KEYS */;


--
-- Definition of table `lojas`
--

DROP TABLE IF EXISTS `lojas`;
CREATE TABLE `lojas` (
  `cod_loja` int(11) NOT NULL AUTO_INCREMENT,
  `foto_loja` varchar(60) DEFAULT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lojas`
--

/*!40000 ALTER TABLE `lojas` DISABLE KEYS */;
INSERT INTO `lojas` (`cod_loja`,`foto_loja`,`telefone`,`email`,`endereco`) VALUES 
 (8,'arquivos/img1-.jpg','fdsaf','fdsafds','fdsafds'),
 (9,'arquivos/contato.png','fdsafd','fdsafds','fdsafdsa');
/*!40000 ALTER TABLE `lojas` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(60) NOT NULL,
  `nome_login` varchar(20) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `cod_funcao` int(11) NOT NULL,
  PRIMARY KEY (`cod_usuario`),
  KEY `cod_funcao` (`cod_funcao`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_funcao`) REFERENCES `funcao` (`cod_funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`cod_usuario`,`nome_usuario`,`nome_login`,`senha`,`cod_funcao`) VALUES 
 (1,'diego sena','diego','123',1),
 (2,'user um','um','123',2),
 (3,'user dois','dois','123',3),
 (4,'user tres','tres','123',4),
 (5,'user quatro','quatro','123',5),
 (6,'user cinco','cinco','123',6),
 (7,'user seis','seis','123',7);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
