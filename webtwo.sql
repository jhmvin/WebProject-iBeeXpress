-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for webtwo
CREATE DATABASE IF NOT EXISTS `webtwo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `webtwo`;

-- Dumping structure for table webtwo.package
CREATE TABLE IF NOT EXISTS `package` (
  `trackno` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(100) DEFAULT NULL,
  `sender_address` varchar(100) DEFAULT NULL,
  `sender_email` varchar(100) DEFAULT NULL,
  `sender_contact` varchar(100) DEFAULT NULL,
  `rec_name` varchar(100) DEFAULT NULL,
  `rec_address` varchar(100) DEFAULT NULL,
  `rec_email` varchar(100) DEFAULT NULL,
  `rec_contact` varchar(100) DEFAULT NULL,
  `origin` varchar(100) DEFAULT 'NCR',
  `destination` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `value` decimal(10,0) DEFAULT NULL,
  `dispatch` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `fee` decimal(10,0) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `archive` int(11) DEFAULT '0',
  PRIMARY KEY (`trackno`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- Dumping data for table webtwo.package: ~10 rows (approximately)
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` (`trackno`, `sender_name`, `sender_address`, `sender_email`, `sender_contact`, `rec_name`, `rec_address`, `rec_email`, `rec_contact`, `origin`, `destination`, `size`, `value`, `dispatch`, `delivery_date`, `fee`, `state`, `archive`) VALUES
	(30, 'JOHN MELVIN', 'BOCAUE', 'riyuuhirain@gmail.com', '09368955866', 'JELYN MERCADO', 'CAPALANGAN', 'jelyn@gmail.com', '09368955866', 'NCR', 'NCR', 'EXTRA', 50000, '2017-05-17 08:18:54', '2017-05-18 08:18:54', 1235, 'DELIVERED', 1),
	(31, 'JELYN MERCADO', 'BOCAUE BULACAN', 'riyuuhirain@gmail.com', '09368955866', 'MELVIN PERELLO', 'BOCAUE BULACAN', 'jhmvinperello@gmail.com', '09369898555', 'NCR', 'NLUZON', 'MEDIUM', 50000, '2017-05-17 17:49:57', '2017-05-20 17:49:57', 400, 'DELIVERED', 0),
	(32, 'JHON MELVIN N. PERELLO', 'BUNDUCAN BOCAUE BULACAN', 'jhmvinperello@gmail.com', '09368955866', 'ELYSSA JELYN MERCADO', 'CAPALANGAN APALIT PAMPANGA', 'jelynmercado@gmail.com', '09368955866', 'NCR', 'MINDANAO', 'EXTRA', 3256, '2017-05-17 17:47:38', '2017-05-20 17:47:38', 1558, 'DELIVERED', 0),
	(33, 'JHON MELVIN N. PERELLO', 'BUNDUCAN BOCAUE BULACAN', 'jhmvinperello@gmail.com', '09368955866', 'ELYSSA JELYN MERCADO', 'CAPALANGAN APALIT PAMPANGA', 'jelynmercado@gmail.com', '09368955866', 'NCR', 'NLUZON', 'SMALL', 3256, '2017-05-17 17:46:26', '2017-05-20 17:46:26', 255, 'DELIVERED', 0),
	(34, 'JHON MELVIN N. PERELLO', 'BUNDUCAN BOCAUE BULACAN', 'jhmvinperello@gmail.com', '09368955866', 'ELYSSA JELYN MERCADO', 'CAPALANGAN APALIT PAMPANGA', 'jelynmercado@gmail.com', '09368955866', 'NCR', 'NLUZON', 'SMALL', 3256, '2017-05-17 17:47:14', '2017-05-20 17:47:14', 255, 'DELIVERED', 0),
	(35, 'JHON MELVIN PERELLO', 'BUNDUCAN, BOCAUE, BULACAN', 'jhmvinperello@gmail.com', '09368955866', 'ELYSSA JELYN MERCADO', 'CAPALANGAN APALIT PAMPANGA', 'jelyn@gmail.com', '09368955866', 'NCR', 'NLUZON', 'MEDIUM', 5000, '2017-05-17 18:48:40', '2017-05-20 18:48:40', 400, 'DISPATCHED', 0),
	(36, 'JHON MELVIN PERELLO', 'BOCAUE BULACAN', 'jhmvinperello@gmail.com', '09368955866', 'JELYN MERCADO', 'APALIT PAMPANGA', 'jelyn@gmail.com', '09368955866', 'NCR', 'NCR', 'SMALL', 5000, '2017-05-17 18:53:05', '2017-05-18 18:53:05', 200, 'DISPATCHED', 0),
	(37, 'JELYN MERCADO', 'ASDASDASD', 'jhmvinperello@gmail.com', '09368955866', 'JELKYN MERCADO', 'ASDASDASD', 'jhmvinperello@gmail.com', '09368955866', 'NCR', 'NCR', 'SMALL', 56000, '2017-05-18 10:03:06', '2017-05-19 10:03:06', 200, 'DELIVERED', 0),
	(38, 'JHON MELVIN PERELLO', 'BOCAUE BULACAN', 'jhmvinperello@gmail.com', '09368955866', 'JELYN MERCADO ', 'PAMPANGA', 'jhmvinperello@gmail.com', '09368955866', 'NCR', 'VISAYAS', 'LARGE', 5000, '2017-05-18 10:31:30', '2017-05-21 10:31:30', 870, 'DELIVERED', 0),
	(39, 'JHON MELVIN N. PERELLO', 'BOCAUE BULACAN', 'jhmvinperello@gmail.com', '09368955866', 'ERICKA SAD DELA CRUZ', 'KUNG SAAN SAAN', 'jhmvinperello@gmail.com', '09261703113', 'NCR', 'MINDANAO', 'SMALL', 10000, '2017-05-19 02:37:25', '2017-05-22 02:37:25', 265, 'DELIVERED', 0);
