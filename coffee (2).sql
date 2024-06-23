-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2024 at 08:04 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `phone` varchar(15) COLLATE latin1_general_cs DEFAULT NULL,
  `num_members` int DEFAULT NULL,
  `message` text COLLATE latin1_general_cs,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `num_members`, `message`, `created_at`) VALUES
(1, 'John', 'john@example.com', '1234567890', 4, 'This is a test booking', '2024-05-08 19:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

DROP TABLE IF EXISTS `card_details`;
CREATE TABLE IF NOT EXISTS `card_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cardholder_name` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `card_number` varchar(16) COLLATE latin1_general_cs NOT NULL,
  `exp_month` int NOT NULL,
  `exp_year` int NOT NULL,
  `cvc` int NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`id`, `cardholder_name`, `card_number`, `exp_month`, `exp_year`, `cvc`, `total_amount`, `created_at`) VALUES
(1, 'Tanya', '12345678', 12, 2024, 123, 75.98, '2024-05-08 18:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `rating` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `comment` text COLLATE latin1_general_cs NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `rating`, `comment`, `created_at`) VALUES
(3, 'Julia', 'julia@gmail.com', '4 stars', 'Baristo consistently delivers exceptional coffee and service. Their baristas are true artisans, ensuring each cup is brewed to perfection. The atmosphere is inviting, making it the perfect spot for catching up with friends or enjoying a quiet moment with a book. A must-visit for any coffee enthusiast.', '2024-04-26 19:36:26'),
(4, 'John', 'julia@gmail.com', '5 stars', 'Baristo is a true gem in the coffee scene. From the moment you step through the door, you\'re greeted with the rich scent of freshly ground beans. Their menu boasts a variety of options, all expertly crafted with care. Whether it\'s a quick morning pick-me-up or a leisurely afternoon sip, Baristo delivers.', '2024-04-27 14:46:31'),
(6, 'Taniya ', 'taniyagusain07@gmail.com', '5 stars', 'Baristo is a coffee lover\'s paradise. The aroma of freshly roasted beans fills the air, creating an inviting atmosphere from the moment you walk in. Their menu offers a diverse range of options, from bold and robust to smooth and creamy. It\'s the perfect place to indulge in your caffeine cravings.', '2024-05-01 14:14:05'),
(8, 'gabi', 'ferventganguly8@tomorjerry.com', '5 stars', 'At Baristo, coffee is more than just a beverage – it\'s an experience. Each cup is crafted with precision and care, ensuring maximum flavor with every sip. The ambiance is relaxed and inviting, making it the ideal spot to unwind with your favorite brew. Whether you\'re a coffee connoisseur or just starting your journey, Baristo is sure to impress.', '2024-05-07 19:16:22'),
(9, 'Yeri Dawson', 'yeri20@gmail.com', '5 stars', 'With a cozy ambiance and friendly staff, Baristo offers a delightful coffee experience. The aroma alone draws you in, and their meticulously crafted brews never disappoint. Whether you\'re a latte aficionado or a black coffee purist, Baristo has something to satisfy every palate.', '2024-05-08 19:23:58'),
(10, 'Eden Jordan', 'ferventganguly8@tomorjerry.com', '5 stars', 'Baristo is my go-to spot for quality brews and cozy vibes. The staff is always welcoming, and their passion for coffee shines through in every cup. Whether I\'m in the mood for a classic espresso or a specialty drink, I know I can count on Baristo to deliver a delicious experience every time.', '2024-05-08 19:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(100) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'tanya', '$2y$10$sNjS5T.GPQbSgnwBjBcDbu0diN5Pxb0dsFC4puYDFa/jCbr.4rDiS', 'tanya@gmail.com'),
(2, 'czadrucs', '$2y$10$lC/FFw1gAnI4YLHzGA7SQeiY0Bkmt1ymPMt4S0Vc72Khl1UNP5wCK', 'ferventganguly8@tomorjerry.com'),
(3, 'riya', '$2y$10$MlqzXNIxzQigy2/8c14LgOE7k8HKFZ8YA/drBVvWP7sI3jGiksmC2', 'czadrucs@gmail.com'),
(4, 'jia', '$2y$10$8m6CcOz7clKVCzUlydEUlOvf1qnpw6t0AHPMKzGdXQHEQfYzV/ipy', 'jia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `Email` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `Password` varchar(10) COLLATE latin1_general_cs NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`Email`, `Password`) VALUES
('taniyamailid@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
