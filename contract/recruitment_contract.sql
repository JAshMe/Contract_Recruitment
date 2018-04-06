-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 07:48 PM
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
  `marks` double NOT NULL,
  `max_marks` int(11) NOT NULL,
  `per_or_cgpa` tinyint(1) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `10th_mark`
--

INSERT INTO `10th_mark` (`user_id`, `completion_date`, `board`, `school`, `marks`, `max_marks`, `per_or_cgpa`, `value`) VALUES
('2018JR00001', '2013-04-05', 'CBSE', 'DIPS', 8.2, 10, 0, 8.2),
('2018JR00001r', '2013-04-14', 'CBSE', 'Adani DAV Public School', 9.8, 10, 0, 98.00000000000001);

-- --------------------------------------------------------

--
-- Table structure for table `12th_mark`
--

CREATE TABLE `12th_mark` (
  `user_id` varchar(20) NOT NULL,
  `completion_date` date NOT NULL,
  `board` varchar(30) NOT NULL,
  `school` varchar(30) NOT NULL,
  `marks` double NOT NULL,
  `max_marks` int(11) NOT NULL,
  `per_or_cgpa` tinyint(1) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `12th_mark`
--

INSERT INTO `12th_mark` (`user_id`, `completion_date`, `board`, `school`, `marks`, `max_marks`, `per_or_cgpa`, `value`) VALUES
('2018JR00001', '2015-04-12', 'CBSE', 'Nalanda Academy', 481, 500, 1, 96.2);

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
  `marks` double NOT NULL,
  `max_marks` int(11) NOT NULL,
  `per_or_cgpa` tinyint(1) NOT NULL,
  `value` double NOT NULL,
  `is_others` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eligible`
--

CREATE TABLE `eligible` (
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
-- Dumping data for table `eligible`
--

INSERT INTO `eligible` (`user_id`, `pos1`, `pos2`, `pos3`, `pos4`, `pos5`, `pos6`, `pos7`) VALUES
('2018JR00001', 0, 1, 1, 0, 0, 1, 0);

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
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `user_id` varchar(500) NOT NULL,
  `nat_emp` varchar(50) NOT NULL,
  `organisation` varchar(5000) NOT NULL,
  `position` varchar(500) NOT NULL,
  `emp_type` varchar(500) NOT NULL,
  `from` varchar(500) NOT NULL,
  `to` varchar(500) NOT NULL,
  `pay` varchar(500) DEFAULT NULL,
  `agp` varchar(500) DEFAULT NULL,
  `basic_pay` varchar(500) NOT NULL,
  `nature` varchar(500) NOT NULL,
  `emoluments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`user_id`, `nat_emp`, `organisation`, `position`, `emp_type`, `from`, `to`, `pay`, `agp`, `basic_pay`, `nature`, `emoluments`) VALUES
('2018JR00001', 'ad_hoc', 'MNNIT', 'Director', 'gov', '2001-10-14', '03-31-2018', '', '', '100000', 'Management', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `user_id` varchar(500) NOT NULL,
  `id` int(11) NOT NULL,
  `organisation` varchar(5000) NOT NULL,
  `position` varchar(500) NOT NULL,
  `emp_type` varchar(500) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `pay` varchar(500) NOT NULL,
  `nature` varchar(500) NOT NULL,
  `tot_exp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`user_id`, `id`, `organisation`, `position`, `emp_type`, `from`, `to`, `pay`, `nature`, `tot_exp`) VALUES
('2018JR00001', 1, 'jdkldsk', 'daflasdj', 'private', '2018-08-15', '2023-08-16', '12345', 'sdfgsdf', '1827'),
('2018JR00001', 2, 'fgf', 'dfbdf', 'gov', '2018-04-19', '2020-12-05', '12345', 'sfgaf', '961');

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

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `verify` varchar(5) NOT NULL DEFAULT '0',
  `otp_sent` bigint(20) NOT NULL COMMENT 'EPOCH time stored when OTP generated',
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `email`, `password`, `verify`, `otp_sent`, `otp`) VALUES
('2018JR00001', 'kooljyot@gmail.com', '5be1e0c84c1daf3055903614b262fccaca95bd99cd10dbd523468db1ddee7637', '1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `other_info`
--

CREATE TABLE `other_info` (
  `user_id` varchar(500) NOT NULL,
  `info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_info`
--

INSERT INTO `other_info` (`user_id`, `info`) VALUES
('2018JR00001', '');

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
  `marks` double NOT NULL,
  `max_marks` int(11) NOT NULL,
  `per_or_cgpa` tinyint(1) NOT NULL,
  `value` double NOT NULL,
  `degree` varchar(30) NOT NULL,
  `is_others` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `pincode` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `user_id`, `name`, `designation`, `address`, `city`, `pincode`, `mobile`, `email`) VALUES
(16, '2018JR00001', 'sdfgn', 'fcvbn', 'dfbn', 'vb', '123456', '1234567890', 'dfnadsn@fkaskfm'),
(18, '2018JR00001', 'asdfgbn', 'dsfbn', 'sdfgn', 'sdfbn', '123456', '1234567890', 'afjks@fjsj');

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
  `marks` double NOT NULL,
  `max_marks` int(11) NOT NULL,
  `per_or_cgpa` tinyint(1) NOT NULL,
  `value` double NOT NULL,
  `degree` varchar(30) NOT NULL,
  `is_others` varchar(30) NOT NULL,
  `is_others_spec` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ug`
--

INSERT INTO `ug` (`user_id`, `specialization`, `start_date`, `completion_date`, `university`, `marks`, `max_marks`, `per_or_cgpa`, `value`, `degree`, `is_others`, `is_others_spec`) VALUES
('2018JR00001', 'Others', '2015-07-29', '2017-07-29', 'MNNIT', 9.04, 10, 0, 90.4, 'BA', '0', 'asdfvbnm');

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
('2018JR00001', 'Jyot Mehta', '1997-12-31', 'm', 'UR', 'n', 'A Mehta', 'Y Mehta', 'single', 'Gujarat', 'Indian', 'MNNIT', 'inside india', '7235857289', 'MNNIT', 'NA', 'AADHAR', '123456789', '', 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `10th_mark`
--
ALTER TABLE `10th_mark`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `12th_mark`
--
ALTER TABLE `12th_mark`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `diploma`
--
ALTER TABLE `diploma`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `eligible`
--
ALTER TABLE `eligible`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_apply`
--
ALTER TABLE `final_apply`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `other_info`
--
ALTER TABLE `other_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pg`
--
ALTER TABLE `pg`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ug`
--
ALTER TABLE `ug`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
