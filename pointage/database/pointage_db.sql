-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2018 at 03:48 AM
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
-- Database: `pointage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_tbl`
--

CREATE TABLE `log_tbl` (
  `log_id` int(50) NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(10) NOT NULL,
  `time_in` datetime(6) NOT NULL,
  `time_out` datetime(6) NOT NULL,
  `minutes` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_tbl`
--

INSERT INTO `log_tbl` (`log_id`, `teacher_id`, `status`, `time_in`, `time_out`, `minutes`, `date`) VALUES
(47, 1000, 'out', '2018-05-17 17:56:05.000000', '2018-05-17 23:41:02.000000', 423.767, '2018-05-17'),
(48, 1001, 'out', '2018-05-17 17:55:50.000000', '2018-05-17 23:41:38.000000', 356.383, '2018-05-14'),
(49, 1001, 'out', '2018-05-17 17:55:12.000000', '2018-05-17 18:04:31.000000', 9.31667, '2018-05-17'),
(50, 1000, 'out', '2018-05-18 18:21:31.000000', '2018-05-18 18:23:49.000000', 52.4667, '2018-05-18'),
(51, 1001, 'out', '2018-05-18 18:51:52.000000', '2018-05-18 23:06:34.000000', 254.7, '2018-05-18'),
(52, 1000, 'out', '2018-05-19 17:35:01.000000', '2018-05-19 17:40:04.000000', 60.8667, '2018-05-19'),
(53, 1001, 'in', '2018-05-19 17:41:35.000000', '2018-05-19 17:35:12.000000', 885.749, '2018-05-19'),
(54, 1003, 'in', '2018-05-19 17:00:54.000000', '2018-05-19 16:01:18.000000', 56, '2018-05-19'),
(55, 1000, 'out', '2018-05-20 19:01:25.000000', '2018-05-20 19:08:49.000000', 28.3167, '2018-05-20'),
(56, 1001, 'out', '2018-05-20 19:01:46.000000', '2018-05-20 19:08:34.000000', 6.8, '2018-05-20'),
(57, 1003, 'in', '2018-05-20 19:11:10.000000', '2018-05-20 19:08:24.000000', 0.35, '2018-05-20'),
(58, 1000, 'in', '2018-05-22 14:05:04.000000', '2018-05-22 14:01:30.000000', 748.933, '2018-05-22'),
(59, 1001, 'out', '2018-05-22 14:01:46.000000', '2018-05-22 14:05:16.000000', 5.63333, '2018-05-22'),
(60, 1000, 'in', '2018-05-23 23:21:10.000000', '2018-05-23 23:21:03.000000', 748.766, '2018-05-23'),
(61, 1001, 'in', '2018-05-23 22:42:21.000000', '2018-05-23 22:42:15.000000', 702.533, '2018-05-23'),
(62, 1003, 'in', '2018-05-23 22:57:39.000000', '2018-05-23 22:57:33.000000', 3.88333, '2018-05-23'),
(63, 1005, 'in', '2018-05-23 23:16:44.000000', '2018-05-23 23:16:39.000000', 8.5, '2018-05-23'),
(64, 1000, 'in', '2018-05-24 15:30:06.000000', '2018-05-24 15:30:06.000000', 0, '2018-05-24'),
(65, 1000, 'out', '2018-05-25 01:29:14.000000', '2018-05-25 02:02:35.000000', 35.0833, '2018-05-25'),
(66, 1001, 'in', '2018-05-25 02:47:20.000000', '2018-05-25 02:25:36.000000', 42.45, '2018-05-25'),
(67, 1003, 'out', '2018-05-25 01:46:51.000000', '2018-05-25 02:12:00.000000', 25.15, '2018-05-25'),
(68, 1004, 'out', '2018-05-25 02:09:17.000000', '2018-05-25 02:12:05.000000', 2.8, '2018-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE `teacher_tbl` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `married` char(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`teacher_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `degree`, `salary`, `married`, `phone`, `email`) VALUES
(1000, 'Yameen', 'Bashir', 'MAle', '1985-03-05', 'Lahore', 'Master', 1500, 'No', '015 871 787', 'yameen.like@gmail.com'),
(1001, 'Jenifer', 'Doe', 'female', '1986-03-08', 'Lahore', 'Bachelor', 1500, 'no', '965588445555', 'attarehman@gmail.com'),
(1003, 'Maria', 'Atif', 'female', '0000-11-30', 'Lahore', 'Bachelor', 1000, 'yes', '204055568425', 'maria@gmail.com'),
(1004, 'Mohamed', 'Zarroug', 'male', '1995-05-12', 'rue saad benani ', 'Bachelor', 10, 'female', '29255840585', 'medy484@gmail.com'),
(1005, 'conan', 'obraian', 'male', '2018-05-24', 'lkdb qzkdb  qdz', 'Bachelor', 10, 'no', '100000000000', 'lqq@gmail.com'),
(1006, 'a', 'a', 'male', '2009-05-01', 'aaaaaaaaaaaaaaaaaa', 'Master', 10, 'yes', '11111111111111', 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `u_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'Admin'),
(4, 'med', 'ffffff', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_tbl`
--
ALTER TABLE `log_tbl`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
  MODIFY `log_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_tbl`
--
ALTER TABLE `log_tbl`
  ADD CONSTRAINT `fk_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
