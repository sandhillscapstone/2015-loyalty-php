DROP TABLE IF EXISTS `Customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customers` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Points` int(11) NOT NULL DEFAULT '0',
  `Email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `Customers` VALUES (1,'Mario','Vickers','9105550001',10,'mario@example.com');
INSERT INTO `Customers` VALUES (2,'Andrea','Plante','9105550002',1,'andrea.plante@example.com');
INSERT INTO `Customers` VALUES (3,'Kevin','Brown','9105550003',0,NULL);
INSERT INTO `Customers` VALUES (4,'Tony','Volcy','9105550004',9,'tvolcy@example.com');
INSERT INTO `Customers` VALUES (5,'Bradley','Toms','9105550005',4,'tomsb@example.com');
INSERT INTO `Customers` VALUES (6,'Kenneth','Barber','9105550006',2,'k.barber@example.com');
INSERT INTO `Customers` VALUES (7,'Vince','Sauve','9105550007',9,'vincesauve@example.com');
INSERT INTO `Customers` VALUES (8,'Otto','Flamand','9105550008',3,'otto.flamand1@example.com');
INSERT INTO `Customers` VALUES (9,'Ford','Doran','9105550009',0,NULL);
INSERT INTO `Customers` VALUES (10,'Joan','Mccloskey','9105550010',0,'123@example.com');
INSERT INTO `Customers` VALUES (11,'Aime','Yasinsky','9105550011',0,'aime_y@example.com');
INSERT INTO `Customers` VALUES (12,'Joseph','Leamon','9105550012',9001,'joseph3@example.com');
INSERT INTO `Customers` VALUES (13,'Luis','Tackaberry','9105550013',1,'luist@example.com');
INSERT INTO `Customers` VALUES (14,'Doug','Stolk','9105550014',11,'doug.stolk@example.com');
INSERT INTO `Customers` VALUES (15,'Patricia','Downey','9105550015',0,'PATRICIA@example.com');
INSERT INTO `Customers` VALUES (16,'Wendy','Anglehart','9105550016',0,'anglehart@example.com');
INSERT INTO `Customers` VALUES (17,'Francis','Hogue','9105550017',0,'fh@example.com');
