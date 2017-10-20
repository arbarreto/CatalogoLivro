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
-- Definition of table `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE `autor` (
  `cod_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(60) NOT NULL,
  `foto_autor` varchar(60) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `bibliografia` text,
  PRIMARY KEY (`cod_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autor`
--

/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` (`cod_autor`,`nome_autor`,`foto_autor`,`dt_nasc`,`bibliografia`) VALUES 
 (1,'Friedrich Nietzsche','arquivos/autor-1.jpg','1844-10-15','Friedrich Wilhelm Nietzsche (Röcken, 15 de outubro de 1844 — Weimar, 25 de agosto de 1900) foi um filólogo, filósofo, crítico cultural, poeta e compositor alemão do século XIX. Ele escreveu vários textos críticos sobre a religião, a moral, a cultura contemporânea, filosofia e ciência, exibindo uma predileção por metáfora, ironia e aforismo.'),
 (2,'Augusto Cury','arquivos/autor-2.jpg','1958-10-02','Augusto Jorge Cury, nascido em 02 de outubro de 1958, é médico, psiquiatra, psicoterapeuta e escritor brasileiro. Desenvolveu a teoria da Inteligência Multifocal, que estuda sobre o funcionamento da mente, o processo de construção do pensamento e formação de pensadores. Seus livros já venderam 20 milhões de exemplares somente no Brasil.'),
 (3,'Cecília Meireles','arquivos/autor-3.jpg','1901-11-07','Cecília Benevides de Carvalho Meireles nasceu no bairro da Tijuca, Rio de Janeiro, em 7 de novembro de 1901, filha dos açorianos Carlos Alberto de Carvalho Meireles, um funcionário de banco, e Matilde Benevides Meireles, uma professora.'),
 (4,'Álvares de Azevedo','arquivos/autor-4.jpg','1831-09-12','Filho de Inácio Manuel Álvares de Azevedo e Maria Luísa Mota Azevedo, passou a infância no Rio de Janeiro, onde iniciou seus estudos. Voltou a São Paulo, em 1847, para estudar na Faculdade de Direito do Largo de São Francisco, onde, desde logo, ganhou fama por brilhantes e precoces produções literárias. Destacou-se pela facilidade de aprender línguas e pelo espírito jovial e sentimental.'),
 (5,'J. K. Rowling','arquivos/autor-5.jpg','1965-07-31','A escritora britânica Joanne Kathleen Rowling nasceu na cidade de Yate, nas proximidades de Bristol, na Inglaterra, em 31 de julho de 1965. Ela se tornaria célebre pela criação do bruxinho Harry Potter, que lhe renderia sete volumes de uma série premiada e aceita quase unanimemente pela crítica e pelo público.');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;


--
-- Definition of table `autores_destaque`
--

DROP TABLE IF EXISTS `autores_destaque`;
CREATE TABLE `autores_destaque` (
  `cod_autor_destaque` int(11) NOT NULL AUTO_INCREMENT,
  `cod_autor` int(11) DEFAULT NULL,
  `cod_estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_autor_destaque`),
  KEY `cod_autor` (`cod_autor`),
  KEY `cod_estatus` (`cod_estatus`),
  CONSTRAINT `autores_destaque_ibfk_1` FOREIGN KEY (`cod_autor`) REFERENCES `autor` (`cod_autor`),
  CONSTRAINT `autores_destaque_ibfk_2` FOREIGN KEY (`cod_estatus`) REFERENCES `estatus` (`cod_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autores_destaque`
--

/*!40000 ALTER TABLE `autores_destaque` DISABLE KEYS */;
INSERT INTO `autores_destaque` (`cod_autor_destaque`,`cod_autor`,`cod_estatus`) VALUES 
 (1,1,1),
 (2,2,2),
 (3,3,1),
 (4,4,2),
 (5,5,2);
/*!40000 ALTER TABLE `autores_destaque` ENABLE KEYS */;


--
-- Definition of table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `cod_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`cod_categoria`,`nome_categoria`) VALUES 
 (1,'Técnicos'),
 (2,'Didáticos'),
 (3,'Infantis');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


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
-- Definition of table `estatus`
--

