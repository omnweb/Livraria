/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.6.21 : Database - livraria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`livraria` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `livraria`;

/*Table structure for table `autor` */

DROP TABLE IF EXISTS `autor`;

CREATE TABLE `autor` (
  `idautor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `nacionalidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idautor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `autor` */

insert  into `autor`(`idautor`,`nome`,`nacionalidade`) values (1,'Sun Tzu','China');

/*Table structure for table `autorlivro` */

DROP TABLE IF EXISTS `autorlivro`;

CREATE TABLE `autorlivro` (
  `idautorlivro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `livro_idlivro` int(10) unsigned NOT NULL,
  `autor_idautor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idautorlivro`),
  KEY `autorlivro_FKIndex1` (`autor_idautor`),
  KEY `autorlivro_FKIndex2` (`livro_idlivro`),
  CONSTRAINT `autorlivro_ibfk_1` FOREIGN KEY (`autor_idautor`) REFERENCES `autor` (`idautor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `autorlivro_ibfk_2` FOREIGN KEY (`livro_idlivro`) REFERENCES `livro` (`idlivro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `autorlivro` */

insert  into `autorlivro`(`idautorlivro`,`livro_idlivro`,`autor_idautor`) values (1,1,1);

/*Table structure for table `editora` */

DROP TABLE IF EXISTS `editora`;

CREATE TABLE `editora` (
  `ideditora` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`ideditora`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `editora` */

insert  into `editora`(`ideditora`,`nome`) values (1,'Sagaz');

/*Table structure for table `genero` */

DROP TABLE IF EXISTS `genero`;

CREATE TABLE `genero` (
  `idgenero` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `genero` */

insert  into `genero`(`idgenero`,`descricao`) values (1,'Auto Ajuda');

/*Table structure for table `livro` */

DROP TABLE IF EXISTS `livro`;

CREATE TABLE `livro` (
  `idlivro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `editora_ideditora` int(10) unsigned NOT NULL,
  `genero_idgenero` int(10) unsigned NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idlivro`),
  KEY `livro_FKIndex1` (`genero_idgenero`),
  KEY `livro_FKIndex2` (`editora_ideditora`),
  CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`genero_idgenero`) REFERENCES `genero` (`idgenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`editora_ideditora`) REFERENCES `editora` (`ideditora`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `livro` */

insert  into `livro`(`idlivro`,`editora_ideditora`,`genero_idgenero`,`titulo`) values (1,1,1,'A Arte da Guerra');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
