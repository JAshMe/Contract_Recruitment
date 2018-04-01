-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 01:57 PM
-- Server version: 10.1.31-MariaDB
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
-- Database: `recruitment_contract`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_relax`
--

CREATE TABLE `age_relax` (
  `cat` varchar(30) NOT NULL COMMENT 'Category',
  `isPWD` varchar(1) NOT NULL,
  `rel` int(11) NOT NULL COMMENT 'Age Relaxation'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `age_relax`
--

INSERT INTO `age_relax` (`cat`, `isPWD`, `rel`) VALUES
('OBC', 'n', 3),
('SC', 'n', 5),
('UR', 'y', 10),
('OBC', 'y', 13),
('SC', 'y', 15),
('ST', 'n', 5),
('ST', 'y', 15),
('UR', 'n', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
