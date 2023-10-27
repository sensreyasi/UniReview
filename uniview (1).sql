-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 08:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniview`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES
('Robin Mojumder', 'reahifhdifl', 'iodfjefhoeg', 'fojrogjOPRJhROj');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `rev_name` varchar(50) NOT NULL,
  `uni_name` varchar(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `details` longtext NOT NULL,
  `published` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `rev_name`, `uni_name`, `dept_name`, `details`, `published`) VALUES
(2, 'Admin', 'NSU', 'CSE', 'With this, we can create, read, update and delete topics. \r\n\r\nThanks for your patience. In the next part, we add a form for creating posts. We use ckeditor to give a user the ability to add styling to texts, images, and lists.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `u_type` enum('Author','Admin') DEFAULT 'Author'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `email`, `password`, `institution`, `country`, `u_type`) VALUES
('Mr', 'Admin', 'Admin@admin.com', '12345678', 'MBSTU', 'Dhaka', 'Admin'),
('Nusher', 'Kazi', 'nusher@gmail.com', '12345678', 'NSU', 'Bangladesh', 'Author'),
('Reaj', 'Ahmed', 'reajulbd786@gmail.com', '12345678', 'JU', 'Dhaka', 'Author'),
('Reaj', 'Islam', 'reajulbd@gmail.com', '12345678', 'BUP', 'Bangladesh', 'Author');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
