-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2022 at 10:27 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entertainment`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `year` year DEFAULT NULL,
  `platform` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `length` tinyint UNSIGNED DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`name`, `year`, `platform`, `length`, `rating`) VALUES
('The Legend of Zelda: Ocarina of Time', 1998, 'Nintendo 64', 43, '4.59'),
('Monster Hunter 4 Ultimate', 2015, 'Nintendo 3DS', 80, '4.56'),
('Super Mario World', 1990, 'Super Nintendo', 26, '4.54'),
('Shadow of the Colossus', 2005, 'Playstation 2', 22, '4.50'),
('The Legend of Zelda: Breath of the Wild', 2017, 'Nintendo Switch', 80, '4.56');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `year` year DEFAULT NULL,
  `runtime` tinyint UNSIGNED DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`name`, `year`, `runtime`, `rating`) VALUES
('The Shawshank Redemption', 1994, 142, '9.3'),
('The Godfather', 1972, 175, '9.2'),
('12 Angry Men', 1957, 96, '9.0'),
('Pulp Fiction', 1994, 154, '8.9'),
('The Lord of the Rings: The Return of the King', 2003, 201, '9.0');

-- --------------------------------------------------------

--
-- Table structure for table `tv_shows`
--

CREATE TABLE `tv_shows` (
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `start` year DEFAULT NULL,
  `end` year DEFAULT NULL,
  `runtime` tinyint UNSIGNED DEFAULT NULL,
  `episodes` tinyint UNSIGNED DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tv_shows`
--

INSERT INTO `tv_shows` (`name`, `start`, `end`, `runtime`, `episodes`, `rating`) VALUES
('Breaking Bad', 2008, 2013, 49, 62, '9.5'),
('The Sopranos', 1999, 2007, 55, 86, '9.2'),
('Friends', 1994, 2004, 22, 235, '8.9'),
('Game of Thrones', 2011, 2019, 57, 73, '9.2'),
('Rick and Morty', 2013, NULL, 23, 61, '9.2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
