-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.11-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema dblivraria
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ dblivraria;
USE dblivraria;

--
-- Table structure for table `dblivraria`.`contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE `contato` (
  `cod_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `profissao` varchar(60) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `celular` varchar(13) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `home` varchar(60) DEFAULT NULL,
  `face` varchar(60) DEFAULT NULL,
  `sugestoes` text,
  `informacoes` text,
  PRIMARY KEY (`cod_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dblivraria`.`contato`
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
-- Table structure for table `dblivraria`.`funcao`
--

DROP TABLE IF EXISTS `funcao`;
CREATE TABLE `funcao` (
  `cod_funcao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_funcao` varchar(30) NOT NULL,
  PRIMARY KEY (`cod_funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dblivraria`.`funcao`
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
-- Table structure for table `dblivraria`.`funcao_usuario`
--

DROP TABLE IF EXISTS `funcao_usuario`;
CREATE TABLE `funcao_usuario` (
  `cod_funcao_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_funcao` int(11) NOT NULL,
  PRIMARY KEY (`cod_funcao_usuario`),
  KEY `cod_usuario` (`cod_usuario`),
  KEY `cod_funcao` (`cod_funcao`),
  CONSTRAINT `funcao_usuario_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`),
  CONSTRAINT `funcao_usuario_ibfk_2` FOREIGN KEY (`cod_funcao`) REFERENCES `funcao` (`cod_funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dblivraria`.`funcao_usuario`
--

/*!40000 ALTER TABLE `funcao_usuario` DISABLE KEYS */;
INSERT INTO `funcao_usuario` (`cod_funcao_usuario`,`cod_usuario`,`cod_funcao`) VALUES 
 (1,1,1),
 (2,2,2),
 (3,3,3),
 (4,4,4),
 (5,5,5),
 (6,6,6),
 (7,7,7);
/*!40000 ALTER TABLE `funcao_usuario` ENABLE KEYS */;


--
-- Table structure for table `dblivraria`.`usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(60) NOT NULL,
  `nome_login` varchar(20) NOT NULL,
  `senha` varchar(10) NOT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dblivraria`.`usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`cod_usuario`,`nome_usuario`,`nome_login`,`senha`) VALUES 
 (1,'user um','um','123'),
 (2,'user dois','dois','123'),
 (3,'user tres','tres','123'),
 (4,'user quatro','quatro','123'),
 (5,'user cinco','cinco','123'),
 (6,'user seis','seis','123'),
 (7,'user sete','sete','123');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
