-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 10:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmpe281`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(5) NOT NULL,
  `project_name` varchar(30) NOT NULL,
  `project_start_date` date NOT NULL,
  `project_end_date` date NOT NULL,
  `project_description` varchar(500) NOT NULL,
  `project_estimated_effort` int(10) NOT NULL,
  `skill_required` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_start_date`, `project_end_date`, `project_description`, `project_estimated_effort`, `skill_required`) VALUES
(1, 'Project1', '2017-05-01', '2017-05-31', 'Test Project Desc', 15, 'Mobile testing, Android,Cloud Testing'),
(2, 'Project 2', '2017-05-03', '2017-05-27', 'Test Project 2 Desc', 20, 'Cloud Database testing, Web Services testing'),
(22, 'Project twitter', '2017-01-01', '2017-05-31', 'Twitter Read', 20, 'sql'),
(23, 'Project facebook', '2017-01-01', '2017-05-31', 'facebook Read', 20, 'sql'),
(24, 'Project snapchat', '2017-01-01', '2017-05-31', 'snapchat Read', 20, 'sql'),
(25, 'Project disease', '2017-01-01', '2017-05-31', 'disease Read', 20, 'sql'),
(26, 'Project report', '2017-01-01', '2017-05-31', 'Report Read', 20, 'sql'),
(27, 'Project agriculture', '2017-01-01', '2017-05-31', 'agriculture Read', 20, 'sql'),
(28, 'Project waste removal', '2017-01-01', '2017-05-31', 'waste removal Read', 20, 'sql'),
(29, 'Project product use', '2017-01-01', '2017-05-31', 'product use Read', 20, 'sql');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(1) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'tester'),
(2, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `experience` int(3) NOT NULL,
  `supervisor_id` int(10) DEFAULT NULL,
  `role_id` int(2) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `skill` varchar(200) NOT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `experience`, `supervisor_id`, `role_id`, `user_rating`, `skill`, `password`) VALUES
(1, 'tester1', 'terster1@gmail.com', 5, 0, 1, 4, 'java,python,sql', NULL),
(2, 'Manager1', 'terster1@gmail.com', 5, 0, 2, 4, 'manual testing, selenium', NULL),
(3, 'Manish Kumar Pandey', 'manish.pandey@sjsu.edu', 6, NULL, 1, 0, '', 'd1c8f4eeee43d6ca28fc76d0aac612a94fde16baa97099c7d7d3683e0ec67b44'),
(4, 'Saumya Bhasin', 'saumya.bhasin@sjsu.edu', 4, NULL, 1, 0, 'Auromation Testing,Database Testing,Python', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');

-- --------------------------------------------------------

--
-- Table structure for table `users_project`
--

CREATE TABLE `users_project` (
  `user_id` int(4) NOT NULL,
  `project_id` int(5) NOT NULL,
  `project_start_date` date NOT NULL,
  `project_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_project`
--

INSERT INTO `users_project` (`user_id`, `project_id`, `project_start_date`, `project_end_date`) VALUES
(0, 0, '0000-00-00', '0000-00-00'),
(1, 1, '2017-05-01', '2017-05-31'),
(2, 2, '2017-05-02', '2017-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
