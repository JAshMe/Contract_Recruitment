-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 03:28 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

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
-- Table structure for table `final_apply`
--

CREATE TABLE `final_apply` (
  `user_id` varchar(25) NOT NULL,
  `pos1` tinyint(1) NOT NULL,
  `pos2` tinyint(1) NOT NULL,
  `pos3` tinyint(1) NOT NULL,
  `pos4` tinyint(1) NOT NULL,
  `pos5` tinyint(1) NOT NULL,
  `pos6` tinyint(1) NOT NULL,
  `pos7` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_apply`
--

INSERT INTO `final_apply` (`user_id`, `pos1`, `pos2`, `pos3`, `pos4`, `pos5`, `pos6`, `pos7`) VALUES
('2018JR00001', 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `final_apply`
--
ALTER TABLE `final_apply`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
