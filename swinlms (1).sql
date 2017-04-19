-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 08:21 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swinlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_ID` int(11) unsigned NOT NULL,
  `year` year(4) NOT NULL,
  `grade_ID` int(11) unsigned NOT NULL,
  `section` char(2) NOT NULL,
  `remarks` varchar(45) NOT NULL,
  `lecturer_ID` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE IF NOT EXISTS `class_student` (
  `class_ID` int(11) unsigned NOT NULL,
  `student_ID` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_ID` int(11) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `faculty_ID` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `exam_ID` int(11) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE IF NOT EXISTS `exam_result` (
  `exam_ID` int(11) unsigned NOT NULL,
  `student_ID` int(11) unsigned NOT NULL,
  `unit_ID` int(11) unsigned NOT NULL,
  `marks` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_ID` int(11) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `grade_ID` int(11) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `lecturer_ID` int(11) unsigned NOT NULL,
  `l_email` varchar(45) NOT NULL,
  `l_pass` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `faculty_ID` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newcourse`
--

CREATE TABLE IF NOT EXISTS `newcourse` (
  `course_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `code` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newcourse`
--

INSERT INTO `newcourse` (`course_id`, `name`, `code`) VALUES
(1, '', 0),
(2, 'LANGUAGE ', 123);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parent_ID` int(11) unsigned NOT NULL,
  `p_email` varchar(45) NOT NULL,
  `p_pass` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `job_desc` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_ID` int(11) unsigned NOT NULL,
  `s_email` varchar(45) NOT NULL,
  `s_pass` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `parent_ID` int(11) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course_ID` int(11) unsigned NOT NULL,
  `age` int(10) NOT NULL,
  `city` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_ID` int(11) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `grade_ID` int(11) unsigned NOT NULL,
  `course_ID` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `student_ID` int(10) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Dob` varchar(45) NOT NULL,
  `Age` int(15) NOT NULL,
  `Contact` int(10) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Country` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`student_ID`, `Firstname`, `LastName`, `Dob`, `Age`, `Contact`, `Email`, `Address`, `City`, `Country`) VALUES
(1, '', '', '', 0, 0, '', '', '', ''),
(2, '', '', '', 0, 0, '', '', '', ''),
(3, '', '', '', 0, 0, '', '', '', ''),
(4, '', '', '', 0, 0, '', '', '', ''),
(5, '', '', '', 0, 0, '', '', '', ''),
(6, '', '', '', 0, 0, '', '', '', ''),
(7, '', '', '', 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_login_id` varchar(65) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_type` char(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `address` varchar(65) NOT NULL,
  `contact` int(15) NOT NULL,
  `course_depart` varchar(15) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `photo` varchar(150) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_ID`), ADD UNIQUE KEY `lecturer_ID` (`lecturer_ID`), ADD UNIQUE KEY `grade_ID` (`grade_ID`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD UNIQUE KEY `student_ID` (`student_ID`), ADD UNIQUE KEY `class_ID` (`class_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_ID`), ADD UNIQUE KEY `faculty_ID` (`faculty_ID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_ID`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`exam_ID`), ADD UNIQUE KEY `unit_ID` (`unit_ID`), ADD UNIQUE KEY `student_ID` (`student_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_ID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_ID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_ID`), ADD UNIQUE KEY `faculty_ID` (`faculty_ID`);

--
-- Indexes for table `newcourse`
--
ALTER TABLE `newcourse`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_ID`), ADD UNIQUE KEY `parent_ID` (`parent_ID`), ADD UNIQUE KEY `course_ID` (`course_ID`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_ID`), ADD UNIQUE KEY `grade_ID` (`grade_ID`), ADD UNIQUE KEY `course_ID` (`course_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`student_ID`), ADD UNIQUE KEY `student_ID` (`student_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `lecturer_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newcourse`
--
ALTER TABLE `newcourse`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `student_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`grade_ID`) REFERENCES `grade` (`grade_ID`),
ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`lecturer_ID`) REFERENCES `lecturer` (`lecturer_ID`);

--
-- Constraints for table `class_student`
--
ALTER TABLE `class_student`
ADD CONSTRAINT `class_student_ibfk_1` FOREIGN KEY (`class_ID`) REFERENCES `class` (`class_ID`),
ADD CONSTRAINT `class_student_ibfk_2` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`faculty_ID`) REFERENCES `faculty` (`faculty_ID`);

--
-- Constraints for table `exam_result`
--
ALTER TABLE `exam_result`
ADD CONSTRAINT `exam_result_ibfk_1` FOREIGN KEY (`exam_ID`) REFERENCES `exam` (`exam_ID`),
ADD CONSTRAINT `exam_result_ibfk_2` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`),
ADD CONSTRAINT `exam_result_ibfk_3` FOREIGN KEY (`unit_ID`) REFERENCES `unit` (`unit_ID`);

--
-- Constraints for table `lecturer`
--
ALTER TABLE `lecturer`
ADD CONSTRAINT `lecturer_ibfk_1` FOREIGN KEY (`faculty_ID`) REFERENCES `faculty` (`faculty_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`parent_ID`) REFERENCES `parent` (`parent_ID`),
ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`),
ADD CONSTRAINT `unit_ibfk_2` FOREIGN KEY (`grade_ID`) REFERENCES `grade` (`grade_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
