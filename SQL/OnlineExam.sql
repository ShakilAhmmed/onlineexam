-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 08:30 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OnlineExam`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(2, 'Tamim Ahmmed', 'tamim@codebool.com', '12345', 'Active'),
(5, 'Shakil ', 'admin@gmail.com', 'MTIzNDU=', 'Active'),
(7, 'Super Admin', 'superadmin@gmail.com', 'MTIzNDU2', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `Exam`
--

CREATE TABLE `Exam` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Exam`
--

INSERT INTO `Exam` (`id`, `exam_name`, `subject`, `status`) VALUES
(1, '1st Term Exam', 'Html', 'Active'),
(2, '2nd Term Exam', 'Javascript', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `corr` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`id`, `exam_name`, `subject`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `corr`, `status`) VALUES
(1, '1st Term Exam', 'Html', 'What Is HTML Stand For?', 'Hyper Text Markup Language', 'Hyper Link', 'Highest Link Word Wrap', 'High Text Model Language', 'Hyper Text Markup Language', 'Active'),
(2, '1st Term Exam', 'Html', 'What Is The Full Meaning Of JS?', 'JAVASCRIPT', 'JAVA', 'JAVA SECTION', 'JAVA SECURITY', 'JAVASCRIPT', 'Active'),
(4, '1st Term Exam', 'Html', 'What Language used for responsive design?', 'bootstrap', 'jquery', 'ajax', 'php', 'bootstrap', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `Setup`
--

CREATE TABLE `Setup` (
  `id` int(11) NOT NULL,
  `school_name` varchar(25) NOT NULL,
  `school_email` varchar(255) NOT NULL,
  `school_address` varchar(255) NOT NULL,
  `school_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Setup`
--

INSERT INTO `Setup` (`id`, `school_name`, `school_email`, `school_address`, `school_logo`) VALUES
(1, 'Feni Computer Institute', 'fci@gmail.com', 'New Ranirhat', 'images/Setup/1507398840.png');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `status`) VALUES
(4, 'Kopika', 'kopika@gmail.com', '$2y$10$kdN7h6CcXvN7H0h0PHLjEOZ96B.1iskvuTWPk94l1DqB8cOdQ3vRK          ', 'Active'),
(5, 'Shakil Ahmmed', 'shakil@codebool.com', '$2y$10$iQSwPdw8m5F.Nxo7usqPKOsabGDP1V89f7NrQxl3yEsmbt/mATNGW', 'Active'),
(6, 'Sayada Mahbuba', 'mahbuba@gmail.com', 'MTIzNDU=', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Exam`
--
ALTER TABLE `Exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Setup`
--
ALTER TABLE `Setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Exam`
--
ALTER TABLE `Exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Setup`
--
ALTER TABLE `Setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
