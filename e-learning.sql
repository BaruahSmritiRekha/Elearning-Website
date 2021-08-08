-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3325
-- Generation Time: Jan 01, 2021 at 05:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_user` varchar(40) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_contant` text NOT NULL,
  `comment_category` varchar(20) NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_user`, `comment_date`, `comment_contant`, `comment_category`, `category_id`) VALUES
(1, 'somraj karki', '2020-12-29 05:08:24', 'Informative pdf', 'pdf', 26),
(2, 'somraj karki', '2020-12-29 05:08:59', 'Clear explanation', 'image', 41),
(3, 'somraj karki', '2020-12-29 05:09:26', 'Thanks for the video..', 'video', 62),
(4, 'somraj karki', '2020-12-29 05:30:39', 'Nice video', 'video', 67),
(5, 'sekhar jyoti', '2020-12-29 05:33:27', 'Good video', 'video', 67),
(6, 'somraj karki', '2021-01-01 05:41:03', 'Thanks', 'image', 43),
(7, 'somraj karki', '2021-01-01 05:42:36', 'Thanks', 'image', 43),
(8, 'somraj karki', '2021-01-01 05:42:49', 'Thank you', 'image', 43);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(10) NOT NULL,
  `image_title` varchar(40) NOT NULL,
  `image_name` varchar(20) NOT NULL,
  `image_content` varchar(500) NOT NULL,
  `image_tags` varchar(100) NOT NULL,
  `image_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_title`, `image_name`, `image_content`, `image_tags`, `image_datetime`, `owner`) VALUES
(41, 'DSA 1', 'index (2).jpeg', '', 'dsa', '2020-12-29 09:57:30', 'somrajsomrajkar@gmail.com'),
(42, 'DSA 2', 'index (4).jpeg', '', 'dsa', '2020-12-29 09:57:40', 'somrajsomrajkar@gmail.com'),
(43, 'DSA 3', 'index (3).jpeg', '', 'dsa', '2020-12-29 09:57:47', 'somrajsomrajkar@gmail.com'),
(44, 'DSA 4', 'index (5).jpeg', '', 'dsa', '2020-12-29 09:57:52', 'somrajsomrajkar@gmail.com'),
(45, 'DSA 5', 'index (1).jpeg', '', 'dsa', '2020-12-29 09:57:57', 'somrajsomrajkar@gmail.com'),
(46, 'DSA 6', 'index.jpeg', '', 'dsa', '2020-12-29 09:58:02', 'somrajsomrajkar@gmail.com'),
(47, 'DSA 7', 'index4.jpeg', '', 'dsa', '2020-12-29 09:59:15', 'somrajsomrajkar@gmail.com'),
(48, 'DSA 8', 'maxresdefault.jpg', '', 'dsa', '2020-12-29 10:00:16', 'somrajsomrajkar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `pdf_id` int(10) NOT NULL,
  `pdf_title` varchar(60) NOT NULL,
  `pdf_name` varchar(80) NOT NULL,
  `pdf_tags` varchar(100) NOT NULL,
  `pdf_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`pdf_id`, `pdf_title`, `pdf_name`, `pdf_tags`, `pdf_datetime`, `owner`) VALUES
(26, 'DataStructureAndAlgorithms', 'Introduction to Algorithms, Third Edition ( PDFDrive ).pdf', 'dsa', '2020-12-29 09:35:05', 'somrajsomrajkar@gmail.com'),
(27, 'TheoryOfComputation', 'An Introduction to Formal Languages and Automata, 5th Edition ( PDFDrive ).pdf', 'tc', '2020-12-29 09:44:42', 'sekharsekharjyoti@gmail.com'),
(28, 'OperatingSystems', 'Operating System Concepts ( PDFDrive ).pdf', 'os', '2020-12-29 09:52:06', 'smritismritibaruah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(255) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(15) NOT NULL,
  `pin` int(10) NOT NULL,
  `branch` varchar(25) NOT NULL,
  `selector` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `firstname`, `lastname`, `email`, `password`, `address`, `gender`, `city`, `state`, `pin`, `branch`, `selector`) VALUES
(1, 'somraj', 'karki', 'somrajkar@gmail.com', 'somrajkarki', 'null', 'Male', 'Guwahati', 'Assam', 12345, 'computer', 'Teacher'),
(2, 'sekhar', 'jyoti', 'sekharjyoti@gmail.com', 'sekharjyoti', 'null', 'Male', 'null', 'Assam', 0, 'computer', 'Teacher'),
(3, 'smriti', 'baruah', 'smritibaruah@gmail.com', 'smritibaruah', 'null', 'Female', 'null', 'Assam', 0, 'computer', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(10) NOT NULL,
  `video_title` varchar(40) NOT NULL,
  `video_name` varchar(500) NOT NULL,
  `video_content` varchar(500) NOT NULL,
  `video_tags` varchar(100) NOT NULL,
  `video_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `video_title`, `video_name`, `video_content`, `video_tags`, `video_datetime`, `owner`) VALUES
(62, 'DSA Episode 1', '1 Introduction_to_data_structures(720p).mp4', '', 'dsa', '2020-12-29 09:47:31', 'somrajsomrajkar@gmail.com'),
(63, 'DSA Episode 2', '2 Data_Structures-_List_as_abstract_data_type(720p).mp4', '', 'dsa', '2020-12-29 09:47:39', 'somrajsomrajkar@gmail.com'),
(64, 'Computation 1', '1Introduction_to_Theory_of_Computation(480p).mp4', '', 'tc', '2020-12-29 09:45:49', 'sekharsekharjyoti@gmail.com'),
(65, 'Computation 2', '2Finite_State_Machine_(Prerequisites)(480p).mp4', '', 'tc', '2020-12-29 09:46:30', 'sekharsekharjyoti@gmail.com'),
(66, 'Computation 3', '3Finite_State_Machine_(Finite_Automata)(480p).mp4', '', 'tc', '2020-12-29 09:46:49', 'sekharsekharjyoti@gmail.com'),
(67, 'OS episode 1', '1Operating_System_Syllabus_Discussion_for_GATE_and_UGC_Net(720p).mp4', '', 'os', '2020-12-29 09:50:34', 'smritismritibaruah@gmail.com'),
(68, 'OS episode 2', '2Introduction_to_Operating_System_and_its_Functions__Operating_System(720p).mp4', '', 'os', '2020-12-29 09:50:59', 'smritismritibaruah@gmail.com'),
(69, 'OS episode 3', '3Multiprogramming_vs_Multitasking_Operating_System__Operating_System(720p).mp4', '', 'os', '2020-12-29 09:51:14', 'smritismritibaruah@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`pdf_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `pdf_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
