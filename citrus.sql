-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 07:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'citrus@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `name` varchar(191) NOT NULL,
  `approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `image`) VALUES
(1, 'Orange', 'Delicious and juicy orange fruit contain an impressive list of essential nutrients, vitamins, minerals for healthy growth and development and overall well-being.', 'orange.jpg'),
(2, 'Lemon', 'The lemon is a species of small evergreen tree in the flowering plant family Rutaceae, native to South Asia, primarily North eastern India. Its fruits are round in shape.', 'lemon.jpg'),
(4, 'Grapefruit', 'The grapefruit is a subtropical citrus tree known for its relatively large sour to semi-sweet, somewhat bitter fruit. When found, it was nicknamed the \"forbidden fruit\".', 'grapefruit.jpg'),
(5, 'Lime', 'A lime is a citrus fruit, which is typically round, green in color, 3 - 6 centimetres in diameter, and contains acidic juice vesicles.                              \r\n\r\n', 'lime.jpg'),
(6, 'Mandarin orange', 'The mandarin orange, also known as the mandarin or mandarine, is a small citrus tree with fruit resembling other oranges, usually eaten plain or in fruit salads.', 'mandarinOrange.jpg'),
(7, 'Blood orange', 'The blood orange is a variety of orange  with crimson, almost blood-colored flesh.\r\nThe distinctive dark flesh color is due to the presence of anthocyanins.', 'bloodOrange.jpg'),
(8, 'Pomelo', 'Pomelo is is the largest citrus fruit from the family Rutaceae and the principal ancestor of the grapefruit.', 'pomelo.jpg'),
(9, 'Kumquat', 'Kumquat are a group of small fruit-bearing trees in the flowering plant family Rutaceae. They were previously classified as forming the now-historical genus Fortunella.', 'kumquat.jpg'),
(10, 'Clementine', 'Clementines can be separated into 7 to 14 segments. Similar to tangerines, they tend to be easy to peel.', 'clementine.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
