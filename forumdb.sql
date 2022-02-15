-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 10:02 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `comment` varchar(240) NOT NULL,
  `comment_owner` int(10) NOT NULL,
  `status_comment_owner` int(10) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `comment_owner`, `status_comment_owner`, `comment_time`) VALUES
(1, 'e', 2, 3, '2018-11-12 17:34:42'),
(2, 'd', 2, 2, '2018-11-12 17:35:25'),
(3, 'hello to you!', 2, 9, '2018-11-12 17:43:48'),
(4, 'a', 2, 9, '2018-11-12 21:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(10) NOT NULL,
  `status` varchar(240) NOT NULL,
  `status_owner` int(10) NOT NULL,
  `status_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`, `status_owner`, `status_time`) VALUES
(1, 'Hi! Does someone know when will we continue regular classes? Thank you!', 2, '2018-11-12 12:43:02'),
(3, 'Hello', 2, '2018-11-12 14:36:27'),
(4, 'Hello', 2, '2018-11-12 14:37:59'),
(5, 'Hello', 2, '2018-11-12 14:43:01'),
(6, 'Hello', 2, '2018-11-12 14:44:24'),
(7, 'Halo', 9, '2018-11-12 15:05:03'),
(8, 'Halo', 9, '2018-11-12 15:10:25'),
(9, 'hi', 9, '2018-11-12 15:55:51'),
(10, 'he', 2, '2018-11-12 21:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `contact_no`, `user_type`) VALUES
(1, 'admin', 'pass123', 'admin@gmail.com', '09123678910', 1),
(2, 'mik', 'mik', 'mik@gmail.com', 'mik', 2),
(9, 'mikael', 'asda', 'asda@gmail.com', 'a', 2),
(10, 'alliah', '12345', 'alliah@gmail.com', 'vxzcgzz', 2),
(11, 'mika', 'mika', 'mika@gmail.com', 'wala', 2),
(13, 'sa', 'ilalim', 'ng@puting.com', 'ilaw', 2),
(26, 'hey', 'mama', 'wew@gmail.com', 'wala', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
