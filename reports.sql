-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2017 at 03:53 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `issue` varchar(200) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `details` varchar(200) NOT NULL,
  `line` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `issue`, `startdate`, `enddate`, `details`, `line`, `user_id`, `status_id`) VALUES
(1, 'Issue1s', '2017-06-23 08:15:24', '2017-07-02 05:22:31', 'None', 1, 2, 1),
(5, 'Issue363', '2017-06-28 12:10:37', '2017-07-05 13:00:41', 'Nones', 4, 1, 1),
(11, 'Issue2', '2017-06-28 12:10:37', '2017-07-04 13:00:41', 'Nonec', 3, 1, 1),
(12, 'Issue4', '2017-07-04 12:45:56', '2017-07-05 15:07:57', '', 1, 1, 3),
(18, 'issue6', '2017-07-10 18:00:46', '2017-07-10 15:15:48', '', 2, 1, 2),
(19, 'Issue3v', '2017-06-28 18:00:06', '2017-06-29 18:00:10', 'Nionv', 3, 4, 2),
(20, 'Issue1s', '2017-07-14 15:50:17', '0000-00-00 00:00:00', 'ghghhg', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'open'),
(2, 'in progress'),
(3, 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Jane', 'Daw', 'janeday@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'John', 'Doe', 'johndoe@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Jonny', 'Boy', 'jonnyboy@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Joy', 'Joy', 'joy@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Jon', 'Snow', 'snow@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
