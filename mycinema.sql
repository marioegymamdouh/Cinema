-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 03:47 PM
-- Server version: 5.7.21-log
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycinema`
--
CREATE DATABASE IF NOT EXISTS `mycinema` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mycinema`;

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

DROP TABLE IF EXISTS `durations`;
CREATE TABLE `durations` (
  `id` int(5) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`id`, `duration`) VALUES
(1, '10:00 - 13:00'),
(2, '13:00 - 16:00'),
(3, '18:00 - 21:00'),
(4, '21:00 - 24:00');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

DROP TABLE IF EXISTS `halls`;
CREATE TABLE `halls` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `seats` int(5) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `name`, `seats`) VALUES
(1, 'test hall 1', 50);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`) VALUES
(1, 'test movie 1');

-- --------------------------------------------------------

--
-- Table structure for table `showmovies`
--

DROP TABLE IF EXISTS `showmovies`;
CREATE TABLE `showmovies` (
  `id` int(5) NOT NULL,
  `showId` int(5) NOT NULL,
  `movieId` int(5) NOT NULL,
  `date` date NOT NULL,
  `tickets` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `showmovies`
--

INSERT INTO `showmovies` (`id`, `showId`, `movieId`, `date`, `tickets`) VALUES
(1, 1, 1, '2019-03-15', 5);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

DROP TABLE IF EXISTS `shows`;
CREATE TABLE `shows` (
  `id` int(5) NOT NULL,
  `duration` int(5) NOT NULL,
  `hall` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `duration`, `hall`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `showMovieId` int(5) NOT NULL,
  `tickets` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `showMovieId`, `tickets`) VALUES
(1, 'user test', 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showmovies`
--
ALTER TABLE `showmovies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showmovies_ibfk_1` (`movieId`),
  ADD KEY `showmovies_ibfk_2` (`showId`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shows_ibfk_1` (`hall`),
  ADD KEY `shows_ibfk_2` (`duration`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showMovieId` (`showMovieId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `showmovies`
--
ALTER TABLE `showmovies`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `showmovies`
--
ALTER TABLE `showmovies`
  ADD CONSTRAINT `showmovies_ibfk_1` FOREIGN KEY (`movieId`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `showmovies_ibfk_2` FOREIGN KEY (`showId`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`hall`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`duration`) REFERENCES `durations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`showMovieId`) REFERENCES `showmovies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
