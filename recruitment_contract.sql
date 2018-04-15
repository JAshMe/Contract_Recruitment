-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 12:17 PM
-- Server version: 5.5.56-MariaDB
-- PHP Version: 5.6.32

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
('2018JR00005', '2016-01-01', 'cb', 'spring', 85, 90, 1, 94.44),
('2018JR00008', '2003-06-25', 'UP BOARD', 'SATHIOAN INTERMEDIATE COLLEGE', 278, 500, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `12th_mark`
--

CREATE TABLE `12th_mark` (
  `user_id` varchar(30) NOT NULL,
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
('2018JR00001', '2015-04-12', 'CBSE', 'Nalanda Academy', 481, 500, 1, 96.2),
('2018JR00004', '2003-01-01', 'isc', 'sjc', 77, 100, 1, 77),
('2018JR00005', '2017-06-13', 'cbse', 's', 12, 20, 0, 0.6);

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
('OBC', 'n', 100),
('SC', 'n', 100),
('UR', 'y', 100),
('OBC', 'y', 100),
('SC', 'y', 100),
('ST', 'n', 100),
('ST', 'y', 100),
('UR', 'n', 100);

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

--
-- Dumping data for table `diploma`
--

INSERT INTO `diploma` (`user_id`, `field`, `start_date`, `end_date`, `university`, `marks`, `max_marks`, `per_or_cgpa`, `value`, `is_others`) VALUES
('2018JR00004', 'DT', '2006-01-01', '2008-01-01', 'au', 9, 10, 0, 85.5, '0');

-- --------------------------------------------------------

--
-- Table structure for table `dpg`
--

CREATE TABLE `dpg` (
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
-- Table structure for table `dug`
--

CREATE TABLE `dug` (
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
-- Dumping data for table `dug`
--

INSERT INTO `dug` (`user_id`, `specialization`, `start_date`, `completion_date`, `university`, `marks`, `max_marks`, `per_or_cgpa`, `value`, `degree`, `is_others`, `is_others_spec`) VALUES
('2018JR00001', 'Law', '2018-02-14', '2022-05-03', 'MNNIT', 9.3, 10, 0, 0.93, 'LLB', '0', '');

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
('2018JR00001', 1, 1, 1, 1, 1, 1, 1),
('2018JR00004', 1, 1, 1, 1, 1, 1, 1),
('2018JR00005', 1, 1, 1, 1, 1, 1, 1),
('2018JR00006', 1, 1, 1, 1, 1, 1, 1),
('2018JR00008', 1, 1, 1, 1, 1, 1, 1),
('2018JR00009', 1, 1, 1, 1, 1, 1, 1),
('2018JR00011', 1, 1, 1, 1, 1, 1, 1);

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
('2018JR00004', 'ad_hoc', 'mnnit a', 'ar', 'gov', '2014-01-01', '04-09-2018', 'PB 3', '5400', '58000', 'rec', 70000);

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
('2018JR00001', 2, 'fgf', 'dfbdf', 'gov', '2018-04-19', '2020-12-05', '12345', 'sfgaf', '961'),
('2018JR00004', 1, 'ma', 'ct', 'private', '2008-01-01', '2014-01-01', '10 lpa', 'trng', '2192'),
('2018JR00005', 1, 'mnnit', 'ap', 'gov', '2012-12-12', '2013-12-12', '34', 'tea', '365');

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
('2018JR00001', 1, 0, 0, 0, 0, 1, 0),
('2018JR00004', 0, 0, 0, 0, 0, 0, 0),
('2018JR00005', 1, 1, 0, 0, 0, 0, 0),
('2018JR00006', 0, 0, 0, 0, 0, 0, 0),
('2018JR00008', 0, 0, 1, 0, 0, 0, 0),
('2018JR00009', 0, 1, 1, 0, 0, 0, 0),
('2018JR00011', 0, 0, 0, 0, 0, 0, 0);

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
('2018JR00001', 'kooljyot@gmail.com', '5be1e0c84c1daf3055903614b262fccaca95bd99cd10dbd523468db1ddee7637', '1', 0, ''),
('2018JR00002', 'test', 'alfsklfksa', '0', 1234567890, 'test'),
('2018JR00003', 'mailme.jyotmehta@gmail.com', '5be1e0c84c1daf3055903614b262fccaca95bd99cd10dbd523468db1ddee7637', '0', 1523091541, '08419342'),
('2018JR00004', 'ak@mnnit.ac.in', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1', 1523091545, '29026802'),
('2018JR00005', 'd2gupta13@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1', 1523612613, '34271712'),
('2018JR00006', 'jitendrakumar2507@gmail.com', 'de756703ae9422584e66e063824c2ce4baf0d34277db3a36e1bf172acc3ca996', '1', 1523613877, '01871327'),
('2018JR00007', 'anuraagsingh9902@gmail.com', 'e4ec930c0072518feac7358efd383d6d372c0546079123e0ad240460e06be85c', '0', 1523614048, '30479737'),
('2018JR00008', 'rajendrapgdbm3@gmail.com', 'f590dae405100f35cf8a81656373065790ad919adff52ac4d55bde13a29d0b35', '1', 1523614128, '98856979'),
('2018JR00009', 'saurbh.534@gmail.com', 'b82b98261add4f7ac0794e9be5c29aeb6e84ba0235ef52468f722671d93c8620', '1', 1523614684, '70983122'),
('2018JR00010', 'anuragsinghMNNIT9902@gmail.com', '523a4f68ef49fcdae654466f67d374eba59ad81c3dc07dfa7cacc6e6e3ff8ff4', '0', 1523614839, '06098564'),
('2018JR00011', 'divyak@mnnit.ac.in', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1', 1523629036, '34073402');

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
(22, '2018JR00004', 'ac', 'sup', 'ma', 'alld', '021111', '9888888800', 'akc@mnnit.ac.in'),
(27, '2018JR00001', 'bdzb', 'dxc', 'scv', 'svsdv', '123456', '1234567890', 'fgfd@bb'),
(28, '2018JR00001', 'bfgg', 'bdfb', 'fsdf', 'vfvd', '123456', '1234567890', 'fgsdfgd@fdfsf'),
(29, '2018JR00005', 'dr', 'ap', 'mnnit', 'allahabad', '244001', '9411095353', 'divyak@mnnit.ac.in'),
(30, '2018JR00005', 'dr2', 'ap', 'mnnit', 'Allahabad', '244001', '9411095353', 'divyak@mnnit.ac.in');

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
('2018JR00001', 'Computer Science', '2015-07-29', '2017-07-29', 'MNNIT', 9.04, 10, 0, 0.9039999999999999, 'B.Tech', '0', ''),
('2018JR00004', 'ECE', '2006-01-01', '2008-01-01', 'au', 8.8, 10, 0, 83.6, 'B.Tech', '0', '');

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
('2018JR00001', 'Jyot Mehta', '1997-12-31', 'm', 'UR', 'n', 'A Mehta', 'Y Mehta', 'single', 'Gujarat', 'Indian', 'MNNIT', 'inside india', '7235857289', 'MNNIT', 'NA', 'AADHAR', '123456789', '', 'n'),
('2018JR00004', 'manas', '1990-04-20', 'm', 'UR', 'y', 'sri A', 'SA', 'married', 'Allahabad', 'indian', 'allahabad', 'outside india', '9453029733', 'allahabad', 'VH', 'AADHAR', '999999999', '', 'n'),
('2018JR00005', 'Dr. Jyoti Gupta', '1987-11-15', 'm', 'UR', 'n', 'Jyoti', 'Madhu', 'single', 'UP', 'India', '2/85, Buddhi Vihar\r\nAvas Vikas Colony, Majhola', 'NA', '9411095353', '2/85, Buddhi Vihar\r\nAvas Vikas Colony, Majhola', 'NA', 'AADHAR', '785507135413', 'NA', 'NA'),
('2018JR00008', 'RAJENDRA KUMAR YADAV', '1986-06-08', 'm', 'OBC', 'n', 'PHOOL CHAND YADAV', 'SAVITRI YADAV', 'married', 'UTTAR PRA', 'INDIAN', '27 LIG TYPE 2 ADA COLONY NEW JHUNSI ALLAHABAD-211019 (UP)', 'NA', '9305103316', '27 LIG TYPE 2 ADA COLONY NEW JHUNSI ALLAHABAD-211019 (UP)', 'OH', 'AADHAR', '813809952193', 'NA', 'NA'),
('2018JR00009', 'SAURBH KUMAR SRIVASTAVA', '1985-08-20', 'm', 'UR', 'n', 'SHIV MOHAN SRIVASTAVA', 'URMILA SRIVASTAVA', 'married', 'U.P.', 'INDIAN', '534 NEW SOHBATIYA BAG ALLAHABAD PINCODE -211006', 'NA', '9532879879', '534 NEW SOHBATIYA BAG ALLAHABAD PINCODE -211006', 'OH', 'AADHAR', '808981276746', 'NA', 'NA');

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
-- Indexes for table `dpg`
--
ALTER TABLE `dpg`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `dug`
--
ALTER TABLE `dug`
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
  ADD PRIMARY KEY (`user_id`,`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_ref` (`user_id`);

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
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `10th_mark`
--
ALTER TABLE `10th_mark`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `12th_mark`
--
ALTER TABLE `12th_mark`
  ADD CONSTRAINT `user_id_12th` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diploma`
--
ALTER TABLE `diploma`
  ADD CONSTRAINT `user_id_dip` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eligible`
--
ALTER TABLE `eligible`
  ADD CONSTRAINT `user_id_eligible` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `user_id_emp` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `user_id_exp` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_apply`
--
ALTER TABLE `final_apply`
  ADD CONSTRAINT `user_id_fin` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_info`
--
ALTER TABLE `other_info`
  ADD CONSTRAINT `user_id_other` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pg`
--
ALTER TABLE `pg`
  ADD CONSTRAINT `user_id_pg` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `user_id_ref` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ug`
--
ALTER TABLE `ug`
  ADD CONSTRAINT `user_id_ug` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_id_user` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
