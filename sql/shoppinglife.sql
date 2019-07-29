-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppinglife`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int(30) NOT NULL AUTO_INCREMENT,
  `productname` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `productname`, `user`, `price`) VALUES
(1, 'Chair', 'User2', 50),
(2, 'Backpack', 'User2', 25);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(80) NOT NULL,
  `user` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `user`, `url`, `category`, `price`) VALUES
(1, 'Backpack', 'Black polyester', 'User1', 'backpack', 'miscellaneous', 25),
(2, 'Chair', 'Wooden antique', 'User1', 'chair', 'furniture', 50),
(3, 'Toaster', 'Silver', 'User1', 'toaster', 'appliances', 12);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `reviewid` int(30) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `rating` int(20) NOT NULL,
  `comments` varchar(50) NOT NULL,
  `reviewdate` varchar(30) NOT NULL,
  PRIMARY KEY (`reviewid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewid`, `user`, `product`, `rating`, `comments`, `reviewdate`) VALUES
(1, 'User2', 'toaster', 5, 'Heats bread evenly.', '28 Jul 2019');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(130) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`) VALUES
(1, 'User1', '$2y$10$X0KjcmsrGIv6GBaZEtOEveW7sXmXpJ.7vhxIKHvnMXO/2WV99y//6', 'user1@email.com', 12345678),
(2, 'User2', '$2y$10$aEJaOMhjWV/35lDKZeSFVuetM9C/oPR7/FFMfAeI2jIVFbEJUKo1G', 'user2@email.com', 12312312);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
