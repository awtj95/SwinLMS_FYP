-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 10:07 AM
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
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `description`, `date`, `unit_id`) VALUES
(15, '<p>announcement 1</p>', '2017-04-26 16:02:21', 1),
(16, '<p>\r\n\r\nannouncement 2<br></p>', '2017-04-26 16:02:26', 1),
(17, '<p>\r\n\r\nannouncement 3<br></p>', '2017-04-26 16:02:35', 2),
(18, '<p>\r\n\r\nannouncement 4<br></p>', '2017-04-26 16:02:41', 2),
(19, '<p>\r\n\r\nannouncement 5<br></p>', '2017-04-26 16:02:51', 3),
(20, '<p>\r\n\r\nannouncement 6<br></p>', '2017-04-26 16:02:56', 3),
(21, '<p>\r\n\r\nannouncement 7<br></p>', '2017-04-26 16:03:03', 4),
(22, '<p>\r\n\r\nannouncement 8</p>', '2017-04-26 16:03:10', 4);

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
(6, 1, 'assessment 2', '34122-assessment-2.rtf', '<p>test 2</p>', 'application/msword', 0),
(7, 1, 'assessment 1', '92644-assessment-1.rtf', '<p>test 1</p>', 'application/msword', 0),
(8, 2, 'assessment 3', '59899-assessment-3.rtf', '<p>assessment 3<br></p>', 'application/msword', 0),
(9, 2, 'assessment 4', '99094-assessment-4.rtf', '<p>assessment 4<br></p>', 'application/msword', 0),
(10, 4, 'assessment 7', '17003-assessment-7.rtf', '<p>assessment 7<br></p>', 'application/msword', 0),
(11, 4, 'assessment 8', '85758-assessment-8.rtf', '<p>assessment 8<br></p>', 'application/msword', 0),
(12, 3, 'assessment 5', '11124-assessment-5.rtf', '<p>assessment 5<br></p>', 'application/msword', 0),
(13, 3, 'assessment 6', '54379-assessment-6.rtf', '<p>assessment 6<br></p>', 'application/msword', 0);

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
(5, 1, 'assignment 1', '3815-assignement-1.rtf', '<p>test 1</p>', 'application/msword', 0),
(6, 1, 'assignment 2', '42031-assignement-2.rtf', '<p>test 2</p>', 'application/msword', 0),
(7, 2, 'assignment 3', '70033-assignement-3.rtf', '<p>assignment 3<br></p>', 'application/msword', 0),
(8, 2, 'assignment 4', '99149-assignement-4.rtf', '<p>assignment 4<br></p>', 'application/msword', 0),
(9, 3, 'assignment 5', '8894-assignement-5.rtf', '<p>assignment 5<br></p>', 'application/msword', 0),
(10, 3, 'assignment 6', '37188-assignement-6.rtf', '<p>assignment 6<br></p>', 'application/msword', 0),
(11, 4, 'assignment 7', '32116-assignement-7.rtf', '<p>assignment 7<br></p>', 'application/msword', 0),
(12, 4, 'assignment 8', '59274-assignement-8.rtf', '<p>assignment 8<br></p>', 'application/msword', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submission`
--

CREATE TABLE `assignment_submission` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_submission`
--

INSERT INTO `assignment_submission` (`id`, `unit_id`, `user_id`, `title`, `file`, `type`, `size`) VALUES
(1, 2, 3, 'assignment 3', '72592-index.php', 'application/octet-stream', 5),
(2, 4, 3, 'assignment 7', '59733-admin.sql', 'application/octet-stream', 7);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `section` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classroom_id`, `grade_id`, `user_id`, `unit_id`, `section`) VALUES
(1, 1, NULL, 4, 1, NULL),
(2, 2, NULL, 4, 2, NULL),
(3, 2, NULL, 3, 2, NULL),
(4, 3, NULL, 4, 3, NULL),
(5, 4, NULL, 4, 4, NULL),
(6, 4, NULL, 3, 4, NULL),
(7, 1, NULL, 5, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `classroom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `classroom`) VALUES
(2, 'A456'),
(4, 'A654'),
(1, 'B123'),
(3, 'G453');

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
  `file` varchar(100) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `unit_id`, `title`, `file`, `description`, `type`, `size`) VALUES