/*!40000 ALTER TABLE `package` ENABLE KEYS */;

-- Dumping structure for table webtwo.remittance
CREATE TABLE IF NOT EXISTS `remittance` (
  `trackno` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(50) DEFAULT NULL,
  `sender_contact` varchar(50) DEFAULT NULL,
  `rcv_name` varchar(50) DEFAULT NULL,
  `rcv_contact` varchar(50) DEFAULT NULL,
  `rcv_mail` varchar(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `pickup` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `fee` double DEFAULT NULL,
  `complete` datetime DEFAULT NULL,
  `archive` int(11) DEFAULT '0',
  PRIMARY KEY (`trackno`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table webtwo.remittance: ~6 rows (approximately)
/*!40000 ALTER TABLE `remittance` DISABLE KEYS */;
INSERT INTO `remittance` (`trackno`, `sender_name`, `sender_contact`, `rcv_name`, `rcv_contact`, `rcv_mail`, `amount`, `pickup`, `date`, `fee`, `complete`, `archive`) VALUES
	(9, 'JELYN MERCADO', '09368955866', 'JHON MELVIN PERELLO', '09368955866', 'jhmvinperello@gmail.com', 5000, 'APALIT', '2017-05-17 15:48:18', 220, '0000-00-00 00:00:00', 1),
	(10, 'JELYN MERCADO', '09368955866', 'JHON MELVIN PERELLO', '09368955866', 'jhmvinperello@gmail.com', 2000, 'MALOLOS', '2017-05-17 15:48:19', 100, '2017-05-19 02:44:53', 0),
	(11, 'JHON MELVIN', '09368955866', 'JELYN MERCADO', '09368955866', 'jelyn@mgai.com', 5000, 'MALOLOS', '2017-05-17 15:49:18', 220, '0000-00-00 00:00:00', 1),
	(12, 'JHON MELVIN PERELLO', '09368955866', 'JELYN MERCADO', '09368955866', 'jhmvinperello@gmail.com', 50000, 'APALIT', '2017-05-18 16:14:02', 250, '2017-05-19 03:01:04', 0),
	(13, 'JHON MELVIN PERELLO', '09368955866', 'JELYN MERCADO', '09368955866', 'jhmvinperello@gmail.com', 5000, 'APALIT', '2017-05-18 16:19:15', 220, '0000-00-00 00:00:00', 0),
	(14, 'JHON MELVIN PERELLO', '09368955866', 'JELYN MERCADO', '09368955866', 'jhmvinperello@gmail.com', 5000, 'MALOLOS', '2017-05-18 16:33:47', 220, '2017-05-18 11:47:34', 0);
/*!40000 ALTER TABLE `remittance` ENABLE KEYS */;

-- Dumping structure for table webtwo.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Dumping data for table webtwo.staff: ~2 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `user`, `pass`, `name`, `role`, `state`) VALUES
	(10, 'jhmvin', '123456789', 'Jhon Melvin', 'admin', 0),
	(36, 'jlnclsmrc', '123456', 'Jelyn Mercado', 'staff', 0);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
