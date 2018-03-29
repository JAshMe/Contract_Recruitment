-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 08:41 PM
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
-- Table structure for table `10th_mark`
--

CREATE TABLE `10th_mark` (
  `user_id` varchar(20) NOT NULL,
  `completion_date` date NOT NULL,
  `board` varchar(30) NOT NULL,
  `school` varchar(30) NOT NULL,
  `per_or_cgpa` tinyint(1) NOT NULL,
  `Value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `12th_mark`
--

CREATE TABLE `12th_mark` (
  `user_id` varchar(20) NOT NULL,
  `completion_date` date NOT NULL,
  `school` varchar(30) NOT NULL,
  `board` varchar(30) NOT NULL,
  `per_or_cgpa` tinyint(1) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diploma`
--

CREATE TABLE `diploma` (
  `user_id` varchar(20) NOT NULL,
  `field` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `university` varchar(30) NOT NULL,
  `per_or_val` tinyint(1) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pg`
--

CREATE TABLE `pg` (
  `user_id` varchar(20) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `completion_date` date NOT NULL,
  `university` varchar(30) NOT NULL,
  `per_or_cgpa` tinyint(1) NOT NULL,
  `value` double NOT NULL,
  `degree` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ug`
--

CREATE TABLE `ug` (
  `user_id` varchar(20) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `completion_date` date NOT NULL,
  `university` varchar(30) NOT NULL,
  `per_or_cgpa` tinyint(1) NOT NULL,
  `value` double NOT NULL,
  `degree` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
