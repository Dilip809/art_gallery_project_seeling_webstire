-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 09:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `prize` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `ArtName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`id`, `category`, `detail`, `prize`, `size`, `image`, `ArtName`) VALUES
(2, 'modern', 'nil', '4500', '500kb', 'modern1.jpg', 'Girly looks'),
(9, 'abstract', 'nil', '5000', '450kb', 'abstract5.jpg', 'abstract art painting'),
(10, 'abstract', 'nil', '1999', '500kb', 'abstract.jpg', 'Landscape'),
(11, 'abstract', 'nil', '1500', '500kb', 'abstract2.jpg', 'Abstract art '),
(12, 'abstract', 'nil', '1700', '500kb', 'abstract3.jpg', 'Abstract art '),
(13, 'canvas', 'nil', '2500', '400kb', 'acrylic1.jpg', 'Lord Ganesha'),
(14, 'canvas', 'nil', '2500', '450kb', 'Lord Krishna Modern Art.jpg', 'Lord Krishna'),
(15, 'graffitti', 'nil', '1999', '500kb', 'graffitti 800+px.jpg', 'Graffitti Painting'),
(1, 'abstract', 'nil', '1500', '400 x 400', 'abstract2.jfif', 'Abstract Art paintings');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
