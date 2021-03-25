-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 09:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_student_details`
--

CREATE TABLE `tb_student_details` (
  `id` int(11) NOT NULL,
  `student_name` varchar(55) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_student_details`
--

INSERT INTO `tb_student_details` (`id`, `student_name`, `status`, `added_date`, `updated_date`) VALUES
(1, 'kalidas', '1', '2021-03-22 20:49:46', '2021-03-22 21:43:32'),
(2, 'test', '0', '2021-03-22 21:05:35', '2021-03-22 21:45:01'),
(3, 'check', '1', '2021-03-22 21:33:27', '2021-03-22 21:45:14'),
(4, 'check hgfh', '1', '2021-03-22 21:46:43', '2021-03-22 21:54:17'),
(5, 'htes das', '1', '2021-03-25 09:18:35', '2021-03-25 09:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student_marks`
--

CREATE TABLE `tb_student_marks` (
  `mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `mark_1` int(11) NOT NULL,
  `mark_2` int(11) NOT NULL,
  `mark_3` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `result` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-fail,1-Pass',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_student_marks`
--

INSERT INTO `tb_student_marks` (`mark_id`, `student_id`, `mark_1`, `mark_2`, `mark_3`, `total`, `rank`, `result`, `status`, `added_date`, `updated_date`) VALUES
(1, 1, 50, 22, 33, 11, 22, '0', '1', '2021-03-22 20:49:48', '2021-03-22 21:43:33'),
(2, 2, 11, 11, 111, 111, 112, '1', '0', '2021-03-22 21:05:35', '2021-03-22 21:45:01'),
(3, 3, 11, 11, 12, 22, 22, '0', '1', '2021-03-22 21:33:27', '2021-03-22 21:45:14'),
(4, 4, 11, 11, 22, 33, 33, '1', '1', '2021-03-22 21:46:43', '2021-03-22 21:54:17'),
(5, 5, 19, 33, 44, 55, 66, '1', '1', '2021-03-25 09:18:35', '2021-03-25 09:19:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_student_details`
--
ALTER TABLE `tb_student_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_student_marks`
--
ALTER TABLE `tb_student_marks`
  ADD PRIMARY KEY (`mark_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_student_details`
--
ALTER TABLE `tb_student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_student_marks`
--
ALTER TABLE `tb_student_marks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
