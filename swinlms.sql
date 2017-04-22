-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 12:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swinlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `description`, `date`, `user_id`, `unit_id`) VALUES
(3, 'asfcs sdvs ef ', '2017-04-22 01:13:22', 4, 1),
(4, 'asc ac', '2017-04-22 05:04:28', 4, 2),
(5, 'sdfsgf', '2017-04-22 10:07:27', 4, 3),
(6, 'ascV', '2017-04-22 05:30:13', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `unit_id`, `title`, `file`, `description`, `type`, `size`) VALUES
(1, 1, 'material 1', NULL, 'material', NULL, NULL),
(2, 2, 'material 3', NULL, 'material material material ', NULL, NULL),
(3, 3, 'material 5', NULL, 'material material 3', NULL, NULL),
(4, 4, 'material 2', NULL, 'material 12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `unit_id`, `title`, `file`, `description`, `type`, `size`) VALUES
(1, 1, 'assignment 1', NULL, 'akb iashfc iajc', NULL, NULL),
(2, 2, 'assignment 3', NULL, 'adasd fdcasf', NULL, NULL),
(3, 3, 'assignment 2', NULL, 'acf adfc', NULL, NULL),
(4, 4, 'assignment 1', NULL, 'asdl ascd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `section` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `grade_id`, `user_id`, `unit_id`, `section`) VALUES
(1, 'qwdd', NULL, 4, 1, '04:14:05'),
(2, 'asd dasd', NULL, 4, 2, '05:07:26'),
(3, 'adad', NULL, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `user_id`) VALUES
(1, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `code`, `description`) VALUES
(1, 'computer science', 'BCS', 'asdgiacmb asluigdi ausgdjv kuasgdc kausgd'),
(2, 'information conputer technology', 'BICT', 'awd ioagsd tydas ojas');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `mark` int(3) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `unit_id`, `title`, `file`, `description`, `type`, `size`) VALUES
(1, 1, 'week 2', '', 'lecture 2', '', 0),
(2, 2, 'week 5', '', 'lecture 5', '', 0),
(3, 3, 'week 3', NULL, 'lecture 3', NULL, NULL),
(4, 4, 'week 5', NULL, 'lecture 5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `done` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`id`, `name`, `user_id`, `done`, `created`, `date`) VALUES
(3, 'sdfvac', 1, 0, '2017-04-21 13:04:08', '2017-04-27'),
(4, 'dfadas', 2, 0, '2017-04-21 13:04:27', '2017-04-27'),
(6, 'FSDFV', 4, 0, '2017-04-22 08:29:09', '2017-04-26'),
(7, 'wfxvxcvag adfvg', 5, 0, '2017-04-22 05:27:38', '2017-04-26'),
(8, 'asdcasc', 4, 0, '2017-04-22 12:28:05', '2017-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `unit_id`, `title`, `file`, `description`, `type`, `size`) VALUES
(1, 1, 'week 1', NULL, 'tutorial 1', NULL, NULL),
(2, 2, 'week 3', NULL, 'tutorial 3', NULL, NULL),
(3, 3, 'week 5', NULL, 'tutorial 5', NULL, NULL),
(4, 4, 'week 6', NULL, 'tutorial 6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `code`, `description`, `grade_id`, `class_id`, `course_id`) VALUES
(1, 'software engineering project a', 'swe40001', 'final year project a', NULL, NULL, 1),
(2, 'software engineering project b', 'swe40002', 'final year project b', NULL, NULL, 1),
(3, 'network admin', 'NA', 'networking', NULL, NULL, 2),
(4, 'computer system configuration', 'CSC', 'configuration', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `course` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login_id`, `password`, `created`, `type`, `email`, `first_name`, `last_name`, `address`, `contact`, `course`, `department`, `dob`, `photo`) VALUES
(1, '123', 'qwe123', '2017-04-21 13:03:44', 'ADMIN', 'qwe@gmail.com', 'hello', 'world', 'asd12ecasd', 1324567891, NULL, NULL, NULL, NULL),
(2, '456', 'asd456', '2017-04-21 13:03:49', 'ADMIN', 'rty@gmail.com', 'hi', 'world', 'asd12ecasd', 1324567891, NULL, NULL, NULL, NULL),
(3, '789', 'zxc789', '2017-04-21 13:03:50', 'ADMIN', 'zxc@gmail.com', 'lo', 'world', 'asd12ecasd', 1324567891, NULL, NULL, NULL, NULL),
(4, '1234', 'qwer', '2017-04-22 03:27:19', 'lecturer', 'asdf@gmail.com', 'asdf', 'zxcv', 'dcffawf', 1234567891, NULL, NULL, NULL, NULL),
(5, '5678', 'tyui', '2017-04-22 09:11:29', 'student', 'zxcv@gmail.com', 'tyui', 'ghjk', 'fsd vxb', 1293871263, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`unit_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`) USING BTREE;

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`user_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `announcements_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classroom` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `lecture_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classroom` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
