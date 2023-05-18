-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2022 at 08:22 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sessiondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `pass`) VALUES
(1, 'zohaibhassan22002@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `postid` int(11) NOT NULL,
  `post` text NOT NULL,
  `topic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sn` int(100) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`postid`, `post`, `topic`, `email`, `sn`, `time`) VALUES
(24, 'afsadv', 'movies', 'asfdgas@otlook.com', 4, '2022-02-17 17:25:21'),
(25, 'sdbsb', 'movies', 'asfdgas@otlook.com', 4, '2022-02-17 17:25:26'),
(26, 'sdabsadbsdabsfb', 'movies', 'asfdgas@otlook.com', 4, '2022-02-17 17:25:31'),
(27, 'wtyqhqhh', 'movies', 'asfdgas@otlook.com', 4, '2022-02-17 17:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postno` int(11) NOT NULL,
  `post` text NOT NULL,
  `topic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sn` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postno`, `post`, `topic`, `email`, `sn`, `time`) VALUES
(1, 'homerun blah blah nalh', 'movies', 'asfdgas@otlook.com', 4, '2022-02-17 15:05:33'),
(2, 'My favourite movie is godfather.', 'movies', 'abc@gmail.com', 2, '2022-02-17 14:59:27'),
(3, 'Imran Khan is the current PM of Pakistan.', 'politics', 'abc@gmail.com', 2, '2022-02-17 14:59:48'),
(4, 'Real Madrid lost 1-0 to PSG in the UCL round of 16.', 'sports', 'abc@example.com', 3, '2022-02-17 15:00:33'),
(5, 'icecream is a classic dessert. ', 'other', 'abc@example.com', 3, '2022-02-17 15:01:01'),
(6, 'aff', 'movies', 'asfdgas@otlook.com', 4, '2022-02-17 16:10:29'),
(7, 'whehehh', 'other', 'asfdgas@otlook.com', 4, '2022-02-17 16:17:50'),
(8, 'safadssddsabsab', 'politics', 'zohaib4@gmail.com', 9, '2022-02-18 14:06:06'),
(9, 'qwertyuiopasdfghjklzxcvbnm', 'movies', 'zohaib9@gmail.com', 10, '2022-02-18 14:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `email`) VALUES
(1, 'sindh', 'zohaib9@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sn` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `email`, `pass`, `age`) VALUES
(2, 'abc@gmail.com', '$2y$10$uig.BUUJkC99NqPN4xuJbOdxbUv4i0Ag1u7.EsZyu7HnooP8RMrbq', 18),
(3, 'abc@example.com', '$2y$10$r0upAfJV.JQW8pkHdqbDH.cVku8mwinDuhsF6oenwsDuNdeUnufLW', 19),
(4, 'asfdgas@otlook.com', '$2y$10$f4I.26x7wLHcGk6AYrFv1.Us6Bx4YwsVHvkG.Qjw7X9YqeUefAZPi', 19),
(5, 'zohaibkhan22002@gmail.com', '$2y$10$Z0mcFZ1MgcmmjmDY1R5z9OVX1uxvDi.gG.PVr7mpiz538yEd/Qrnu', 19),
(6, 'zohaib@gmail.com', '$2y$10$zqRb66v3Ubpp9aYcRD2n3uCDwze4mdxtSSx6rmnkZRKKk0I1HExl.', 19),
(7, 'zohaib2@gmail.com', '$2y$10$fK4NMhP7kfe9PmeInV9rke17DTequAEDOfKPkwWJl6xzTIBwKJUJC', 19),
(8, 'zohaib3@gmail.com', '$2y$10$qo58yPqnx0TRfnPZsON56OAF2S6XNe6e5dR9xQkJ2sUH.ANyixdMe', 19),
(9, 'zohaib4@gmail.com', '$2y$10$2niCEBjaTE3SGkXjCb11.OnkumZ0iMcwYyvA1GnTUgpDR5dXkbgAK', 19),
(10, 'zohaib9@gmail.com', '$2y$10$/hwtqtWJr/0pZFVyWbISSenNK9gq5rTNdelNF4OD4oxObvhM/SQE2', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postno`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
