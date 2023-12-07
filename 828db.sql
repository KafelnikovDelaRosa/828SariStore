-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2023 at 11:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `828db`
--

-- --------------------------------------------------------

--
-- Table structure for table `itemstb`
--

CREATE TABLE `itemstb` (
  `name` varchar(50) NOT NULL,
  `image` varchar(75) NOT NULL,
  `price` int(6) NOT NULL,
  `stock` int(6) NOT NULL,
  `status` varchar(25) NOT NULL,
  `itemid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemstb`
--

INSERT INTO `itemstb` (`name`, `image`, `price`, `stock`, `status`, `itemid`) VALUES
('Glade Orange Car Gel', 'gladeorange.jpg', 75, 10, 'green', '4801234057725'),
('Gatorade', 'gatorade.jpg', 15, 10, 'green', '4803925350054'),
('Nivea extra whitening deodorant', 'deodorant.jpg', 145, 5, 'green', '4005808837472'),
('Barcode Scanner', 'Barcodescanner.jpg', 514, 1, 'green', '9100123020009'),
('Dunlop Table Tennis Balls', 'tabletennisballs.jpg', 370, 3, 'green', '5013317421579');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
