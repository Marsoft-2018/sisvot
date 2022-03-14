/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.22-MariaDB : Database - bdt_personeros
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdt_personeros` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bdt_personeros`;

/*Table structure for table `candidatos` */

DROP TABLE IF EXISTS `candidatos`;

CREATE TABLE `candidatos` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FOTO` char(150) COLLATE utf8_bin DEFAULT 'default',
  `alumnos_CODEST` char(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `partido` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_candidatosvot_alumnos1_idx` (`alumnos_CODEST`),
  CONSTRAINT `fk_candidatosvot_alumnos1` FOREIGN KEY (`alumnos_CODEST`) REFERENCES `estudiantes` (`CODEST`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `candidatos` */

insert  into `candidatos`(`Id`,`FOTO`,`alumnos_CODEST`,`color`,`partido`) values (0,'Enblanco.png','voto_b2021','#FAFAFA',NULL),(1,'jose.jpg','371','green','MOVIMIENTO SANRAFAELISTA'),(2,'shadia.jpg','114','#64039A','EXELENCIA'),(3,'libardo.jpg','284','#FFC700','LIDERAZGO JUVENIL');

/*Table structure for table `estudiantes` */

DROP TABLE IF EXISTS `estudiantes`;

CREATE TABLE `estudiantes` (
  `CODEST` char(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `GRADO` double DEFAULT NULL,
  `GRUPO` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO1` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO2` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `NOMBRE1` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `NOMBRE2` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `EST` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT 'Inactivo',
  `codInst` int(11) NOT NULL DEFAULT 1,
  `SEXO` char(2) COLLATE utf8_bin NOT NULL,
  `ROL` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'Estudiante',
  `contrasena` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '123456',
  PRIMARY KEY (`CODEST`),
  KEY `fk_alumnos_Institucion1_idx` (`codInst`),
  CONSTRAINT `fk_alumnos_Institucion1` FOREIGN KEY (`codInst`) REFERENCES `institucion` (`idInstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `estudiantes` */

insert  into `estudiantes`(`CODEST`,`GRADO`,`GRUPO`,`APELLIDO1`,`APELLIDO2`,`NOMBRE1`,`NOMBRE2`,`EST`,`codInst`,`SEXO`,`ROL`,`contrasena`) values ('001',11,'1','GARCIA','PEREZ','JORGE','ANDRES','Ya Voto',1,'M','Estudiante','123456'),('003',5,'1','SAAB','GUTIERREZ','HAISAM','KARIM','Ya Voto',1,'M','Estudiante','123456'),('009',5,'1','OBREDOR','YEPES','JUAN','SEBASTIAN','Ya Voto',1,'M','Estudiante','123456'),('010',3,'1','BENITEZ','VASQUEZ','SANTIAGO','JOSE','Ya Voto',1,'M','Estudiante','123456'),('011',5,'1','FERNANDEZ','VIDAL','SARA','SOPHIA','Ya Voto',1,'F','Estudiante','123456'),('013',8,'1','ARISTIZABAL','CONDE','SEBASTIAN','','Ya Voto',1,'M','Estudiante','123456'),('014',10,'1','TORRES','RAMIREZ','ISABELLA','','Inactivo',1,'F','Estudiante','123456'),('016',3,'1','SANCHEZ','ESPINOSA','PEDRO','JULIO','Ya Voto',1,'M','Estudiante','123456'),('017',-1,'1','HERNANDEZ','BALLESTA','JHOSUA','DAVID','Ya Voto',1,'M','Estudiante','123456'),('018',0,'1','ANDRADES','NARVAEZ','MOISES','ELIAS','Ya Voto',1,'M','Estudiante','123456'),('019',5,'1','BARON','NARVAEZ','MARIA','DEL CIELO','Ya Voto',1,'F','Estudiante','123456'),('02',1,'1','GARCIA','GARCIA','CESAR','ANDRES','Ya Voto',1,'M','Estudiante','123456'),('021',-1,'1','NAVARRO','MEJIA','ANTONELLA','','Ya Voto',1,'F','Estudiante','123456'),('022',-1,'1','MARMOL','LUNA','ABIGAIL','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('023',5,'1','BARRETO','ARDILA','MARIA','CAMILA','Ya Voto',1,'F','Estudiante','123456'),('024',10,'1','LOPEZ','CASTAÑO','NICOLL','DANIELA','Ya Voto',1,'F','Estudiante','123456'),('025',10,'1','PONNEFZ','FONTALVO','JULIANA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('026',3,'1','NOVOA','MONTES','JUAN','FELIPE','Ya Voto',1,'M','Estudiante','123456'),('027',4,'1','MONTES','OCHOA','SANTIAGO','RAFAEL','Ya Voto',1,'M','Estudiante','123456'),('028',9,'1','HERNANDEZ','BALLESTA','JESUS','DAVID','Ya Voto',1,'M','Estudiante','123456'),('029',3,'1','CASTILLO','TAPIAS','LUCIANA','','Ya Voto',1,'F','Estudiante','123456'),('030',5,'1','ANDRADE','FONTALVO','JESUS','JAVIER','Ya Voto',1,'M','Estudiante','123456'),('031',2,'1','GARCIA','YEPES','JULIETTA','','Ya Voto',1,'F','Estudiante','123456'),('032',4,'1','ROJANO','TORRES','ALEJANDRO','MIGUEL','Ya Voto',1,'M','Estudiante','123456'),('033',9,'1','SIERRA','CHAMORRO','ANTONELLA','','Ya Voto',1,'F','Estudiante','123456'),('034',4,'1','FERNANDEZ','TOBIAS','MARIANA','','Ya Voto',1,'F','Estudiante','123456'),('035',3,'1','POSADA','HERNANDEZ','GABRIEL','JOSE','Ya Voto',1,'M','Estudiante','123456'),('036',8,'1','ORTIZ','ROMANO','LUIS','ANDRES','Ya Voto',1,'M','Estudiante','123456'),('037',3,'1','GOMEZ','CONTRERAS','DAVID','SANTIAGO','Ya Voto',1,'M','Estudiante','123456'),('038',0,'1','IZQUIERDO','OVIEDO','IBETH','JOHANA','Ya Voto',1,'F','Estudiante','123456'),('039',7,'1','RICARDO','MOLINARES','VALENTINA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('04',1,'1','GARCIA','ORTEGA','LUCIANA','','Ya Voto',1,'F','Estudiante','123456'),('040',6,'1','HERRAN','STEVENSON','SEBASTIAN','','Ya Voto',1,'M','Estudiante','123456'),('041',4,'1','SANCHEZ','LORA','ANA','LUCÍA','Ya Voto',1,'F','Estudiante','123456'),('042',4,'1','HERRAN','STEVENSON','ESTEBAN','','Ya Voto',1,'M','Estudiante','123456'),('045',0,'1','NUÑEZ','EUSSE','JERONIMO','','Ya Voto',1,'M','Estudiante','123456'),('046',10,'1','LOPEZ','VIZCAINO','ANGELLY','YULIANA','Ya Voto',1,'F','Estudiante','123456'),('047',10,'1','BOBADILLA','MIRANDA','ISABELLA','','Ya Voto',1,'F','Estudiante','123456'),('048',7,'1','GARCIA','MEZA','JESUS','MANUEL','Ya Voto',1,'M','Estudiante','123456'),('049',4,'1','MORANTE','OCAMPO','JUAN','JOSE','Ya Voto',1,'M','Estudiante','123456'),('051',9,'1','BANQUETT','SIERRA','MELANY','YANITH','Ya Voto',1,'F','Estudiante','123456'),('052',10,'1','BARRIOS','MEJIA','MARIA','ELENA','Ya Voto',1,'F','Estudiante','123456'),('054',2,'1','LORA','YEPES','MARTIN','','Ya Voto',1,'M','Estudiante','123456'),('055',9,'1','MONTERO','NOVOA','TOMAS','GUILLERMO','Ya Voto',1,'M','Estudiante','123456'),('056',4,'1','OVIEDO','MEZA','KAROL','MARIANA','Ya Voto',1,'F','Estudiante','123456'),('057',11,'1','RIVERA','CASTRO','ALICIA','ESTER','Ya Voto',1,'F','Estudiante','123456'),('058',6,'1','CHACON','COLLANTE','SOFIA','','Ya Voto',1,'F','Estudiante','123456'),('059',9,'1','ROMERO','MARTINEZ','IVAN','RENE','Ya Voto',1,'M','Estudiante','123456'),('06',0,'1','MARTELO','TORRES','EMMA','MARIA','Inactivo',1,'F','Estudiante','123456'),('060',2,'1','DUARTE','MEDINA','THOMAS','','Ya Voto',1,'M','Estudiante','123456'),('062',9,'1','CARDENAS','ARAGON','CRISTIAN','DAVID','Ya Voto',1,'M','Estudiante','123456'),('063',10,'1','PUELLO','BARRAZA','GUILLERMO','ALEJANDRO','Ya Voto',1,'M','Estudiante','123456'),('065',8,'1','PEREZ','BARRIOS','VALERIA','','Ya Voto',1,'F','Estudiante','123456'),('069',10,'1','VASQUEZ','MORRON','PEDRO','JOSE','Ya Voto',1,'M','Estudiante','123456'),('070',8,'1','SALAZAR','MENDOZA','JOAQUIN','GABRIEL','Ya Voto',1,'M','Estudiante','123456'),('071',3,'1','TERAN','BALLESTEROS','JESUS','DAVID','Ya Voto',1,'M','Estudiante','123456'),('072',7,'1','VARGAS','TOBIAS','PAULA','ALEJANDRA','Ya Voto',1,'F','Estudiante','123456'),('073',10,'1','CARDENAS','TORRES','ISAAC','DAVID','Ya Voto',1,'M','Estudiante','123456'),('074',3,'1','MARMOL','LUNA','DANIEL','ALEJANDRO','Ya Voto',1,'M','Estudiante','123456'),('075',7,'1','TORRES','TORRES','PAULA','ANDREA','Ya Voto',1,'F','Estudiante','123456'),('076',3,'1','BOBADILLA','LOAIZA','JUAN','DIEGO','Ya Voto',1,'M','Estudiante','123456'),('077',0,'1','TORRES','TORRES','CARLOS','EDUARDO','Ya Voto',1,'M','Estudiante','123456'),('079',6,'1','MIRANDA','CARDENAS','JUAN','DAVID','Ya Voto',1,'M','Estudiante','123456'),('080',5,'1','TAPIA','SEÑAS','ALEX','DAVID','Ya Voto',1,'M','Estudiante','123456'),('082',2,'1','BENAVIDES','ORTEGA','VALENTINA','','Ya Voto',1,'F','Estudiante','123456'),('084',-1,'1','MUÑOZ','ROMERO','ISAAC','DANIEL','Ya Voto',1,'M','Estudiante','123456'),('085',9,'1','OCAMPO','SUAREZ','MARIA','ANDREA','Ya Voto',1,'F','Estudiante','123456'),('086',2,'1','RODELO','REYES','AHINARA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('090',2,'1','ANGULO','TORRES','MARIA','SALOME','Ya Voto',1,'F','Estudiante','123456'),('091',11,'1','HERNANDEZ','RIVERA','MALE','','Ya Voto',1,'F','Estudiante','123456'),('093',5,'1','BOBADILLA','YERENA','SALMA','ISABELLA','Ya Voto',1,'F','Estudiante','123456'),('095',-2,'1','MUÑOZ','DE LA ROSA','MATIAS','','Ya Voto',1,'M','Estudiante','123456'),('096',8,'1','RAMIREZ','ACOSTA','SHANNIK','DEL ROSARIO','Ya Voto',1,'F','Estudiante','123456'),('097',10,'1','SANABRIA','GARRIDO','SANTIAGO','DE LOS SANTOS','Ya Voto',1,'M','Estudiante','123456'),('098',7,'1','GALVAN','TAPIA','HENRY','','Ya Voto',1,'M','Estudiante','123456'),('099',9,'1','CONSUEGRA','ROMERO','NICOLAS','ANDRÉS','Ya Voto',1,'M','Estudiante','123456'),('100',4,'1','PIMIENTA','ORTEGA','JESUS','ALEJANDRO','Ya Voto',1,'M','Estudiante','123456'),('101',7,'1','CARDENAS','TORRES','ABRAHAM','DAVID','Ya Voto',1,'M','Estudiante','123456'),('102',9,'1','SANCHEZ','LORA','SANTIAGO','ANDRES','Ya Voto',1,'M','Estudiante','123456'),('103',11,'1','ESPITALETA','LEGUIA','ESMERALDA','','Ya Voto',1,'F','Estudiante','123456'),('106',-2,'1','TORRES','ORTEGA','ROCIO','DEL CARMEN','Ya Voto',1,'F','Estudiante','123456'),('108',0,'1','LUNAS','MARQUEZ','DYLAN','JAVIER','Ya Voto',1,'M','Estudiante','123456'),('109',7,'1','ANDRADE','TORRES','RENE','ARMANDO','Ya Voto',1,'M','Estudiante','123456'),('110',0,'1','RODRIGUEZ','PELUFFO','JOSE','FERNANDO','Ya Voto',1,'M','Estudiante','123456'),('111',9,'1','SALAZAR','BERNAL','CHINDAU','','Ya Voto',1,'F','Estudiante','123456'),('112',1,'1','PEREZ','MERCADO','VALERY','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('114',11,'1','GARIZAO','QUESADA','SHADIA','VALENTINA','Ya Voto',1,'F','Estudiante','123456'),('115',6,'1','PEREZ','MERCADO','AURA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('116',6,'1','MONTES','YEPES','JUAN','JOSE','Ya Voto',1,'M','Estudiante','123456'),('117',2,'1','SIERRA','FERRER','LEANDRO','JOSE','Ya Voto',1,'M','Estudiante','123456'),('118',7,'1','LOZANO','TORRES','ISABELLA','','Ya Voto',1,'F','Estudiante','123456'),('121',9,'1','GIRALDO','PEREZ','DIEGO','ALEJANDRO','Ya Voto',1,'M','Estudiante','123456'),('124',3,'1','BARRAZA','ZAPATA','JULIANA','','Ya Voto',1,'F','Estudiante','123456'),('127',6,'1','ROJANO','COTES','VALERIA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('129',4,'1','SANCHEZ','ROJANO','VICTORIA','','Ya Voto',1,'F','Estudiante','123456'),('130',11,'1','HERRERA','VARGAS','JUAN','DAVID','Ya Voto',1,'M','Estudiante','123456'),('132',11,'1','HERRERA','PEREA','SEBASTIAN','ELIAS','Ya Voto',1,'M','Estudiante','123456'),('133',11,'1','GARRIDO','TAPIA','FRANSCESKA','','Ya Voto',1,'F','Estudiante','123456'),('135',0,'1','GARCIA','ESTRADA','SAMUEL','ELIAS','Ya Voto',1,'M','Estudiante','123456'),('137',11,'1','RICO','RODRIGUEZ','DANIELA','ANDREA','Ya Voto',1,'F','Estudiante','123456'),('138',-1,'1','SERRANO','FONTALVO','CESAR','RAFAEL','Ya Voto',1,'M','Estudiante','123456'),('139',8,'1','HERRERA','DUARTE','ISAAC','DANIEL','Ya Voto',1,'M','Estudiante','123456'),('141',10,'1','VARGAS','HERRERA','FABIAN','HUMBERTO','Ya Voto',1,'M','Estudiante','123456'),('142',2,'1','BARRIOS','CASTRO','TOMAS','','Ya Voto',1,'M','Estudiante','123456'),('144',5,'1','MORANTE','OCAMPO','CAMILA','ANDREA','Ya Voto',1,'F','Estudiante','123456'),('145',11,'1','MONTES','SALAZAR','SAMUEL','DAVID','Inactivo',1,'M','Estudiante','123456'),('146',8,'1','VILORIA','CABEZA','DARIANA','MARCELA','Ya Voto',1,'F','Estudiante','123456'),('147',10,'1','VEGA','TORRES','JESUS','DAVID','Ya Voto',1,'M','Estudiante','123456'),('149',1,'1','VERGARA','RODRIGUEZ','NICOLAS','ALFONSO','Ya Voto',1,'M','Estudiante','123456'),('151',7,'1','ROJANO','TORRES','LUNA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('152',3,'1','DIAZ','SISILIANO','ISABELLA','','Ya Voto',1,'F','Estudiante','123456'),('154',0,'1','MARTINEZ','CASTILLO','MATHIAS','ALEJANDRO','Inactivo',1,'M','Estudiante','123456'),('156',7,'1','MARQUEZ','SANCHEZ','LUZ','ANGELA','Ya Voto',1,'F','Estudiante','123456'),('157',8,'1','YEPES','ARRIETA','LUISA','DANIELA','Ya Voto',1,'F','Estudiante','123456'),('160',-1,'1','BERROCAL','FONSECA','DANIEL','ELIAS','Ya Voto',1,'M','Estudiante','123456'),('161',2,'1','TORRES','COHEN','SARA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('162',0,'1','TERAN','BALLESTEROS','JOSE','DAVID','Ya Voto',1,'M','Estudiante','123456'),('163',2,'1','PEREZ','SIERRA','SALOME','','Ya Voto',1,'F','Estudiante','123456'),('165',3,'1','BOBADILLA','YERENA','MARIANA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('168',2,'1','BARRERO','PALIS','MARIA','FERNANDA','Ya Voto',1,'F','Estudiante','123456'),('169',4,'1','PULGAR','LORA','LUISA','FERNANDA','Ya Voto',1,'F','Estudiante','123456'),('170',4,'1','VILLEGAS','QUESADA','LUISA','VALENTINA','Ya Voto',1,'F','Estudiante','123456'),('171',6,'1','MEDINA','MONTES','MARIANA','MICHELLE','Ya Voto',1,'F','Estudiante','123456'),('172',3,'1','ARRIETA','HERNANDEZ','ALEJANDRO','','Ya Voto',1,'M','Estudiante','123456'),('173',8,'1','ESPITALETA','LEGUIA','ESTEFANIA','','Ya Voto',1,'F','Estudiante','123456'),('174',6,'1','DEL VALLE','MUÑOZ','ANDRES','MAURICIO','Inactivo',1,'M','Estudiante','123456'),('175',9,'1','DONADO','TORRES','JOSE','EDUARDO','Ya Voto',1,'M','Estudiante','123456'),('177',10,'1','NOVOA','MONTES','MARIA','VALENTINA','Ya Voto',1,'F','Estudiante','123456'),('179',3,'1','ANGULO','TORRES','SANTIAGO','JOSE','Ya Voto',1,'M','Estudiante','123456'),('180',4,'1','TORRES','BERRIO','LUCIANA','VALENTINA','Ya Voto',1,'F','Estudiante','123456'),('182',9,'1','THERAN','PINEDA','LUIS','ARMANDO','Ya Voto',1,'M','Estudiante','123456'),('183',8,'1','DONADO','TORRES','SAMUEL','JOSE','Ya Voto',1,'M','Estudiante','123456'),('185',1,'1','VASQUEZ','BATISTA','IKER','ADRIAN','Inactivo',1,'M','Estudiante','123456'),('188',6,'1','PEÑA','HERNANDEZ','EMILIA','','Ya Voto',1,'F','Estudiante','123456'),('190',1,'1','VASQUEZ','MORRON','MARIAM','JOSE','Ya Voto',1,'F','Estudiante','123456'),('191',9,'1','BARRAZA','RODRIGUEZ','JUAN','MANUEL','Ya Voto',1,'M','Estudiante','123456'),('192',1,'1','IBAÑEZ','DIAZ','VALERY','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('193',5,'1','PORTO','MERIÑO','JAVIER','SAUL','Ya Voto',1,'M','Estudiante','123456'),('195',1,'1','BENITEZ','VASQUEZ','ISABELLA','','Ya Voto',1,'F','Estudiante','123456'),('196',8,'1','SUAREZ','GOMEZ','LAURA','MARGARITA','Ya Voto',1,'F','Estudiante','123456'),('197',1,'1','VEGA','TORRES','SAMUEL','DAVID','Ya Voto',1,'M','Estudiante','123456'),('198',7,'1','CORDERO','HERRERA','MARIA','MERCEDES','Ya Voto',1,'F','Estudiante','123456'),('200',1,'1','HERNANDEZ','PEREZ','MARIANA','','Ya Voto',1,'F','Estudiante','123456'),('202',6,'1','RAMIREZ','ACOSTA','SERGIO','LUIS','Ya Voto',1,'M','Estudiante','123456'),('204',1,'1','ROJANO','TAPIA','LUCIANA','','Ya Voto',1,'F','Estudiante','123456'),('206',6,'1','JARAMILLO','CASTRO','SEBASTIAN','FELIPE','Ya Voto',1,'M','Estudiante','123456'),('207',3,'1','PEREZ','ROMERO','SEBASTIAN','DE JESUS','Ya Voto',1,'M','Estudiante','123456'),('209',5,'1','NUÑEZ','EUSSE','PABLO','','Ya Voto',1,'M','Estudiante','123456'),('210',6,'1','GARCIA','RAMOS','ISABELLA','JOSE','Ya Voto',1,'F','Estudiante','123456'),('212',9,'1','MUÑOZ','PEREZ','CARLOS','MAURICIO','Ya Voto',1,'M','Estudiante','123456'),('213',7,'1','BARRAZA','ROCHA','NIKOLE','','Ya Voto',1,'F','Estudiante','123456'),('214',2,'1','GOMEZ','RODRIGUEZ','JORGE','ENRIQUE','Ya Voto',1,'M','Estudiante','123456'),('216',5,'1','IZQUIERDO','OVIEDO','CARLOS','ALBERTO','Ya Voto',1,'M','Estudiante','123456'),('217',7,'1','SANTIS','VITOLA','DANNA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('218',5,'1','BOBADILLA','PEÑATE','VALERI','NICOLLE','Ya Voto',1,'F','Estudiante','123456'),('219',-2,'1','HERRERA','PAREDES','JUAN','PABLO','Inactivo',1,'M','Estudiante','123456'),('220',3,'1','NAVARRO','MARTELO','ISABELLA','VALENTINA','Ya Voto',1,'F','Estudiante','123456'),('221',2,'1','CHAMORRO','FERNANDEZ','ISAAC','DAVID','Ya Voto',1,'M','Estudiante','123456'),('222',1,'1','VASQUEZ','MORRON','MARIE','JOSE','Ya Voto',1,'F','Estudiante','123456'),('223',4,'1','PINTO','VELANDIA','MARIAPAZ','','Ya Voto',1,'F','Estudiante','123456'),('226',8,'1','HERRERA','PEREA','JUAN','GUILLERMO','Ya Voto',1,'M','Estudiante','123456'),('227',5,'1','SIERRA','FLOREZ','VALERIA','CRISTINA','Ya Voto',1,'F','Estudiante','123456'),('229',11,'1','DUARTE','MEDINA','BLADIMIR','JOSÉ','Ya Voto',1,'M','Estudiante','123456'),('230',11,'1','VASQUEZ','GONZALEZ','ZHARICK','ALEJANDRA','Ya Voto',1,'F','Estudiante','123456'),('231',4,'1','JIMENEZ','LEGUIA','JUAN','JOSE','Ya Voto',1,'M','Estudiante','123456'),('233',10,'1','NOBMAN','BELTRAN','OLGA','LUCIA','Ya Voto',1,'F','Estudiante','123456'),('234',0,'1','MARTELO','TORRES','GABRIEL','ALEJANDRO','Ya Voto',1,'M','Estudiante','123456'),('237',2,'1','GUTIERREZ','RODRIGUEZ','ELIAS','SAMUEL','Ya Voto',1,'M','Estudiante','123456'),('239',8,'1','TAPIA','MONTES','IVAN','RAMIRO','Ya Voto',1,'M','Estudiante','123456'),('240',6,'1','MONTERO','NOVOA','ISABEL','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('241',5,'1','GOMEZ','CONTRERAS','THOMAS','ANDRES','Ya Voto',1,'M','Estudiante','123456'),('242',6,'1','RICO','ROJANO','ALEJANDRO','JAVIER','Ya Voto',1,'M','Estudiante','123456'),('243',-1,'1','RUA','CARDENAS','MANUELA','','Ya Voto',1,'F','Estudiante','123456'),('245',0,'1','BUSTAMANTE','ROJANO','MARIA','GABRIELA','Ya Voto',1,'F','Estudiante','123456'),('246',6,'1','DIAZ','OROZCO','ANDRES','FELIPE','Ya Voto',1,'M','Estudiante','123456'),('247',8,'1','RAMIREZ','FERNANDEZ','LAURA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('248',2,'1','SUAREZ','TAPIA','MATIAS','ANDRES','Ya Voto',1,'M','Estudiante','123456'),('249',-1,'1','BARRAZA','DIAZ','JUAN','SEBASTIAN','Ya Voto',1,'M','Estudiante','123456'),('250',7,'1','MEZA','JABBA','ABRAHAM','ISAAC','Ya Voto',1,'M','Estudiante','123456'),('253',7,'1','NOVOA','CARDENAS','DANIELA','','Inactivo',1,'F','Estudiante','123456'),('255',10,'1','PEREZ','BOBADILLA','ISABELA','MARIA','Ya Voto',1,'F','Estudiante','123456'),('257',10,'1','BARRIOS','TOBIAS','MARÍA','JOSE','Ya Voto',1,'F','Estudiante','123456'),('258',7,'1','MENDOZA','RODELO','AVRIL','','Ya Voto',1,'F','Estudiante','123456'),('260',9,'1','BAYUELO','MUÑOZ','GABRIELA','','Ya Voto',1,'F','Estudiante','123456'),('262',8,'1','ARROYO','LEYVA','MARIA','JOSE','Ya Voto',1,'F','Estudiante','123456'),('263',10,'1','SOSA','VERGARA','SEBASTIAN','EDUARDO','Ya Voto',1,'M','Estudiante','123456'),('264',3,'1','PEÑALOZA','ROSSI','JUAN','DIEGO','Ya Voto',1,'M','Estudiante','123456'),('265',5,'1','VILLAVECES','PALACIO','GABRIELA','','Ya Voto',1,'F','Estudiante','123456'),('266',1,'1','RONCALLO','BLANQUICET','PAULINA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('268',9,'1','MEZA','MUÑOZ','ALFREDO','JOSE','Ya Voto',1,'M','Estudiante','123456'),('269',7,'1','ORTIZ','TAPIA','SOFIA','FERNANDA','Ya Voto',1,'F','Estudiante','123456'),('270',6,'1','PEREZ','LOPEZ','CAMILA','ANDREA','Ya Voto',1,'F','Estudiante','123456'),('271',8,'1','YEPES','TORRES','VALERIA','','Ya Voto',1,'F','Estudiante','123456'),('273',6,'1','MARCHENA','PUELLO','DANIEL','ALEJANDRO','Ya Voto',1,'M','Estudiante','123456'),('275',10,'1','LONDOÑO','SERMEÑO','JOZEF','ISAAC','Ya Voto',1,'M','Estudiante','123456'),('277',10,'1','OLEA','CASTRO','FAIRUZ','SALETH','Ya Voto',1,'F','Estudiante','123456'),('278',8,'1','ROMERO','MARTINEZ','CARLOS','IVAN','Ya Voto',1,'M','Estudiante','123456'),('279',3,'1','GUZMAN','SALCEDO','DANIELA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('280',6,'1','BENAVIDES','HERRERA','MARIANA','','Ya Voto',1,'F','Estudiante','123456'),('281',8,'1','CARDENAS','BARRANCO','JUAN','SEBASTIAN','Ya Voto',1,'M','Estudiante','123456'),('282',2,'1','GALVAN','TAPIA','ISABELLA','','Ya Voto',1,'F','Estudiante','123456'),('284',11,'1','TORRES','NADAFF','LIBARDO','JOSE','Ya Voto',1,'M','Estudiante','123456'),('286',11,'1','PONNEFZ','PARDO','VALERIE','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('287',10,'1','PIMIENTA','ORTEGA','MARIANA','','Ya Voto',1,'F','Estudiante','123456'),('288',11,'1','PALIS','HERNANDEZ','ZAKILLE','','Ya Voto',1,'F','Estudiante','123456'),('289',11,'1','ATENCIA','GUEVARA','ANA','LUCÍA','Ya Voto',1,'F','Estudiante','123456'),('290',6,'1','USTARIS','SANTOS','JULIO','ENRIQUE','Ya Voto',1,'M','Estudiante','123456'),('291',2,'1','CARDOZO','BAYUELO','MARIANGEL','','Ya Voto',1,'F','Estudiante','123456'),('292',8,'1','BENITEZ','CASTILLO','NATALIA','MARCELA','Ya Voto',1,'F','Estudiante','123456'),('294',5,'1','LEGUIA','TAPIA','ZAHARASOFIA','','Ya Voto',1,'F','Estudiante','123456'),('295',0,'1','FONSECA','BUELVAS','ENMANUEL','','Ya Voto',1,'M','Estudiante','123456'),('296',0,'1','MUÑOZ','DE LA ROSA','ISABELLA','','Inactivo',1,'F','Estudiante','123456'),('297',1,'1','PINTO','VELANDIA','LUCIANA','','Ya Voto',1,'F','Estudiante','123456'),('302',1,'1','MEDINA','TAPIA','SALOME','','Ya Voto',1,'F','Estudiante','123456'),('304',7,'1','PALIS','HERNANDEZ','RAFIK','ELIAS','Ya Voto',1,'M','Estudiante','123456'),('305',1,'1','BENITEZ','VASQUEZ','ANTONELLA','','Ya Voto',1,'F','Estudiante','123456'),('308',11,'1','OBREDOR','PELUFFO','MARIANA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('309',4,'1','MORA','MOLINARES','MARIA','PAULA','Ya Voto',1,'F','Estudiante','123456'),('310',2,'1','AMAYA','MONTES','MARTINA','','Ya Voto',1,'F','Estudiante','123456'),('311',8,'1','BARRIOS','ANDRADE','MARIA','VICTORIA','Ya Voto',1,'F','Estudiante','123456'),('313',7,'1','MARQUEZ','SANCHEZ','GUIDO','JOSE','Ya Voto',1,'M','Estudiante','123456'),('314',8,'1','BENITEZ','VASQUEZ','KEILA','VALENTINA','Ya Voto',1,'F','Estudiante','123456'),('315',5,'1','CARRILLO','REYES','SAMUEL','DAVID','Ya Voto',1,'M','Estudiante','123456'),('318',2,'1','BLANCO','TEHERAN','JULIANA','','Ya Voto',1,'F','Estudiante','123456'),('319',7,'1','HERNANDEZ','PATIÑO','DANIEL','FELIPE','Inactivo',1,'M','Estudiante','123456'),('320',6,'1','RODRIGUEZ','ESCALANTE','JOSE','LUIS','Ya Voto',1,'M','Estudiante','123456'),('321',5,'1','JACOME','GONZALEZ','SANTIAGO','','Ya Voto',1,'M','Estudiante','123456'),('323',-1,'1','RAMOS','MARTELO','KAROLINA','','Inactivo',1,'F','Estudiante','123456'),('324',6,'1','BARRIOS','QUESADA','EMELY','','Ya Voto',1,'F','Estudiante','123456'),('327',5,'1','OTERO','DIAZ','VALERY','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('329',7,'1','DUARTE','MEDINA','FRANCISCO','ALEJANDRO','Ya Voto',1,'M','Estudiante','123456'),('332',6,'1','BARRETO','TORRES','MARIA','JOSE','Ya Voto',1,'F','Estudiante','123456'),('333',1,'1','NARVAEZ','VERGARA','LUIS','DANIEL','Ya Voto',1,'M','Estudiante','123456'),('336',4,'1','GONZALEZ','LOPEZ','MATIAS','','Ya Voto',1,'M','Estudiante','123456'),('337',-1,'1','NADAFF','BERRIO','KHALIQ','ELIAS','Ya Voto',1,'M','Estudiante','123456'),('338',2,'1','FONTALVO','YOLI','SALOME','','Ya Voto',1,'F','Estudiante','123456'),('345',9,'1','TAMARA','MOLINARES','MARIA','JOSE','Ya Voto',1,'F','Estudiante','123456'),('346',3,'1','FONSECA','BUELVAS','SHARICK','MARIA','Ya Voto',1,'F','Estudiante','123456'),('349',7,'1','MIRANDA','ARAGON','ANA','EMILIA','Inactivo',1,'F','Estudiante','123456'),('350',-1,'1','LEGUIA','ANDRADE','LUCIANA','VALENTINA','Ya Voto',1,'F','Estudiante','123456'),('351',2,'1','CAAMAÑO','BARRETO','VALERIA','','Ya Voto',1,'F','Estudiante','123456'),('352',7,'1','HERNANDEZ','TRUCCO','ALEJANDRO','','Ya Voto',1,'M','Estudiante','123456'),('354',10,'1','MONTES','YEPES','JUAN','PABLO','Ya Voto',1,'M','Estudiante','123456'),('357',5,'1','VILLARRUEL','OROZCO','SOPHIA','','Ya Voto',1,'F','Estudiante','123456'),('363',9,'1','NAVARRO','MARTELO','ANDREA','VALENTINA','Ya Voto',1,'F','Estudiante','123456'),('368',5,'1','SUAREZ','ROMERO','VALENTINA','','Ya Voto',1,'F','Estudiante','123456'),('369',4,'1','TERAN','BALLESTEROS','ALEJANDRO','DAVID','Ya Voto',1,'M','Estudiante','123456'),('370',8,'1','LONDOÑO','SERMEÑO','MISHELL','ROSA','Ya Voto',1,'F','Estudiante','123456'),('371',11,'1','DURAN','SANDOVAL','JOSE',' CARLOS','Ya Voto',1,'M','Estudiante','123456'),('383',-2,'1','ALVAREZ','MEDINA','KEISY','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('386',7,'1','BOBADILLA','LOAIZA','GABRIELA','','Ya Voto',1,'F','Estudiante','123456'),('393',9,'1','ALMEIDA','MARRUGO','JUAN','FELIPE','Ya Voto',1,'M','Estudiante','123456'),('394',6,'1','VARGAS','CHAMORRO','SANTIAGO','ELIAS','Ya Voto',1,'M','Estudiante','123456'),('395',8,'1','SANCHEZ','TAPIAS','KEIDER','JAVID','Ya Voto',1,'M','Estudiante','123456'),('396',2,'1','VILLARREAL','HERNANDEZ','JOSE','CARLO','Ya Voto',1,'M','Estudiante','123456'),('400',1,'1','STEVENSON','VANEGAS','ADRIANA','LUCIA','Ya Voto',1,'F','Estudiante','123456'),('402',8,'1','BUELVAS','CARRERA','MIGUEL','ANGEL','Ya Voto',1,'M','Estudiante','123456'),('404',5,'1','CRUZ','MERIÑO','JUAN','JOSE','Ya Voto',1,'M','Estudiante','123456'),('405',9,'1','LUNA','JIMENEZ','MARIA','VALENTINA','Ya Voto',1,'F','Estudiante','123456'),('406',1,'1','GARCIA','RAMOS','VICENTE','JOSE','Ya Voto',1,'M','Estudiante','123456'),('410',1,'1','TORRES','BENITEZ','VALERY','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('411',10,'1','MEZA','MUÑOZ','ANDRES','CAMILO','Ya Voto',1,'M','Estudiante','123456'),('413',8,'1','TORRES','ORTIZ','MARIA','PAULA','Ya Voto',1,'F','Estudiante','123456'),('419',5,'1','LAMADRID','VILLAREAL','JUAN','DAVID','Ya Voto',1,'M','Estudiante','123456'),('421',3,'1','BARRAZA','ZAPATA','JULIAN','','Ya Voto',1,'M','Estudiante','123456'),('423',3,'1','HERNANDEZ','ARROYO','VALERIA','','Ya Voto',1,'F','Estudiante','123456'),('425',7,'1','VASQUEZ','MEJIA','ABRAHAN','ELIAS','Ya Voto',1,'M','Estudiante','123456'),('427',0,'1','MONTES','MARTINEZ','DANNA','LUCIA','Ya Voto',1,'F','Estudiante','123456'),('429',1,'1','BARRIOS','QUESADA','STANLEY','DE JESUS','Ya Voto',1,'M','Estudiante','123456'),('437',2,'1','SANABRIA','GARRIDO','SAMUEL','ALEJANDRO','Ya Voto',1,'M','Estudiante','123456'),('441',0,'1','ARTEAGA','MANRIQUE','ANTONELLA','','Ya Voto',1,'F','Estudiante','123456'),('443',9,'1','TORRES','NADAFF','ALEJANDRO','','Ya Voto',1,'M','Estudiante','123456'),('444',9,'1','PORTO','MERIÑO','LAURA','SOFIA','Ya Voto',1,'F','Estudiante','123456'),('voto_b2021',11,'1','EN BLANCO','','VOTO','','Inactivo',1,'','Estudiante','Votación Cerrada');

/*Table structure for table `institucion` */

DROP TABLE IF EXISTS `institucion`;

CREATE TABLE `institucion` (
  `idInstitucion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idInstitucion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `institucion` */

insert  into `institucion`(`idInstitucion`,`Nombre`) values (1,'COLEGIO SAN RAFAEL');

/*Table structure for table `registrovotos` */

DROP TABLE IF EXISTS `registrovotos`;

CREATE TABLE `registrovotos` (
  `idEstudiante` varchar(30) COLLATE utf8_bin NOT NULL,
  `Numero` int(11) unsigned NOT NULL,
  `Anio` char(5) COLLATE utf8_bin NOT NULL DEFAULT '2022',
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idEstudiante`,`Anio`),
  KEY `Numero` (`Numero`),
  CONSTRAINT `registrovotos_ibfk_1` FOREIGN KEY (`Numero`) REFERENCES `candidatos` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `registrovotos` */

insert  into `registrovotos`(`idEstudiante`,`Numero`,`Anio`,`fecha_reg`) values ('001',2,'2022','2022-03-10 08:34:29'),('003',3,'2022','2022-03-10 08:45:22'),('009',3,'2022','2022-03-10 08:42:57'),('010',3,'2022','2022-03-10 09:07:47'),('011',2,'2022','2022-03-10 08:48:21'),('013',3,'2022','2022-03-10 08:39:59'),('016',3,'2022','2022-03-10 09:05:42'),('017',3,'2022','2022-03-10 08:47:39'),('018',3,'2022','2022-03-10 09:05:52'),('019',3,'2022','2022-03-10 08:53:35'),('02',3,'2022','2022-03-10 09:09:32'),('021',3,'2022','2022-03-10 08:47:11'),('022',3,'2022','2022-03-10 08:46:45'),('023',3,'2022','2022-03-10 08:51:43'),('024',2,'2022','2022-03-10 08:49:23'),('025',2,'2022','2022-03-10 08:43:42'),('026',2,'2022','2022-03-10 09:03:36'),('027',2,'2022','2022-03-10 08:39:12'),('028',3,'2022','2022-03-10 08:53:36'),('029',3,'2022','2022-03-10 09:01:55'),('030',3,'2022','2022-03-10 08:47:30'),('031',3,'2022','2022-03-10 09:15:49'),('032',2,'2022','2022-03-10 08:36:37'),('033',2,'2022','2022-03-10 08:57:52'),('034',2,'2022','2022-03-10 08:36:17'),('035',2,'2022','2022-03-10 09:07:09'),('036',3,'2022','2022-03-10 08:44:41'),('037',3,'2022','2022-03-10 09:05:19'),('038',2,'2022','2022-03-10 09:00:05'),('039',3,'2022','2022-03-10 08:44:38'),('04',2,'2022','2022-03-10 08:54:47'),('040',3,'2022','2022-03-10 08:56:57'),('041',2,'2022','2022-03-10 08:40:06'),('042',2,'2022','2022-03-10 08:40:48'),('045',3,'2022','2022-03-10 09:03:39'),('046',2,'2022','2022-03-10 08:50:25'),('047',2,'2022','2022-03-10 08:38:51'),('048',3,'2022','2022-03-10 08:48:51'),('049',3,'2022','2022-03-10 08:34:46'),('051',0,'2022','2022-03-10 09:01:33'),('052',2,'2022','2022-03-10 08:49:51'),('054',3,'2022','2022-03-10 09:13:14'),('055',3,'2022','2022-03-10 08:58:44'),('056',2,'2022','2022-03-10 08:35:59'),('057',1,'2022','2022-03-10 08:38:18'),('058',2,'2022','2022-03-10 08:55:12'),('059',3,'2022','2022-03-10 09:00:19'),('060',3,'2022','2022-03-10 09:17:39'),('062',1,'2022','2022-03-10 09:00:40'),('063',3,'2022','2022-03-10 08:39:58'),('065',3,'2022','2022-03-10 08:45:04'),('069',3,'2022','2022-03-10 08:46:47'),('070',0,'2022','2022-03-10 08:47:24'),('071',3,'2022','2022-03-10 09:06:02'),('072',3,'2022','2022-03-10 08:42:32'),('073',2,'2022','2022-03-10 08:45:23'),('074',3,'2022','2022-03-10 09:07:26'),('075',3,'2022','2022-03-10 08:42:53'),('076',1,'2022','2022-03-10 09:11:22'),('077',3,'2022','2022-03-10 09:06:10'),('079',0,'2022','2022-03-10 08:52:14'),('080',2,'2022','2022-03-10 08:53:14'),('082',3,'2022','2022-03-10 09:17:00'),('084',1,'2022','2022-03-10 08:43:23'),('085',3,'2022','2022-03-10 08:55:10'),('086',3,'2022','2022-03-10 09:18:01'),('090',3,'2022','2022-03-10 09:16:32'),('091',2,'2022','2022-03-10 08:33:58'),('093',3,'2022','2022-03-10 08:49:18'),('095',3,'2022','2022-03-10 08:40:32'),('096',3,'2022','2022-03-10 08:46:07'),('097',3,'2022','2022-03-10 08:46:17'),('098',0,'2022','2022-03-10 08:46:09'),('099',3,'2022','2022-03-10 08:54:28'),('100',2,'2022','2022-03-10 08:34:25'),('101',3,'2022','2022-03-10 08:43:52'),('102',3,'2022','2022-03-10 08:57:04'),('103',3,'2022','2022-03-10 09:04:05'),('106',3,'2022','2022-03-10 08:41:42'),('108',3,'2022','2022-03-10 09:06:34'),('109',3,'2022','2022-03-10 08:45:43'),('110',3,'2022','2022-03-10 09:01:59'),('111',3,'2022','2022-03-10 08:55:54'),('112',3,'2022','2022-03-10 08:52:31'),('114',1,'2022','2022-03-10 08:40:30'),('115',2,'2022','2022-03-10 08:54:22'),('116',2,'2022','2022-03-10 08:51:26'),('117',3,'2022','2022-03-10 09:18:51'),('118',3,'2022','2022-03-10 08:39:49'),('121',3,'2022','2022-03-10 08:59:30'),('124',3,'2022','2022-03-10 09:02:18'),('127',3,'2022','2022-03-10 08:49:33'),('129',2,'2022','2022-03-10 08:37:47'),('130',3,'2022','2022-03-10 09:00:33'),('132',3,'2022','2022-03-10 08:57:07'),('133',0,'2022','2022-03-10 09:22:02'),('135',1,'2022','2022-03-10 09:07:51'),('137',2,'2022','2022-03-10 08:56:36'),('138',3,'2022','2022-03-10 08:44:37'),('139',2,'2022','2022-03-10 08:43:21'),('141',2,'2022','2022-03-10 08:36:05'),('142',3,'2022','2022-03-10 09:11:52'),('144',2,'2022','2022-03-10 08:54:08'),('146',2,'2022','2022-03-10 08:49:31'),('147',2,'2022','2022-03-10 08:48:03'),('149',3,'2022','2022-03-10 08:50:05'),('151',3,'2022','2022-03-10 08:44:15'),('152',2,'2022','2022-03-10 09:04:50'),('156',3,'2022','2022-03-10 08:47:12'),('157',3,'2022','2022-03-10 08:50:12'),('160',3,'2022','2022-03-10 08:45:38'),('161',3,'2022','2022-03-10 09:12:32'),('162',3,'2022','2022-03-10 09:06:56'),('163',3,'2022','2022-03-10 09:14:25'),('165',2,'2022','2022-03-10 09:03:55'),('168',2,'2022','2022-03-10 09:18:28'),('169',2,'2022','2022-03-10 08:39:47'),('170',2,'2022','2022-03-10 08:32:41'),('171',2,'2022','2022-03-10 08:54:55'),('172',2,'2022','2022-03-10 09:08:12'),('173',3,'2022','2022-03-10 08:42:54'),('175',3,'2022','2022-03-10 08:53:13'),('177',2,'2022','2022-03-10 08:52:33'),('179',3,'2022','2022-03-10 09:06:48'),('180',2,'2022','2022-03-10 08:35:41'),('182',3,'2022','2022-03-10 08:59:59'),('183',2,'2022','2022-03-10 08:42:23'),('188',3,'2022','2022-03-10 08:56:08'),('190',3,'2022','2022-03-10 08:59:02'),('191',2,'2022','2022-03-10 08:52:03'),('192',2,'2022','2022-03-10 08:56:08'),('193',3,'2022','2022-03-10 08:42:02'),('195',3,'2022','2022-03-10 08:56:55'),('196',3,'2022','2022-03-10 09:02:02'),('197',2,'2022','2022-03-10 08:58:13'),('198',3,'2022','2022-03-10 08:44:56'),('200',3,'2022','2022-03-10 08:50:36'),('202',3,'2022','2022-03-10 08:52:42'),('204',3,'2022','2022-03-10 08:52:55'),('206',3,'2022','2022-03-10 08:50:29'),('207',3,'2022','2022-03-10 09:08:38'),('209',2,'2022','2022-03-10 08:43:40'),('210',2,'2022','2022-03-10 08:53:00'),('212',3,'2022','2022-03-10 08:59:11'),('213',2,'2022','2022-03-10 08:40:33'),('214',3,'2022','2022-03-10 09:19:17'),('216',2,'2022','2022-03-10 08:48:46'),('217',3,'2022','2022-03-10 08:43:18'),('218',1,'2022','2022-03-10 08:44:35'),('220',3,'2022','2022-03-10 09:03:08'),('221',3,'2022','2022-03-10 09:12:50'),('222',3,'2022','2022-03-10 08:57:52'),('223',2,'2022','2022-03-10 08:40:26'),('226',3,'2022','2022-03-10 08:43:47'),('227',2,'2022','2022-03-10 08:41:37'),('229',3,'2022','2022-03-10 09:03:37'),('230',3,'2022','2022-03-10 08:36:57'),('231',2,'2022','2022-03-10 08:36:56'),('233',2,'2022','2022-03-10 08:52:06'),('234',3,'2022','2022-03-10 09:07:26'),('237',3,'2022','2022-03-10 09:20:28'),('239',2,'2022','2022-03-10 08:48:35'),('240',2,'2022','2022-03-10 08:57:44'),('241',2,'2022','2022-03-10 08:46:50'),('242',3,'2022','2022-03-10 08:49:59'),('243',3,'2022','2022-03-10 08:48:07'),('245',2,'2022','2022-03-10 09:01:25'),('246',3,'2022','2022-03-10 08:50:50'),('247',2,'2022','2022-03-10 08:46:35'),('248',3,'2022','2022-03-10 09:19:42'),('249',3,'2022','2022-03-10 08:45:08'),('250',3,'2022','2022-03-10 08:48:21'),('255',2,'2022','2022-03-10 08:43:05'),('257',3,'2022','2022-03-10 08:51:30'),('258',3,'2022','2022-03-10 08:43:34'),('260',3,'2022','2022-03-10 08:56:39'),('262',3,'2022','2022-03-10 08:40:45'),('263',2,'2022','2022-03-10 08:48:38'),('264',3,'2022','2022-03-10 09:06:28'),('265',2,'2022','2022-03-10 08:52:48'),('266',2,'2022','2022-03-10 08:51:05'),('268',3,'2022','2022-03-10 08:54:06'),('269',2,'2022','2022-03-10 08:46:47'),('270',2,'2022','2022-03-10 08:53:45'),('271',3,'2022','2022-03-10 08:50:41'),('273',3,'2022','2022-03-10 08:58:08'),('275',2,'2022','2022-03-10 08:44:20'),('277',3,'2022','2022-03-10 08:50:59'),('278',3,'2022','2022-03-10 08:47:00'),('279',3,'2022','2022-03-10 09:01:10'),('280',3,'2022','2022-03-10 08:51:53'),('281',3,'2022','2022-03-10 08:41:51'),('282',3,'2022','2022-03-10 09:15:31'),('284',3,'2022','2022-03-10 09:02:45'),('286',2,'2022','2022-03-10 08:42:30'),('287',2,'2022','2022-03-10 08:39:27'),('288',2,'2022','2022-03-10 08:41:54'),('289',2,'2022','2022-03-10 08:55:15'),('290',3,'2022','2022-03-10 08:51:07'),('291',2,'2022','2022-03-10 09:10:27'),('292',3,'2022','2022-03-10 08:45:30'),('294',3,'2022','2022-03-10 08:42:31'),('295',3,'2022','2022-03-10 09:05:27'),('297',3,'2022','2022-03-10 08:51:32'),('302',3,'2022','2022-03-10 08:51:55'),('304',2,'2022','2022-03-10 08:48:05'),('305',2,'2022','2022-03-10 08:56:34'),('308',3,'2022','2022-03-10 08:37:30'),('309',3,'2022','2022-03-10 08:33:11'),('310',3,'2022','2022-03-10 09:14:48'),('311',2,'2022','2022-03-10 08:47:43'),('313',3,'2022','2022-03-10 08:45:23'),('314',3,'2022','2022-03-10 08:51:18'),('315',3,'2022','2022-03-10 08:52:27'),('318',3,'2022','2022-03-10 09:13:35'),('320',3,'2022','2022-03-10 08:56:34'),('321',3,'2022','2022-03-10 08:45:43'),('324',3,'2022','2022-03-10 08:54:02'),('327',2,'2022','2022-03-10 08:52:07'),('329',3,'2022','2022-03-10 08:49:10'),('332',3,'2022','2022-03-10 08:57:17'),('333',3,'2022','2022-03-10 08:57:12'),('336',2,'2022','2022-03-10 08:38:07'),('337',3,'2022','2022-03-10 08:46:07'),('338',3,'2022','2022-03-10 09:12:10'),('345',3,'2022','2022-03-10 08:58:21'),('346',3,'2022','2022-03-10 09:02:39'),('350',3,'2022','2022-03-10 08:44:05'),('351',3,'2022','2022-03-10 09:13:57'),('352',2,'2022','2022-03-10 08:47:42'),('354',3,'2022','2022-03-10 08:44:47'),('357',3,'2022','2022-03-10 08:45:00'),('363',3,'2022','2022-03-10 09:01:07'),('368',2,'2022','2022-03-10 08:47:58'),('369',2,'2022','2022-03-10 08:30:45'),('370',3,'2022','2022-03-10 08:44:17'),('371',1,'2022','2022-03-10 08:41:15'),('383',3,'2022','2022-03-10 08:42:20'),('386',3,'2022','2022-03-10 08:42:14'),('393',3,'2022','2022-03-10 08:57:29'),('394',3,'2022','2022-03-10 09:20:52'),('395',2,'2022','2022-03-10 08:48:06'),('396',2,'2022','2022-03-10 09:09:28'),('400',3,'2022','2022-03-10 08:55:14'),('402',3,'2022','2022-03-10 08:41:16'),('404',3,'2022','2022-03-10 08:46:18'),('405',2,'2022','2022-03-10 08:52:30'),('406',3,'2022','2022-03-10 08:58:38'),('410',3,'2022','2022-03-10 08:55:38'),('411',3,'2022','2022-03-10 08:47:29'),('413',2,'2022','2022-03-10 08:49:05'),('419',2,'2022','2022-03-10 08:44:07'),('421',3,'2022','2022-03-10 09:04:14'),('423',3,'2022','2022-03-10 09:08:53'),('425',3,'2022','2022-03-10 08:46:28'),('427',2,'2022','2022-03-10 09:04:40'),('429',3,'2022','2022-03-10 08:57:30'),('437',3,'2022','2022-03-10 09:09:49'),('441',2,'2022','2022-03-10 09:00:53'),('443',3,'2022','2022-03-10 08:54:49'),('444',3,'2022','2022-03-10 08:55:29');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idUsuario` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` char(150) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` char(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ROL` char(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ESTADO` char(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Institucion_idInstitucion` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_usuarios_Institucion1_idx` (`Institucion_idInstitucion`),
  CONSTRAINT `usu` FOREIGN KEY (`Institucion_idInstitucion`) REFERENCES `institucion` (`idInstitucion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idUsuario`,`contrasena`,`NOMBRE`,`ROL`,`ESTADO`,`Institucion_idInstitucion`) values ('Jose','73429935','Jose Alfredo Tapia Arroyo','Administrador','Activo',1),('Jurado','j123','JURADO','Jurado','Activo',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;