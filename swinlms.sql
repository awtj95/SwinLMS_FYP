-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 12:48 PM
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
(1, 1, 'assessment 1', '71416-new-microsoft-excel-worksheet.xlsx', '<p>assessment 1</p>', 'application/vnd.openxmlformats', 6),
(2, 1, 'assessment 2', '61256-new-microsoft-excel-worksheet.xlsx', '<p>assessment 2</p>', 'application/vnd.openxmlformats', 6),
(3, 2, 'assessment 1', '26146-new-microsoft-word-document.docx', '<p>assessment 1</p>', 'application/vnd.openxmlformats', 0),
(4, 2, 'assessment 2', '89172-new-microsoft-word-document.docx', '<p>assessment 2</p>', 'application/vnd.openxmlformats', 0),
(5, 3, 'assessment 1', '1845-new-microsoft-excel-worksheet.xlsx', '<p>assessment 1</p>', 'application/vnd.openxmlformats', 6),
(6, 3, 'assessment 2', '93381-new-microsoft-excel-worksheet.xlsx', '<p>assessment 2</p>', 'application/vnd.openxmlformats', 6),
(7, 4, 'assessment 2', '20858-new-microsoft-excel-worksheet.xlsx', '', 'application/vnd.openxmlformats', 6);

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
(14, 1, 'assignment 1', '35433-new-microsoft-excel-worksheet.xlsx', '<p>assignment 1</p>', 'application/vnd.openxmlformats', 6),
(15, 1, 'assignment 2', '34143-new-microsoft-excel-worksheet.xlsx', '<p>assignment 2<br></p>', 'application/vnd.openxmlformats', 6),
(16, 2, 'assignment 1', '80849-new-microsoft-word-document.docx', '<p>assignment 1</p>', 'application/vnd.openxmlformats', 0),
(17, 2, 'assignment 2', '46784-new-microsoft-word-document.docx', '<p>assignment 2</p>', 'application/vnd.openxmlformats', 0),
(18, 3, 'assignment 1', '51240-new-microsoft-excel-worksheet.xlsx', '<p>assignment 1<br></p>', 'application/vnd.openxmlformats', 6),
(19, 3, 'assignment 2', '23414-new-microsoft-excel-worksheet.xlsx', '<p>assignment 2<br></p>', 'application/vnd.openxmlformats', 6),
(20, 4, 'assignment 1', '18607-new-microsoft-excel-worksheet.xlsx', '<p>assignment 1<br></p>', 'application/vnd.openxmlformats', 6);

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
  `size` int(11) NOT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_submission`
--

INSERT INTO `assignment_submission` (`id`, `unit_id`, `user_id`, `title`, `file`, `type`, `size`, `grade`, `feedback`, `status`) VALUES
(11, 1, 4, 'assignment 1', '73063-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, 'A', 'AA', 'Original'),
(12, 1, 4, 'assignment 2', '53561-new-microsoft-word-document.docx', 'application/vnd.openxmlformats', 0, 'B', 'BB', 'Original'),
(13, 2, 4, 'assignment 1', '25822-new-microsoft-word-document.docx', 'application/vnd.openxmlformats', 0, 'A', 'A', 'Edited'),
(14, 2, 4, 'assignment 2', '33826-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, 'B', 'asdjn asdhb', 'Original'),
(15, 3, 4, 'assignment 1', '60120-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, 'E', 'EE', 'Original'),
(16, 3, 4, 'assignment 2', '72087-new-microsoft-word-document.docx', 'application/vnd.openxmlformats', 0, 'F', 'FF', 'Original'),
(17, 4, 4, 'assignment 1', '89991-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, 'G', 'GG', 'Original'),
(18, 4, 3, 'assignment 1', '3048-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, 'H', 'HH', 'Original'),
(19, 2, 3, 'assignment 1', '28221-new-microsoft-word-document.docx', 'application/vnd.openxmlformats', 0, 'B', 'test', 'Original'),
(20, 2, 3, 'assignment 2', '81834-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, 'J', 'JJ', 'Original'),
(21, 2, 4, 'trying', '66751-left.txt', 'text/plain', 0, 'B', 'b', 'Original'),
(22, 1, 5, 'assignment 1', '56479-assignment-2.pdf', 'application/pdf', 56, '80', 'Good Good', 'Original'),
(23, 4, 6, 'assignment 1', '42524-a1.pdf', 'application/pdf', 162, NULL, NULL, 'Original');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attend` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `unit_id`, `user_id`, `attend`) VALUES
(10, 1, 4, '2017-05-02 16:52:38'),
(11, 2, 4, '2017-05-02 16:58:56'),
(12, 3, 4, '2017-05-02 16:59:24'),
(13, 3, 4, '2017-05-02 16:59:34'),
(23, 4, 4, '2017-05-02 17:01:54'),
(24, 4, 4, '2017-05-02 17:01:55'),
(25, 4, 4, '2017-05-02 17:01:56'),
(26, 1, 4, '2017-05-02 17:14:34'),
(27, 1, 4, '2017-04-04 17:25:59'),
(28, 1, 3, '2017-03-01 17:26:24'),
(29, 4, 3, '2017-05-02 18:09:16'),
(30, 2, 3, '2017-05-02 18:09:35'),
(31, 2, 3, '2017-05-02 18:11:06'),
(32, 2, 3, '2017-05-02 18:12:25'),
(33, 4, 4, '2017-05-02 18:25:56'),
(34, 4, 4, '2017-05-02 18:36:40'),
(35, 2, 4, '2017-05-02 18:36:51'),
(36, 1, 4, '2017-05-04 13:47:11'),
(37, 1, 3, '2017-05-04 13:49:33'),
(38, 1, 4, '2017-05-08 15:21:04'),
(39, 3, 4, '2017-05-10 18:31:39'),
(40, 2, 3, '2017-05-10 18:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `user_id`, `unit_id`, `section_id`) VALUES
(1, 4, 1, 1),
(2, 4, 2, 2),
(3, 4, 3, 3),
(4, 4, 4, 4),
(5, 5, 1, 1),
(6, 5, 3, 3),
(7, 6, 1, 5),
(8, 6, 4, 4),
(9, 7, 2, 2),
(10, 7, 3, 3),
(11, 7, 4, 4);

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
-- Table structure for table `enrolment`
--

CREATE TABLE `enrolment` (
  `id` int(11) NOT NULL,
  `filename` varchar(65) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolment`
--

INSERT INTO `enrolment` (`id`, `filename`, `created`) VALUES
(1, 'ProjectPlan.pdf', '2017-05-22 06:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `title` varchar(65) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `title`, `user_id`) VALUES
(11, '08:00:00', '08:30:00', 'r', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `unit_id`, `classroom_id`, `date`, `start_time`, `end_time`) VALUES
(1, 1, 1, '2017-05-23', '04:00:00', '05:00:00'),
(2, 2, 2, '2017-05-24', '01:00:00', '02:00:00'),
(3, 3, 3, '2017-05-25', '03:00:00', '05:00:00'),
(4, 4, 4, '2017-05-26', '03:00:00', '05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(65) NOT NULL,
  `date` date NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `name`, `amount`, `status`, `date`, `parent_id`) VALUES
(1, 'sam', 100, 'Paid', '2017-05-13', 18),
(2, 'sem1', 100, 'Unpaid', '2017-05-18', 9);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `filename` varchar(65) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `filename`, `created`) VALUES
(7, 'timetable2017S1.docx', '2017-05-17 14:24:56'),
(8, 'Self Checking.docx', '2017-05-17 14:25:30'),
(9, 'questions.docx', '2017-05-21 18:15:41'),
(12, 'ProjectPlan.pdf', '2017-05-22 06:12:17'),
(14, 'A1.pdf', '2017-05-22 10:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `graduation`
--

CREATE TABLE `graduation` (
  `id` int(11) NOT NULL,
  `filename` varchar(65) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `graduation`
--

INSERT INTO `graduation` (`id`, `filename`, `created`) VALUES
(2, 'Software Design Document.pdf', '2017-05-22 06:19:37');

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
(18, 1, 'lecture 1', '10888-new-microsoft-word-document.docx', '<p>lecture 1</p>', 'application/vnd.openxmlformats', 0),
(19, 1, 'lecture 2', '75099-new-microsoft-word-document.docx', '<p>lecture 2</p>', 'application/vnd.openxmlformats', 0),
(20, 2, 'lecture 1', '10284-new-microsoft-excel-worksheet.xlsx', '<p>lecture 1</p>', 'application/vnd.openxmlformats', 6),
(21, 2, 'lecture 2', '21611-new-microsoft-excel-worksheet.xlsx', '<p>lecture 2</p>', 'application/vnd.openxmlformats', 6),
(22, 3, 'lecture 1', '46032-new-microsoft-word-document.docx', '<p>lecture 1</p>', 'application/vnd.openxmlformats', 0),
(23, 3, 'lecture 2', '69443-new-microsoft-word-document.docx', '<p>lecture 2</p>', 'application/vnd.openxmlformats', 0),
(24, 4, 'lecture 1', '94846-new-microsoft-excel-worksheet.xlsx', '', 'application/vnd.openxmlformats', 6);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(11) NOT NULL,
  `id2` int(11) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user1` bigint(11) NOT NULL,
  `user2` bigint(11) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user1read` varchar(3) CHARACTER SET utf8 NOT NULL,
  `user2read` varchar(3) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `id2`, `subject`, `user1`, `user2`, `message`, `time`, `user1read`, `user2read`) VALUES
(1, 1, 'try', 1, 2, 'aonch awdn', '2017-05-10 02:11:20', 'yes', 'yes'),
(1, 2, '', 2, 1, 'dewaewc wf', '2017-05-10 06:19:18', 'yes', 'no'),
(3, 1, 'testing', 4, 3, 'helo', '2017-05-13 13:11:36', 'yes', 'yes'),
(3, 2, '', 4, 0, 'hi', '2017-05-13 13:11:36', '', ''),
(3, 3, '', 3, 0, 'hi', '2017-05-13 13:12:03', '', ''),
(3, 4, '', 4, 0, 'helo', '2017-05-13 13:12:33', '', ''),
(3, 5, '', 3, 0, 'hehe', '2017-05-13 13:13:54', '', ''),
(8, 1, 'he', 4, 345, 'try', '2017-05-21 16:18:09', 'yes', 'no'),
(9, 1, 'he', 4, 345, 'try', '2017-05-21 16:18:28', 'yes', 'no'),
(10, 1, 'hr', 4, 8, 'ttttt', '2017-05-21 16:23:10', 'yes', 'yes'),
(11, 1, 'tete', 4, 345, 'test', '2017-05-21 16:25:24', 'yes', 'no'),
(12, 1, 'warning', 4, 8, 'your son', '2017-05-21 16:45:34', 'yes', 'yes'),
(12, 2, '', 8, 0, 'what happen?', '2017-05-21 16:45:43', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `msg_of_day`
--

CREATE TABLE `msg_of_day` (
  `id` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg_of_day`
--

INSERT INTO `msg_of_day` (`id`, `detail`, `status`) VALUES
(1, 'try', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` int(11) NOT NULL,
  `filename` varchar(65) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`id`, `user_id`, `user_id1`) VALUES
(1, 8, 5),
(2, 8, 7),
(3, 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `section_start_time` time NOT NULL,
  `section_day` varchar(65) NOT NULL,
  `section_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `unit_id`, `classroom_id`, `section_start_time`, `section_day`, `section_duration`) VALUES
(1, 1, 1, '03:00:00', 'wed', 2),
(2, 2, 2, '01:00:00', 'thur', 2),
(3, 3, 3, '05:00:00', 'fri', 3),
(4, 4, 4, '03:00:00', 'mon', 2),
(5, 1, 3, '03:30:00', 'Monday', 2);

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
(15, 'asdkb', 3, 0, '2017-04-27 14:13:21', '2017-04-28'),
(16, 'do 3', 4, 0, '2017-05-02 16:14:47', '0000-00-00');

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
(15, 1, 'tutorial 1', '49675-new-microsoft-word-document.docx', '<p>tutorial 1</p>', 'application/vnd.openxmlformats', 0),
(16, 1, 'tutorial 2', '61316-new-microsoft-word-document.docx', '<p>tutorial 2</p>', 'application/vnd.openxmlformats', 0),
(17, 2, 'tutorial 1', '23354-new-microsoft-excel-worksheet.xlsx', '<p>tutorial 1</p>', 'application/vnd.openxmlformats', 6),
(18, 2, 'tutorial 2', '75697-new-microsoft-excel-worksheet.xlsx', '<p>tutorial 2</p>', 'application/vnd.openxmlformats', 6),
(19, 3, 'tutorial 1', '51947-new-microsoft-word-document.docx', '<p>tutorial 1</p>', 'application/vnd.openxmlformats', 0),
(20, 3, 'tutorial 2', '36711-new-microsoft-word-document.docx', '<p>tutorial 2</p>', 'application/vnd.openxmlformats', 0),
(21, 4, 'tutorial 1', '11704-new-microsoft-word-document.docx', '<p>tutorial 1</p>', 'application/vnd.openxmlformats', 0);

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
  `size` int(11) NOT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial_submission`
--

INSERT INTO `tutorial_submission` (`id`, `unit_id`, `user_id`, `title`, `file`, `type`, `size`, `grade`, `feedback`, `status`) VALUES
(26, 1, 4, 'tutorial 1', '37732-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, '98', 'good', 'Original'),
(27, 1, 4, 'tutorial 2', '60455-new-microsoft-word-document.docx', 'application/vnd.openxmlformats', 0, '39', 'fail', 'Original'),
(28, 2, 4, 'tutorial 1', '54784-new-microsoft-word-document.docx', 'application/vnd.openxmlformats', 0, 'A', 'aA', 'Edited'),
(29, 2, 4, 'tutorial 2', '69048-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, '98', 'as rg', 'Original'),
(30, 3, 4, 'tutorial 1', '16571-new-microsoft-word-document.docx', 'application/vnd.openxmlformats', 0, NULL, NULL, 'Original'),
(31, 3, 4, 'tutorial 2', '24744-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, NULL, NULL, 'Original'),
(32, 4, 4, 'tutorial 1', '63207-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, NULL, NULL, 'Original'),
(33, 4, 3, 'tutorial 1', '79042-new-microsoft-word-document.docx', 'application/vnd.openxmlformats', 0, NULL, NULL, 'Original'),
(34, 2, 3, 'tutorial 1', '7634-new-microsoft-excel-worksheet.xlsx', 'application/vnd.openxmlformats', 6, 'A', 'DDD', 'Original'),
(35, 2, 3, 'tutorial 2', '87036-new-microsoft-word-document.docx', 'application/vnd.openxmlformats', 0, NULL, NULL, 'Original'),
(37, 2, 4, 'try', '81235-left.txt', 'text/plain', 0, NULL, NULL, 'Original'),
(38, 1, 5, 'tutorial 1', '22880-a2.pdf', 'application/pdf', 183, '50', 'Good', 'Original'),
(39, 1, 6, 'tutorial 1', '79078-a1-handout.pdf', 'application/pdf', 67, NULL, NULL, 'Original');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `code`, `description`, `course_id`) VALUES
(1, 'software engineering project a', 'swe40001', 'final year project a', 1),
(2, 'software engineering project b', 'swe40002', 'final year project b', 1),
(3, 'network admin', 'NA', 'networking', 2),
(4, 'computer system configuration', 'CSC', 'configuration', 2);

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
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `postcode` int(10) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `contact` int(11) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `egname` varchar(50) DEFAULT NULL,
  `egemail` varchar(50) DEFAULT NULL,
  `egcontact` varchar(15) DEFAULT NULL,
  `relationship` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login_id`, `password`, `created`, `type`, `email`, `first_name`, `last_name`, `address`, `city`, `country`, `postcode`, `phone`, `contact`, `department`, `dob`, `photo`, `egname`, `egemail`, `egcontact`, `relationship`) VALUES
(1, 'qwe', 'qwe123', '2017-04-21 13:03:44', 'admin', 'qwe@gmail.com', 'hello', 'world', 'asd12ecasd', 'kuching', 'sarawak', 93250, 1234567890, 1324567891, NULL, '2017-05-10', NULL, 'sdfc', 'd@s.com', '4567', 'cousin'),
(2, '456', 'asd456', '2017-04-21 13:03:49', 'admin', 'rty@gmail.com', 'hi', 'world', 'asd12ecasd', 'kuching', 'sarawak', 93250, 1234567890, 1324567891, NULL, '2017-05-10', NULL, 'uhvjhb', 'd@s.com', '876543', 'cousin'),
(3, '78', 'zxcs', '2017-04-21 13:03:50', 'admin', 'zxs@gmail.com', 'ls', 'work', 'jalan simpang tige', 'kuching', 'sarawak', 93250, 1234567890, 1324567891, NULL, '2017-04-10', NULL, 'hvjbh', 'd@s.com', '23459', 'cousin'),
(4, '1234', '123456', '2017-04-22 03:27:19', 'lecturer', 'asdf@gmail.com', 'as', 'zxcv', 'dcffa', 'kuching', 'sarawak', 93330, 987654321, 123456789, NULL, '2017-05-17', NULL, 'h', 'l', '1467292591', 'cousin'),
(5, '5678', 'tyui', '2017-04-22 09:11:29', 'student', 'zxcv@gmail.com', 'tyui', 'ghjk', 'fsd vxb', 'kuching', 'sarawak', 93250, 1234567890, 1293871263, NULL, '2017-05-15', NULL, 'asdn asn', 'd@s.com', '123459', 'cousin'),
(6, '12345', 'qfscfx', '2017-04-28 02:12:13', 'student', 'as@gmail.com', 'a', 's', 'srgvsdv', 'kuching', 'sarawak', 93250, 1234567890, 1234567891, NULL, '2017-05-03', NULL, 'asdn asknd', 'd@s.com', '345865', 'cousin'),
(7, '3463', 'gddbSg', '2017-04-28 02:22:12', 'student', 'sdf@gmail.com', 'sd', 'f', 'wrsgrsdf', 'kuching', 'sarawak', 93250, 1234567890, 1345162469, NULL, '2017-05-09', NULL, 'afav', 'd@s.com', '13486', 'cousin'),
(8, '345', 'asknc12', '2017-05-17 02:00:00', 'parent', 'pa@gmail.com', 'pa', 'rent', 'aksdn asnd asdn', NULL, NULL, NULL, NULL, 1237874527, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '9876', 'qwen123', '2017-05-17 11:09:00', 'parent', 'as@gmail.com', 'as', 'parent', 'asd AD ASKN ', NULL, NULL, NULL, NULL, 1236846273, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `section_id_2` (`section_id`);

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
-- Indexes for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `classroom_id` (`classroom_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graduation`
--
ALTER TABLE `graduation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `msg_of_day`
--
ALTER TABLE `msg_of_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id1` (`user_id`),
  ADD KEY `user_id2` (`user_id1`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `classroom_id` (`classroom_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `enrolment`
--
ALTER TABLE `enrolment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `graduation`
--
ALTER TABLE `graduation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `msg_of_day`
--
ALTER TABLE `msg_of_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tutorial_submission`
--
ALTER TABLE `tutorial_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_5` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `lecture_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `relation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_ibfk_2` FOREIGN KEY (`user_id1`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