DROP TABLE IF EXISTS `estatus`;
CREATE TABLE `estatus` (
  `cod_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`cod_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estatus`
--

/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` (`cod_estatus`,`texto`) VALUES 
 (1,'sim'),
 (2,'não');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;


--
-- Definition of table `funcao`
--

DROP TABLE IF EXISTS `funcao`;
CREATE TABLE `funcao` (
  `cod_funcao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_funcao` varchar(30) NOT NULL,
  PRIMARY KEY (`cod_funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `funcao`
--

/*!40000 ALTER TABLE `funcao` DISABLE KEYS */;
INSERT INTO `funcao` (`cod_funcao`,`nome_funcao`) VALUES 
 (1,'administrador'),
 (2,'cataloguista'),
 (3,'operador básico');
/*!40000 ALTER TABLE `funcao` ENABLE KEYS */;


--
-- Definition of table `livro`
--

DROP TABLE IF EXISTS `livro`;
CREATE TABLE `livro` (
  `cod_livro` int(11) NOT NULL AUTO_INCREMENT,
  `foto_livro` varchar(60) NOT NULL,
  `nome_livro` varchar(60) NOT NULL,
  `desc_livro` text,
  `preco_livro` float(5,2) DEFAULT NULL,
  `cod_autor` int(11) DEFAULT NULL,
  `cod_subcategoria` int(11) DEFAULT NULL,
  `visualizacao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_livro`),
  KEY `cod_autor` (`cod_autor`),
  KEY `cod_subcategoria` (`cod_subcategoria`),
  CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`cod_autor`) REFERENCES `autor` (`cod_autor`),
  CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`cod_subcategoria`) REFERENCES `subcategoria` (`cod_subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livro`
--

/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` (`cod_livro`,`foto_livro`,`nome_livro`,`desc_livro`,`preco_livro`,`cod_autor`,`cod_subcategoria`,`visualizacao`) VALUES 
 (1,'arquivos/livro-1.jpg','Harry Potter e o Prisioneiro de Azkaban','Durante 12 anos o forte de Azkaban guardou o prisioneiro Sirius Black, acusado de matar 13 pessoas e ser o principal ajudante de Voldemort, o Senhor das Trevas. Agora ele conseguiu escapar, deixando apenas uma pista: seu destino é a escola de Hogwarts, em busca de Harry Potter.',20.00,5,1,22),
 (2,'arquivos/livro-2.jpg','Ansiedade - Como Enfrentar o Mal do Século','Você sofre por antecipação? Acorda cansado? Não tolera trabalhar com pessoas lentas? Tem dores de cabeça ou muscular? Esquece-se das coisas com facilidade? Se você respondeu “sim” a alguma dessas questões, é bem provável que sofra da Síndrome do Pensamento Acelerado (SPA).',14.90,2,2,8),
 (3,'arquivos/livro-3.jpg','Friedrich Nietzsche - Obras Escolhidas','A obra do filósofo alemão Friedrich Nietzsche (1844-1900) permaneceu, durante um longo período, incompreendida e mesmo não lida. Primeiro, em função da decadência mental que acometeu o autor e levou-o precocemente à morte, aos 55 anos, impossibilitando que defendesse seus escritos.',61.22,1,3,45),
 (4,'arquivos/livro-4.jpg','Noite na Taverna','Um grupo de boêmios em uma taverna filosofando sobre a vida. Cinco amigos relembram casos sanguinolentos de amor, depurando suas dores e seus males num ambiente sombrio. Nesta adaptação em HQ de Noite na Taverna, publicado originalmente em 1855, pelo jovem Álvares de Azevedo...',31.60,4,4,26),
 (5,'arquivos/livro-5.jpg','Romanceiro da Inconfidência','De fato, o \"Romanceiro da Inconfidência\", publicado há alguns meses, resulta de uma combinação homogênea entre força poética, domínio da língua, erudição, e senso do detalhe histórico valorizado em vista de uma transposição superior, própria ao código da poesia.',29.40,3,5,20);
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;


--
-- Definition of table `livro_mes`
--

DROP TABLE IF EXISTS `livro_mes`;
CREATE TABLE `livro_mes` (
  `cod_livro_mes` int(11) NOT NULL AUTO_INCREMENT,
  `cod_livro` int(11) DEFAULT NULL,
  `cod_estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_livro_mes`),
  KEY `cod_estatus` (`cod_estatus`),
  CONSTRAINT `livro_mes_ibfk_1` FOREIGN KEY (`cod_estatus`) REFERENCES `estatus` (`cod_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livro_mes`
--

/*!40000 ALTER TABLE `livro_mes` DISABLE KEYS */;
INSERT INTO `livro_mes` (`cod_livro_mes`,`cod_livro`,`cod_estatus`) VALUES 
 (1,1,2),
 (2,2,2),
 (3,3,2),
 (4,4,1),
 (5,5,2);
/*!40000 ALTER TABLE `livro_mes` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lojas`
--

/*!40000 ALTER TABLE `lojas` DISABLE KEYS */;
INSERT INTO `lojas` (`cod_loja`,`foto_loja`,`telefone`,`email`,`endereco`) VALUES 
 (1,'arquivos/livraria-1.jpg','1136529874','loja1@woodwoodpecker.com','Sé'),
 (2,'arquivos/livraria-2.jpg','1146467898','loja2@woodwoodpecker.com','Vila Mariana'),
 (3,'arquivos/livraria-3.jpg','1135987412','loja3@woodwoodpecker.com','Brás'),
 (4,'arquivos/livraria-4.jpg','1136541287','loja4@woodwoodpecker.com','Cotia');
/*!40000 ALTER TABLE `lojas` ENABLE KEYS */;


--
-- Definition of table `subcategoria`
--

DROP TABLE IF EXISTS `subcategoria`;
CREATE TABLE `subcategoria` (
  `cod_subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_subcategoria` varchar(60) DEFAULT NULL,
  `cod_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_subcategoria`),
  KEY `cod_categoria` (`cod_categoria`),
  CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategoria`
--

/*!40000 ALTER TABLE `subcategoria` DISABLE KEYS */;
INSERT INTO `subcategoria` (`cod_subcategoria`,`nome_subcategoria`,`cod_categoria`) VALUES 
 (1,'Informática',1),
 (2,'Algoritimos',1),
 (3,'Português',2),
 (4,'Matematica',2),
 (5,'João e Maria',3),
 (6,'Mangas',3);
/*!40000 ALTER TABLE `subcategoria` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`cod_usuario`,`nome_usuario`,`nome_login`,`senha`,`cod_funcao`) VALUES 
 (1,'adiministrador','adm','123',1),
 (2,'cataloguista','cat','123',2),
 (3,'operador basico','op','123',3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
