-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tailors
CREATE DATABASE IF NOT EXISTS `tailors` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tailors`;

-- Dumping structure for table tailors.invoices_orders
CREATE TABLE IF NOT EXISTS `invoices_orders` (
  `invoices_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `order_cost` int NOT NULL DEFAULT '0',
  `order_date` varchar(50) NOT NULL DEFAULT '0',
  `order_update` varchar(50) NOT NULL DEFAULT '0',
  `is_trowser` varchar(50) NOT NULL DEFAULT '0',
  `issuit` varchar(50) NOT NULL DEFAULT '0',
  `order_status` varchar(50) NOT NULL DEFAULT '0',
  `decription` text NOT NULL,
  `qty_trousers` int NOT NULL DEFAULT '0',
  `qty_suits` int NOT NULL DEFAULT '0',
  `amount_trowser` int NOT NULL DEFAULT '0',
  `amount_suit` int NOT NULL DEFAULT '0',
  `total_price` int NOT NULL DEFAULT '0',
  `product` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`invoices_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tailors.invoices_orders: ~9 rows (approximately)
REPLACE INTO `invoices_orders` (`invoices_id`, `user_id`, `order_cost`, `order_date`, `order_update`, `is_trowser`, `issuit`, `order_status`, `decription`, `qty_trousers`, `qty_suits`, `amount_trowser`, `amount_suit`, `total_price`, `product`) VALUES
	(1, 6, 1200, '11-20-2001', '12-11-2000', '10', '12', 'pending', 'I Deliever in Time', 2, 4, 1200, 1500, 0, 'Trowser'),
	(2, 6, 4000, '11-20-2001', '12-11-2000', '10', '12', 'success', 'I Deliever in Time', 2, 4, 1200, 1500, 0, 'suit'),
	(3, 7, 3000, '11-21-2024', '12-10-2024', '4', '6', 'completed', 'I deliever in Time', 2, 2, 1100, 2100, 0, 'trowsier'),
	(4, 8, 2300, '11-20-2021', '20-05-2023', '3', '10', 'pending', 'I deliever in Time', 5, 6, 500, 1500, 0, 'trowsir'),
	(5, 6, 1500, '2024-09-06', '2024-09-10', '0', '', 'pending', 'Nice Prodect', 11, 11, 1100, 1100, 0, 'suit'),
	(6, 7, 300, '2024-09-05', '2024-09-11', '0', '', 'completed', 'night shift', 1200, 20, 200, 2000, 0, 'suit'),
	(7, 9, 222, '2024-09-04', '2024-09-19', '1', '', 'pending', '22', 2, 22, 22, 22, 0, 'suit'),
	(8, 6, 1500, '2024-09-12T03:49', '2024-09-04T03:49', '1', '', 'pending', 'yes Right', 2200, 11, 230, 400, 0, 'trowser'),
	(9, 7, 1500, '2024-09-04T03:52', '2024-09-06T03:52', '1', '', 'pending', 'yes', 22, 22, 22, 22, 0, 'trowse');

-- Dumping structure for table tailors.tbl_measurements
CREATE TABLE IF NOT EXISTS `tbl_measurements` (
  `measurementID` int NOT NULL AUTO_INCREMENT,
  `measurementDate` date NOT NULL,
  `measurementTime` time NOT NULL,
  `chest` decimal(10,2) DEFAULT NULL,
  `shoulder` decimal(10,2) DEFAULT NULL,
  `sleeves` decimal(10,2) DEFAULT NULL,
  `collar` decimal(10,2) DEFAULT NULL,
  `cuff` decimal(10,2) DEFAULT NULL,
  `shalvaarLength` decimal(10,2) DEFAULT NULL,
  `shalvaarBottom` decimal(10,2) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`measurementID`) USING BTREE,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tailors.tbl_measurements: ~8 rows (approximately)
REPLACE INTO `tbl_measurements` (`measurementID`, `measurementDate`, `measurementTime`, `chest`, `shoulder`, `sleeves`, `collar`, `cuff`, `shalvaarLength`, `shalvaarBottom`, `user_id`) VALUES
	(1, '2024-08-06', '14:22:00', 40.99, 18.00, 25.00, 15.00, 10.00, 42.00, 222.00, 4),
	(2, '2024-10-07', '09:15:00', 42.00, 19.23, 26.00, 16.00, 11.30, 43.00, 23.00, 5),
	(3, '2024-08-06', '17:45:00', 39.00, 17.50, 24.00, 14.50, 9.50, 41.00, 21.50, 6),
	(4, '2023-11-30', '01:48:31', 300.00, 39.00, 9.00, 33.00, 42.00, 80.00, 50.00, 7),
	(5, '2024-08-14', '13:00:13', 23.00, 12.00, 40.00, 20.00, 8.50, 41.00, 40.22, 8),
	(6, '2024-08-14', '14:05:20', 23.00, 43.00, 53.00, 32.00, 32.00, 34.00, 34.00, 9),
	(8, '2024-08-14', '14:06:12', 40.33, 19.23, 32.00, 32.00, 11.30, 30.30, 23.33, 10),
	(9, '2024-08-14', '14:06:23', 23.00, 23.00, 0.00, 32.00, 0.00, 30.30, 3.00, 11);

-- Dumping structure for table tailors.tbl_orders
CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cost` decimal(11,2) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int NOT NULL,
  `number_of_suit` int DEFAULT NULL,
  `is_trouser` enum('Yes','No') DEFAULT NULL,
  `order_notes` text,
  `order_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `total_in_hand` varchar(50) DEFAULT NULL,
  `total_debit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_orders_processed` varchar(50) DEFAULT NULL,
  `delivered` varchar(50) DEFAULT NULL,
  `total_orders` varchar(50) DEFAULT NULL,
  `new_orders` varchar(50) DEFAULT NULL,
  `invoice_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`) USING BTREE,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tailors.tbl_orders: ~4 rows (approximately)
REPLACE INTO `tbl_orders` (`id`, `cost`, `created_at`, `deleted_at`, `updated_at`, `user_id`, `number_of_suit`, `is_trouser`, `order_notes`, `order_status`, `order`, `total_in_hand`, `total_debit`, `total_orders_processed`, `delivered`, `total_orders`, `new_orders`, `invoice_number`) VALUES
	(6, 25000.00, '2022-08-15', '2024-08-16', '2024-08-15', 7, 3, 'Yes', 'rerr', 'pending', 2, '22', '2000', '2', '1', '12', '8', 'INV-09-24-0002'),
	(7, 25000.00, '2022-08-15', '2024-08-16', '2024-08-15', 8, 3, 'Yes', 'rerr', 'pending', 2, '22', '2000', '2', '1', '12', '8', 'INV-09-24-0002'),
	(8, 25000.00, '2022-08-15', '2024-08-16', '2024-08-15', 6, 3, 'Yes', 'rerr', 'pending', 2, '22', '2000', '2', '1', '12', '8', 'INV-09-24-0004'),
	(9, 25000.00, '2022-08-15', '2024-08-16', '2024-08-15', 9, 3, 'Yes', 'rerr', 'pending', 2, '22', '2000', '2', '1', '12', '8', 'INV-09-24-0004');

-- Dumping structure for table tailors.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `total_cost` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `customer_since` date DEFAULT NULL,
  `total_orders` int DEFAULT NULL,
  `total-order` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tailors.tbl_users: ~4 rows (approximately)
REPLACE INTO `tbl_users` (`id`, `name`, `phone`, `image`, `whatsapp`, `time`, `total_cost`, `due_date`, `user_id`, `customer_since`, `total_orders`, `total-order`) VALUES
	(6, 'zubair', '03000592134', 'https://randomuser.me/api/portraits/men/67.jpg', '0303339399', '2024-08-07 12:51:30', '5000', '2024-08-23', 6, '2018-03-16', 2, 12),
	(7, 'Hassan\r\n', '03087670903', 'https://randomuser.me/api/portraits/men/67.jpg', '03090502781', '2024-08-07 12:51:30', '5000', '2024-08-23', 7, '2018-03-16', 2, 13),
	(8, 'Ehsan', '03090502781', 'https://randomuser.me/api/portraits/men/13.jpg', '03029191991', '2024-08-07 12:51:30', '5000', '2024-08-23', 8, '2018-03-16', 2, 8),
	(9, 'Sajid', '03117896789', 'https://randomuser.me/api/portraits/men/13.jpg', '03029191991', '2024-08-07 12:51:30', '5000', '2024-08-23', 9, '2018-03-16', 2, 8);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
