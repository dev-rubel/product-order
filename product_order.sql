-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.36 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for product_order
CREATE DATABASE IF NOT EXISTS `product_order` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `product_order`;

-- Dumping structure for table product_order.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table product_order.customers: 1 rows
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`) VALUES
	(1, 'test', 'issa@gmail.com', '', ''),
	(2, 'Test Customer', 'test@gmail.com', '12345678', 'test address'),
	(3, 'test', 'test@test.com', '', ''),
	(4, 'test', 'test@test.com', '12345678', 'test address'),
	(5, 'test', 'test@test.com', '12345678', 'test address');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table product_order.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `qty` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `tax_price` varchar(50) DEFAULT NULL,
  `total` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__products` (`product_id`),
  KEY `FK_orders_customers` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table product_order.orders: 10 rows
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `product_id`, `customer_id`, `qty`, `price`, `tax_price`, `total`, `create_date`) VALUES
	(8, 2, 2, '1', '200', '10', '210', '2023-04-01 05:36:47'),
	(7, 1, 2, '1', '100', '5', '105', '2023-04-01 05:36:47'),
	(5, 1, 1, '1', '100', '5', '105', '2023-04-01 05:33:14'),
	(6, 2, 1, '2', '200', '10', '410', '2023-04-01 05:33:14'),
	(9, 1, 3, '1', '100', '5', '105', '2023-04-01 05:45:56'),
	(10, 2, 3, '1', '200', '10', '210', '2023-04-01 05:45:56'),
	(11, 1, 4, '2', '100', '5', '205', '2023-04-01 07:21:15'),
	(12, 2, 4, '3', '200', '10', '610', '2023-04-01 07:21:15'),
	(13, 1, 5, '2', '100', '5', '205', '2023-04-01 07:21:36'),
	(14, 2, 5, '3', '200', '10', '610', '2023-04-01 07:21:36');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table product_order.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `slug` varchar(100) NOT NULL DEFAULT '',
  `short_desc` varchar(255) NOT NULL DEFAULT '',
  `long_desc` text NOT NULL,
  `image` text NOT NULL,
  `price` varchar(50) NOT NULL DEFAULT '',
  `tax` varchar(50) DEFAULT '',
  `create_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table product_order.products: 2 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `slug`, `short_desc`, `long_desc`, `image`, `price`, `tax`, `create_date`) VALUES
	(1, 'Test Product', 'test-product', 'test product short desc', 'test product long desc', 'https://picsum.photos/200/300', '100', '5', '2023-03-31 21:14:38'),
	(2, 'Test Product 2', 'test-product 2', 'test product short desc 2', 'test product long desc 2', 'https://picsum.photos/200/300', '200', '10', '2023-03-31 21:14:38');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
