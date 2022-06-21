-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 09:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `football_player`
--

CREATE TABLE `football_player` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` int(11) NOT NULL,
  `club` text NOT NULL,
  `nation` text NOT NULL,
  `value` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `football_player`
--

INSERT INTO `football_player` (`id`, `name`, `age`, `club`, `nation`, `value`) VALUES
(1, 'Stefan De Vrij', 20, 'Feyenoord', 'Holland', 2.40),
(2, 'Phil Jones', 20, 'Man Utd', 'English', 7.25),
(3, 'Nicolas Tagliafico', 19, 'Murcia', 'Argentina', 0.48),
(4, 'Matija Nastasic', 19, 'Man City', 'Serbia', 2.90),
(5, 'Inigo Martinez', 21, 'Real ', 'Spain', 4.20),
(6, 'Joel Matip', 21, 'Schalke', 'Cameroon', 4.90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `football_player`
--
ALTER TABLE `football_player`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `football_player`
--
ALTER TABLE `football_player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