(14, 1, 'lecture 1', '75226-lecture-1.rtf', '<p>test 1</p>', 'application/msword', 0),
(15, 1, 'lecture 2', '23287-lecture-2.rtf', '<p>test 2</p>', 'application/msword', 0),
(16, 2, 'lecture 3', '30212-lecture-3.rtf', '<p>lecture 3<br></p>', 'application/msword', 0),
(17, 2, 'lecture 4', '59086-lecture-4.rtf', '<p>lecture 4<br></p>', 'application/msword', 0),
(18, 3, 'lecture 5', '57065-lecture-5.rtf', '<p>lecture 5<br></p>', 'application/msword', 0),
(19, 3, 'lecture 6', '28415-lecture-6.rtf', '<p>lecture 6<br></p>', 'application/msword', 0),
(20, 4, 'lecture 7', '3909-lecture-7.rtf', '<p>lecture 7<br></p>', 'application/msword', 0),
(21, 4, 'lecture 8', '41412-lecture-8.rtf', '<p>lecture 8<br></p>', 'application/msword', 0);

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
(7, 'wfxvxcvag adfvg', 5, 0, '2017-04-22 05:27:38', '2017-04-26'),
(11, 'do 1', 4, 0, '2017-04-26 16:13:05', '2017-04-27'),
(12, 'do 2', 4, 0, '2017-04-26 16:13:12', '2017-04-28'),
(15, 'asdkb', 3, 0, '2017-04-27 14:13:21', '2017-04-28');

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
(6, 1, 'tutorial 1', '28233-tutorial-1.rtf', '<p>test 1</p>', 'application/msword', 0),
(7, 1, 'tutorial 2', '27463-tutorial-2.rtf', '<p>test 2</p>', 'application/msword', 0),
(8, 2, 'tutorial 3', '18242-tutorial-3.rtf', '<p>tutorial 3<br></p>', 'application/msword', 0),
(9, 2, 'tutorial 4', '7308-tutorial-4.rtf', '<p>tutorial 4<br></p>', 'application/msword', 0),
(10, 4, 'tutorial 7', '87218-tutorial-7.rtf', '<p>tutorial 7<br></p>', 'application/msword', 0),
(11, 4, 'tutorial 8', '4667-tutorial-8.rtf', '<p>tutorial 8<br></p>', 'application/msword', 0),
(12, 3, 'tutorial 5', '20429-tutorial-5.rtf', '<p>tutorial 5<br></p>', 'application/msword', 0),
(13, 3, 'tutorial 6', '66295-tutorial-6.rtf', '<p>tutorial 6<br></p>', 'application/msword', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial_submission`
--

CREATE TABLE `tutorial_submission` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial_submission`
--

INSERT INTO `tutorial_submission` (`id`, `unit_id`, `user_id`, `title`, `file`, `type`, `size`) VALUES
(10, 2, 3, 'tutorial 3', '88728-admin.sql', 'application/octet-stream', 7);

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
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `code`, `description`, `grade_id`, `course_id`) VALUES
(1, 'software engineering project a', 'swe40001', 'final year project a', NULL, 1),
(2, 'software engineering project b', 'swe40002', 'final year project b', NULL, 1),
(3, 'network admin', 'NA', 'networking', NULL, 2),
(4, 'computer system configuration', 'CSC', 'configuration', NULL, 2);

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
(5, '5678', 'tyui', '2017-04-22 09:11:29', 'student', 'zxcv@gmail.com', 'tyui', 'ghjk', 'fsd vxb', 1293871263, NULL, NULL, NULL, NULL),
(6, '12345', 'qfscfx', '2017-04-28 02:12:13', 'student', 'as@gmail.com', 'a', 's', 'srgvsdv', 1234567891, NULL, NULL, NULL, NULL),
(7, '3463', 'gddbSg', '2017-04-28 02:22:12', 'student', 'sdf@gmail.com', 'sd', 'f', 'wrsgrsdf', 1345162469, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`unit_id`) USING BTREE;

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
-- Indexes for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `classroom_id` (`classroom_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classroom` (`classroom`);

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
-- Indexes for table `tutorial_submission`
--
ALTER TABLE `tutorial_submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grade_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tutorial_submission`
--
ALTER TABLE `tutorial_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE;

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
-- Constraints for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD CONSTRAINT `assignment_submission_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_submission_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_4` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`) ON UPDATE CASCADE;

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
-- Constraints for table `tutorial_submission`
--
ALTER TABLE `tutorial_submission`
  ADD CONSTRAINT `tutorial_submission_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tutorial_submission_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
