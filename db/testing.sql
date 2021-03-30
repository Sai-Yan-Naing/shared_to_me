-- --------------------------------------------------------
-- Host:                         
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for testing
CREATE DATABASE IF NOT EXISTS `testing` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `testing`;

-- Dumping structure for table testing.add_user
CREATE TABLE IF NOT EXISTS `add_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `it_skill` varchar(100) DEFAULT NULL,
  `gender` varchar(45) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table testing.add_user: ~1 rows (approximately)
/*!40000 ALTER TABLE `add_user` DISABLE KEYS */;
REPLACE INTO `add_user` (`id`, `name`, `birthday`, `education`, `it_skill`, `gender`, `department`, `address`) VALUES
	(43, 'OldKento', '2021-03-25', 'Graduated', 'Javascript ', 'Male', 'Photoshop Team', 'KKK');
/*!40000 ALTER TABLE `add_user` ENABLE KEYS */;

-- Dumping structure for table testing.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table testing.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `email`, `password`) VALUES
	(22, 'wady', 'wady@gmail.com', '0192023a7bbd73250516f069df18b500'),
	(23, 'mwdm', 'capital.maywadymin@gmail.com', '0192023a7bbd73250516f069df18b500');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
