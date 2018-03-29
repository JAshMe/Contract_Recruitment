-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 07:15 PM
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
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `emp_code` varchar(500) NOT NULL,
  `emp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `verify` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `email`, `password`, `verify`) VALUES
('2018JR00001', 'test@test.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1'),
('2018JR00002', 't@test.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `dob` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `pwd` varchar(500) NOT NULL,
  `f_name` varchar(500) NOT NULL,
  `m_name` varchar(500) NOT NULL,
  `marital_status` varchar(500) NOT NULL,
  `domicile` varchar(500) NOT NULL,
  `nationality` varchar(500) NOT NULL,
  `corr_address` varchar(5000) NOT NULL,
  `place_of_application` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pwd_type` varchar(500) DEFAULT NULL,
  `id_type` varchar(500) NOT NULL,
  `id_no` varchar(500) NOT NULL,
  `emp_code` varchar(500) NOT NULL,
  `emp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `dob`, `gender`, `category`, `pwd`, `f_name`, `m_name`, `marital_status`, `domicile`, `nationality`, `corr_address`, `place_of_application`, `mobile`, `address`, `pwd_type`, `id_type`, `id_no`, `emp_code`, `emp`) VALUES
('2018JR00002', 'Jyot Mehta', '2006-03-15', 'm', 'UR', 'n', 'A Mehta', 'Y Mehta', 'single', 'Gujarat', 'Indian', '', 'inside india', '7235857289', '', 'NA', 'AADHAR', '123456789', '', 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
