DROP TABLE IF EXISTS `CustomerTest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CustomerTest` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `points` varchar(30) not null,
  `telephone` varchar(30) not null,
  `Email` varchar(150) DEFAULT NULL,
  
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `CustomerTest` VALUES (1,'Mario','Vickers',10,123,'mario@example.com');
INSERT INTO `CustomerTest` VALUES (2,'Andrea','Plante',1,123,'andrea.plante@example.com');
INSERT INTO `CustomerTest` VALUES (3,'Kevin','Brown',0,123,NULL);
INSERT INTO `CustomerTest` VALUES (4,'Tony','Volcy',9,123,'tvolcy@example.com');
INSERT INTO `CustomerTest` VALUES (5,'Bradley','Toms',4,123,'tomsb@example.com');
INSERT INTO `CustomerTest` VALUES (6,'Kenneth','Barber',2,123,'k.barber@example.com');
INSERT INTO `CustomerTest` VALUES (7,'Vince','Sauve',9,123,'vincesauve@example.com');
INSERT INTO `CustomerTest` VALUES (8,'Otto','Flamand',3,123,'otto.flamand1@example.com');
INSERT INTO `CustomerTest` VALUES (9,'Ford','Doran',0,123,NULL);
INSERT INTO `CustomerTest` VALUES (10,'Joan','Mccloskey',0,123,'123@example.com');
INSERT INTO `CustomerTest` VALUES (11,'Aime','Yasinsky',0,123,'aime_y@example.com');
INSERT INTO `CustomerTest` VALUES (12,'Joseph','Leamon',9001,123,'joseph3@example.com');
INSERT INTO `CustomerTest` VALUES (13,'Luis','Tackaberry',1,123,'luist@example.com');
INSERT INTO `CustomerTest` VALUES (14,'Doug','Stolk',11,123,'doug.stolk@example.com');
INSERT INTO `CustomerTest` VALUES (15,'Patricia','Downey',0,123,'PATRICIA@example.com');
INSERT INTO `CustomerTest` VALUES (16,'Wendy','Anglehart',0,123,'anglehart@example.com');
INSERT INTO `CustomerTest` VALUES (17,'Francis','Hogue',0,123,'fh@example.com');
