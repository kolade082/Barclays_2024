-- MariaDB dump 10.19  Distrib 10.5.19-MariaDB, for Linux (x86_64)
--
-- Host: mysql    Database: as1csy2028
-- ------------------------------------------------------
-- Server version	11.3.2-MariaDB-1:11.3.2+maria~ubu2204

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `as1csy2028`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `as1csy2028` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `as1csy2028`;

--
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auction` (
  `auction_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `auction_description` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`auction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auction`
--

LOCK TABLES `auction` WRITE;
/*!40000 ALTER TABLE `auction` DISABLE KEYS */;
INSERT INTO `auction` VALUES (1,'Vikings Helment',' Helment worn by vikings in the 1900\'s',3,'2022-11-21 00:00:00','5131569.jpg',1),(2,'Churchill\'s painting',' Painting by churchill, inspired by his daughter who died by drowning',1,'2022-12-19 00:00:00','churchill painting.jpg',3),(3,'Chevrolet  Vintage ',' Vintage Chevrolet Car  ',2,'2023-01-04 00:00:00','chevrolet vintage.jpg',3),(4,'Viking Sword',' Sword used by vikings in the 1900\'s',3,'2022-12-19 00:00:00','2665599.jpg',3),(5,'Viking Shield',' Shield used by scandevians in the 1900\'s',3,'2022-12-20 00:00:00','viking shield.webp',1),(6,'Vintage Bentley',' This is a bentley which was owned by a duke but lost due to gambling',2,'2022-12-20 00:00:00','vintage bentley.webp',9),(7,'Benz',' A vintage mercedes used in the early 2000\'s  ',2,'2022-11-28 00:00:00','vintage benz.jpg',9),(8,'Last Supper ',' A painting by leonardo Da Vinci on the last supper which was commissioned by the duke of milan',1,'2022-12-10 00:00:00','painting by da vinci.webp',9),(10,'Emotions','Painting by Ralph Steadman about the human emotions',1,'2022-11-20 00:00:00','painting by ralph.jpg',2),(16,'Dog and Priest',' A painting of a priest with his dog by Alex Colville',1,'2022-12-14 00:00:00','painting by alex colville.jpg',2);
/*!40000 ALTER TABLE `auction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bids` (
  `bid_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `amount_bidded` int(11) DEFAULT NULL,
  `auction_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (1,100,1,1),(2,350,2,1),(3,15000,3,1),(4,200,4,1),(5,100,5,1),(6,20000,6,9),(7,10000,7,9),(8,30000,8,9),(9,25000,2,9),(10,5000,9,2),(11,4500,10,2),(12,50,1,2),(13,150,1,2),(14,2500,13,2),(15,2500,14,2),(16,2500,16,2),(21,10001,7,1),(22,250,4,1),(23,500,4,1);
/*!40000 ALTER TABLE `bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Paintings'),(2,'Cars'),(3,'Vikings Stuffs');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lots`
--

DROP TABLE IF EXISTS `lots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lots` (
  `lot_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lot_description` varchar(255) DEFAULT NULL,
  `auction_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `lot_name` varchar(255) DEFAULT NULL,
  `estimated_price` int(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`lot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lots`
--

LOCK TABLES `lots` WRITE;
/*!40000 ALTER TABLE `lots` DISABLE KEYS */;
INSERT INTO `lots` VALUES (3,'testing',1,'Picture_1-removebg-preview.png','test',3000,12),(4,'rott',1,'Logo - Woodlands 2023.jpg','rat',500,12),(5,'This helmet was used by Bjorn the great during the invasion to England',19,'5131569 (1).jpg','Viking Helmet ',15000,1),(6,'Sword used by ragnar to kill his brother at the battle field',19,'2665599 (1).jpg','Viking Sword',10000,1),(7,'Shield stolen from westoros during war times',19,'viking shield (1).webp','Viking Shield',20000,2),(8,'King George\'s custom made Mercedes ',20,'vintage benz (1).jpg','Vintage Mercedes',150000,2),(9,'First Bentley car with four doors',20,'vintage bentley (1).webp','Vintage Bentley',250000,2),(10,'Da Vinci\'s dream painting',22,'painting by da vinci (1).webp','Da Vinci',20000,1),(11,'A painting by churchill after the death of his daughter',22,'churchill painting (1).jpg','Churchill’s Painting',30000,1),(12,'A panting titled \"emotions\" by ralph',22,'painting by ralph (1).jpg','Paiting By Ralph',5000,2),(13,'Car built for transformers moview',21,'2019-Camaro-ZL1-1LE-via-Top-Gear-Ph-e1600649541961.avif','Transformers Chevrolet',250000,12),(14,'The only pink tesla in the world',21,'d37dcfb7e4ad9dfe45ad9e2cf3cec2a2.jpg','Tesla',100000,12),(15,'Red hummer jeep',21,'GettyImages-88157856.jpg','Jeep',200000,12),(16,'Vintage chevrolet car given to the parliaments during the queens 50th',20,'chevrolet vintage (1).jpg','Vintage Chevrolet',155000,12),(22,'A sculpture of maria del from paris',27,'maria_del_fiore.jpeg','Maria Del ',50000,12);
/*!40000 ALTER TABLE `lots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `review_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comments` varchar(255) DEFAULT NULL,
  `auction_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review_date` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'It will be nice for my hallowen custome, i\'ll place a bid of £150 or more.',1,1,'2022-11-19 14:35:04'),(2,'Wow, I\'m definitely going for this\r\n',6,2,'2022-11-20 02:12:37'),(4,'Niceeeeee',7,1,'2022-11-20 20:07:18');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `usertype` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'kolade@ibuy.co.uk','$2y$10$K8YOudM1VD6wTDR0UYm4juPdcj/A2/5Ks6bbXzXU4AumRLPw5OlL2','Kolade','ADMIN'),(2,'pia@ibuy.co.uk','$2y$10$u/sfFBof6sXTO6iBYV2EhOmr9oPqP.VlQ0I89yG90H2wYzdIq61/O','Pia','ADMIN'),(3,'zel@ibuy.co.uk','$2y$10$T9VvbTuRQdoh/O1oGzchoOUwO6ZG/j2n8nBfJe6YoPOsd4JYIwDAe','Zel','USER'),(9,'kora@ibuy.co.uk','$2y$10$I1M23Cn6KPyVFRVQQi.ri.hx2E8jRzxegyBH2pc.UV7nE4rhfO1Ue','Kora','USER');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'as1csy2028'
--

--
-- Current Database: `access`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `access` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `access`;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `enquiry` varchar(255) DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'test','2003-10-10',16,'test','test','test');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usertype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (29,'assess','assess','$2y$10$urlNZFwSXvEh1VL9T.8wBO5ihY/EkPn7TxYl0vDud9MaDub2W5Bmm','ADMIN'),(30,'test','test','$2y$10$VGuQsvy6b9CBqHyI4t1Z7e4dr76TPMUb.xN/sPyEdnIrXym1kHHb6','ADMIN'),(31,'test','test','$2y$10$Gzq6mvPm2HdZ1vpiLw0LruvBdmAuStmK9PnBNJU3ltEus7V5Zua6G','ADMIN'),(32,'test','test','$2y$10$A01vlInYiE/CYddNbEq4x.nTtHAxH/HGzu/.Wdw68eNjB7DNESzV6','ADMIN');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'access'
--

--
-- Current Database: `Jo'sJob`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `Jo'sJob` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `Jo'sJob`;

--
-- Dumping routines for database 'Jo'sJob'
--

--
-- Current Database: `ask_legal`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ask_legal` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `ask_legal`;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `shortDescription` varchar(256) DEFAULT NULL,
  `longDescription` varchar(256) DEFAULT NULL,
  `imgSrc` varchar(256) DEFAULT NULL,
  `imgAlt` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Service 1','This is sevice 1','This is sevice 1 for family lae bla bla bla bla bla','/assets/images/service1.jpg',NULL),(2,'Service 2','This is sevice 2','This is sevice 2 for family lae bla bla bla bla bla','/assets/images/service2.jpg',NULL),(3,'Service 3','This is sevice 3','This is sevice 3 for family lae bla bla bla bla bla','/assets/images/service3.jpg',NULL),(4,'Service 4','This is sevice 4','This is sevice 4 for family lae bla bla bla bla bla','/assets/images/service4.jpg',NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ask_legal'
--

--
-- Current Database: `credit_card`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `credit_card` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `credit_card`;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_line1` varchar(250) DEFAULT NULL,
  `address_line2` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `postcode` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,NULL,'2a Baker Street','','Northampton','NN2 6DJ','Northamptonshire'),(2,NULL,'2a Baker Street','','Northampton','NN2 6DJ','Northamptonshire'),(3,NULL,'4 Baker Street','','Northampton','NN2 6DJ','Northamptonshire'),(4,NULL,'2a Baker Street','','Northampton','NN2 6DJ','Northamptonshire'),(5,9,'30 Baker Street','','Northampton','NN2 6DJ','Northamptonshire'),(6,9,'30 Baker Street','','Northampton','NN2 6DJ','Northamptonshire');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'lagga@gmail.com','lagga','stragga','2017-05-04','$2y$10$j5bdUs80S8mLNOp.FBD1TOxBSAnVVSHI7LitahUwgF25VKAKqYsNS'),(2,'lagga@gmail.com','Kolade','Dara','2019-07-05','$2y$10$CYNZAl45jN1Nomq0kRtA5ul2brETq5Yyawf61zCABb7p7lfbT98D2'),(3,'lagga@gmail.com','Lagga','Stragga','2020-04-05','$2y$10$gZfwwYvQMK9gOSlqlODTxOAkVAczAJBy/aQvvKZOiGZNXMSrkAe/6'),(4,'lagga@gmail.com','Lagga','Stragga','2020-07-04','$2y$10$YevJWX6zWMwMuwXTY.TJ0u0PoyZ9BsUF.iHW.DBhisAB9i9BOTpt2'),(5,'lol@gmail.com','lol','lal','2022-07-03','$2y$10$eb5YLH/nVpsLIL9Ef4OM/OjI6L98gECiYdG5Dl7SxlhEqQKIZxgLS'),(6,'raggy@gmail.com','Raggy','Lagga','2020-06-04','$2y$10$/kFKOpVz73IBm0OvFntFuuD5PV/puBl9Br1WNfqJieo9XDxfHVdHS'),(7,'Roy@gmail.com','Roy','Loy','2019-07-05','$2y$10$Zt/Z2a6l0nwhp0iRIQEyk.B7GMnaSjHyNorvN7qg00nMyFygK6.Pe'),(8,'Rasta@gmail.com','Rasta','Fasta','2019-06-06','$2y$10$xzeLNt0X2viyokFBP.AG/umT6u0N1qRCA/MWep2ku4zEVS7NWVFgu'),(9,'yuyhi@gmail.com','Cool','Lol','2020-05-05','$2y$10$R/zBOX9Wmr2hJDgKCR6Y8.iLsy8rO41cYdNmSFuRv8CZXwKtbXvwG'),(10,'test@gmail.com','LOL','LAL','2022-03-02','$2y$10$UEYAPaG8Pgn8yBPiNC7L1OjTuJ8ZZ5BbDKJV1ei9yJ6nMvvBlFcyS');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'credit_card'
--

--
-- Current Database: `ijdb`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ijdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `ijdb`;

--
-- Table structure for table `joke`
--

DROP TABLE IF EXISTS `joke`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joketext` text DEFAULT NULL,
  `jokedate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joke`
--

LOCK TABLES `joke` WRITE;
/*!40000 ALTER TABLE `joke` DISABLE KEYS */;
INSERT INTO `joke` VALUES (4,'Why did you loop the loops you loop','2022-11-24','Zel'),(13,'When there is base in data, you can call it database','2022-12-08',NULL),(15,'Why is an hotdog not always hot',NULL,'Jago Lobo'),(21,'sinus like sabines\r\n',NULL,'sinus');
/*!40000 ALTER TABLE `joke` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ijdb'
--

--
-- Current Database: `csy2028`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `csy2028` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `csy2028`;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `firstname` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `message` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES ('kol','ihon',NULL,'buk j',NULL,NULL),('kola','de',NULL,'iuibyvty',NULL,NULL),('ijo ','ij',NULL,'ji',NULL,NULL),('Kolade','Dara','2003-04-12 00:00:00','koladedara@ksoft.co.uk',NULL,NULL),('Mike','Molo','2002-09-25 00:00:00','mikemolo@ksoft.co.uk',NULL,NULL),('KO','IM',NULL,'NIO',NULL,NULL),('Tony','Izu','2002-11-15 00:00:00','tonyizu@ksoft.co.uk',NULL,NULL),('Zel','Cuelyui','2002-12-25 00:00:00','zelcue@ksoft.co.uk',NULL,NULL);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'csy2028'
--

--
-- Current Database: `assess`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `assess` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `assess`;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1,'test','test','2023-12-12',20,'male','test','12356');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usertype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'assess'
--

--
-- Current Database: `job`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `job` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `job`;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usertype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (4,'Kolade Dara','Darkay','$2y$10$nFvB.5FPyoI6RHh0yYdXZ.Q6SznPFvWfKeW8wHNUtYozMIurtWcVK','ADMIN'),(10,'Gab Zylin','Gabby','$2y$10$mFCdFkoAZ0Wf5Gk.dh8HteEtJpL2utqA5zIsPEghWWE2d6ALmSZGW','ADMIN'),(14,'Yaga Lag','Yag','$2y$10$p7hDVeBVarVYJl0mae8YZ.DP9L.47L0Ppf4WB.xtYDAkK.TfDv4Oa','CLIENT'),(26,'Dan Pedro','Danped','$2y$10$hPwyMArx9kQQfXZvsB.e.ePXrxwD41VHlsstrGmQkvP/KRXt/FWpa','ADMIN'),(27,'Roty Bur','Buty','$2y$10$lvQYdnKFVSHS4VXLr9qL4u6J.5qSzPPKWyXeBQkcYgZfMJdOsXBgm','CLIENT'),(28,'assess','assess','$2y$10$hmrxJEOi.c9/F0Tdtc22IeOZDceyovvBdEk3tgheMIcgaWjBA9ulW','ADMIN'),(29,'rarr','rarr','$2y$10$hgTsqz7R6UtHalSPVNol6euou3r5r0OqsyPpz9s3VYrK7TO9sCZ0i','CLIENT');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `details` longblob DEFAULT NULL,
  `jobId` int(11) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicants`
--

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` VALUES (9,'Sam Migos','sammigos@gmail.com','Bla Bla Bla',10,'63dc834ccb172.docx');
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'IT'),(2,'Human Resources'),(4,'Sales'),(5,'Hospitality'),(6,'Warehouse'),(7,'Teaching');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `enquiry` varchar(255) DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Kay Loth','07045678905','kay@jojobs.co.uk','This job is calm',4),(2,'Kay Loth','07045678905','kay@jojobs.co.uk','This job is calm',4),(3,'Jacquri SImba','08904578','jacsim@gmail.com','Your jobs are shit',4),(4,'qwer','234','ewrt','restudy',4),(5,'qwer','234','ewrt','restudy',4),(6,'qwer','234','ewrt','restudy',NULL),(379,'qw2wer','ewrt','werety','wtreyru',NULL),(380,'Yagi Bagi','1234567','yagbag@gmail.com','Is the job still available ',4),(381,'Tai Wain','097653467','taiwai@gmail.com','Nice web, give this student an A',26);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` longblob DEFAULT NULL,
  `salary` varchar(45) DEFAULT NULL,
  `closingDate` date DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `archive` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (3,'First level tech support','Job overview:\r\n\r\nTo work alongside the IT field based team in one of our acute Hospital sites. This team provides high quality equipment installation, technical support and advisory services for EKHUFT staff. They proactively manage incidents and requests, accepting ownership, evaluating, resolving and enabling the rapid resolution of a broad range of issues. This will include the testing and implementing of new and replacement hardware and appropriate software and the resolving of malfunctions. They look to achieve high standards of customer service and delivery of maximum business benefits.\r\n\r\nMain responsibilities:\r\n\r\n\r\n    To analyse incidents and deliver technical resolutions as part of the IT support\r\n\r\n    Service, to contribute to an efficient and effective IT service desk.\r\n\r\n    Review tickets within Service Management systems using established priorities.\r\n\r\n    Man the helpdesk telephone on a daily basis to resolve issues for end users.\r\n\r\n    Learn what notes and updates should be done on tickets.\r\n\r\n    The initial investigation and resolution of incidents relating to business and\r\n\r\n    desktop applications, and subsequent referral to either senior support analysts, to\r\n\r\n    2nd/ 3rd line support, the application management team or a 3rd party.\r\n\r\n    Learn to deliver end user introductory training on IT systems.\r\n\r\n    Undertakes daily operational checks as defined and trained by the wider team.\r\n\r\n    Participate in projects as required.\r\n\r\n    Support tracking of IT assets (software and hardware) using software tools.\r\n\r\n    Setup workstations and laptops for new starters\r\n\r\n    Support with physical desk moves between locations\r\n\r\n    Deploy and install software to computers\r\n\r\n    Perform password resets and help end users with profile and connectivity issues.\r\n\r\n    Allow and remove access to folders and email distribution lists\r\n\r\n    Perform basic proactive tasks for backups and learn how to restore backups.\r\n\r\n    Carry out any other duties as required by the IT Management Team.','£15,000 - £18,000','2023-04-09',1,'Northampton',NULL,NULL),(4,'IT Infrastructure Manager','About the role\r\n\r\nAs an experienced IT Infrastructure Manager, you will work closely with the Head of IT to design and deliver a robust, secure, and flexible IT solution.\r\n\r\nTaking day-to-day responsibility for the smooth running of the IT systems, you will ensure that full business continuity plans are in place for our IT systems and services.\r\n\r\nYou will work closely with the Park Services and Events teams to ensure that appropriate access to IT services, including CCTV, is available throughout the Parks.','£45,000 - £58,000','2023-05-15',1,'Northampton',NULL,NULL),(5,'Sales Assistant','Our client is an award winning sales and marketing organisation; who are looking to enhance their sales team with independent individuals who are capable of seeking and developing new opportunities within the sales and marketing industry.\r\n\r\nWithin this opportunity you will be working alongside the best sales and marketing specialists, promoting an exciting client portfolio. You will represent iconic brands and play a very important role in ongoing business success while developing your skills in residential environments. This opportunity will provide high rewards both career wise, and financially.\r\n\r\nThe successful candidate will be a well-presented, self-starter capable of demonstrating a desire to succeed in a sales environment.\r\n\r\nSuccessful candidates will:\r\n\r\n    Have strong communication skills\r\n    Be self-motivated\r\n    Possess an impeccable work ethic\r\n    Have a tenacious approach to personal development\r\n    Possess a competitive sales mentality\r\n    Have an entrepreneurial mind-set\r\n    Team work\r\n\r\nIf you can demonstrate the qualities as set out above and believe that you have the ability to develop new business, they would like to hear from you!\r\n\r\nNo experience is necessary although our client welcomes candidates with any previous experience in the following areas: customer service, sales representative, marketing supervisor, sales executive, direct sales, field sales, marketing executive, retail, service supervisor, call centre, call centre inbound, marketing representative, manager, bar manager, hospitality, receptionist, warehouse, marketing assistant, front of house, direct marketing, sales assistant, and any other customer service or sales role. This is a self employed commission only opportunity with the ability to create your own future.','£12,000 - £15,000','2023-05-29',4,'Northampton',NULL,NULL),(6,'HR Manager','HR Manager: An ambitious HR Manager is required to help deliver an effective and comprehensive Human Resource service to a growing organisation with fully-funded plans to double in size over the next 18 months.\r\n\r\nWorking in a consultative manner, the successful HR Manager will work on a standalone basis to ensure quality advice and support is provided as part of the journey to make the organisation an industry leading \"Employer of Choice\".\r\n\r\nThis exciting new role would ideally suit an ambitious generalist HR professional eager to take on a dynamic position offering genuine career progression opportunities.\r\n\r\nKey Responsibilities\r\n\r\n    Provide HR support and advice to management on company HR policies and procedures, including employment law advice e.g. disciplinary, grievance, performance.\r\n    Provide high-quality recruitment and selection service to all departments including the use of social media.\r\n    Develop and implement HR policy and practice, contract templates, HR documentation and HR database developments, ensuring that all are up to date with UK legislation.\r\n    Provide ongoing employee relations support and advice to whole firm relating to contractual and general HR matters.\r\n    Review compensation and benefit plans e.g. salary review, bonus plan and other non-specified benefit plans.\r\n    Propose and advise on internal and external training for employees.\r\n    Create career path models to include job descriptions, person specs and competency models for all roles to support individuals\' career progression.\r\n    Manage the HR calendar: performance reviews, salary reviews, development planning, ensuring these processes support the ongoing strategic growth plan.\r\n    Develop the organisation culture to ensure \"Employer of Choice\" status is attained through determining the current culture, proposing organisation initiatives and then implementing after approval to achieve \"EOC\" tag.','£35,000 - £40,000','2023-05-29',2,'Northampton',NULL,NULL),(7,'Developer','Backend Developer','£35,000 - £40,000','2023-03-01',1,'Scotland',NULL,NULL),(8,'HR Assistant Manager','Assistant to HR manager with two years experience.','£35,000 - £40,000','2023-03-09',2,'Scotland',NULL,NULL),(9,'Customer Assistant ','No experience needed','£15,000 - £20,000','2023-03-05',4,'London',NULL,NULL),(10,'Bartender ','Bartender with a bit experience in pouring drinks','£20,000 - £22,000','2023-03-10',5,'London',NULL,NULL),(11,'Catering Assistant ','N/A','£18,000 - £20,000','2023-03-11',5,'London',NULL,14),(12,'Customer Assistant ','N/A','£20,000 - £22,000','2023-02-19',4,'Coventry',NULL,NULL),(13,'Porter','N/A','£15,000 - £18,000','2023-03-26',5,'Bedford',NULL,NULL),(14,'Developer','Frontend developer','£35,000 - £40,000','2023-03-18',1,'Coventry',NULL,NULL),(15,'Sales Assistant ','N/A','£15,000 - £18,000','2023-03-17',4,'Bedford',NULL,NULL),(16,'Developer','Fullstack Developer','£29,000 - £35,000','2023-03-16',1,'Coventry',NULL,14),(17,'Web Programming Teacher','N/A','£25,000 - £30,000','2023-03-18',7,'Coventry',NULL,NULL);
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'job'
--

--
-- Current Database: `wuc`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `wuc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `wuc`;

--
-- Dumping routines for database 'wuc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-03 16:05:52
