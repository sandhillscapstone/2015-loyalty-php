DROP TABLE IF EXISTS `Employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employee` (
  `EmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `telephone` varchar(30) not null,
  `Email` varchar(150) DEFAULT NULL,
  `login` varchar(30) not null,
  `password` varchar(64) not null,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `Employee` VALUES (1,'Mario','Vickers',123,'mario@example.com','user','pass');
INSERT INTO `Employee` VALUES (2,'Andrea','Plante',123,'andrea.plante@example.com','user','pass');
INSERT INTO `Employee` VALUES (3,'Kevin','Brown',123,NULL,'user','pass');
INSERT INTO `Employee` VALUES (4,'Tony','Volcy',123,'tvolcy@example.com','user','pass');
