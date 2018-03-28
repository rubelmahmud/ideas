-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 06:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tests`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(30) DEFAULT NULL,
  `category_desc` varchar(100) DEFAULT NULL,
  `ideas_closer_date` date DEFAULT NULL,
  `ideas_final_closer_date` date DEFAULT NULL,
  `created_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `ideas_closer_date`, `ideas_final_closer_date`, `created_time`) VALUES
(1, 'Joan Livingston', 'Voluptas non laboriosam et dolore quidem occaecat non id perspiciatis dolore quisquam', '1998-06-02', '1983-05-02', '2018-03-25'),
(2, 'Library', 'A', '2018-04-11', '2018-05-01', '2018-03-14'),
(3, 'Sports', 'B', '2018-04-20', '2018-05-05', '2018-03-19'),
(4, 'Faculty', 'C', '2018-04-17', '2018-05-15', '2018-03-19'),
(5, 'Education', 'D', '2018-03-20', '2018-04-20', '2018-03-19'),
(6, 'Club', 'E', '2018-03-30', '2018-04-10', '2018-03-19'),
(10, 'Neve Miles', 'F', '1970-08-17', '1974-02-10', '2018-03-16'),
(18, 'Tucker Wade', 'Voluptatibus tenetur debitis in accusantium nihil consequatur tempor explicabo Omnis quae illo conse', '1999-08-09', '1977-05-17', '2018-03-16'),
(19, 'C', 'AA', '2018-03-22', '2018-03-22', '2018-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(15) NOT NULL,
  `comment_description` varchar(150) DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_type` int(5) NOT NULL DEFAULT '0' COMMENT '0-public, 1-private',
  `ideas_number` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_description`, `comment_time`, `comment_type`, `ideas_number`, `user_id`) VALUES
(54, 'Hi', '2018-03-25 03:18:09', 0, 47, 6),
(55, 'test', '2018-03-25 03:23:03', 1, 50, 6),
(56, 'staff', '2018-03-25 03:23:29', 0, 50, 5),
(57, 'test', '2018-03-25 05:12:21', 0, 50, 6),
(58, 'comment', '2018-03-26 07:44:48', 0, 46, 6),
(59, 'Anno comment                      ', '2018-03-26 07:44:56', 1, 46, 6),
(60, 'Comment                 ', '2018-03-26 08:10:46', 0, 52, 6),
(61, 'qqqq                ', '2018-03-26 08:12:34', 0, 52, 5),
(63, 'Comm\r\n', '2018-03-26 08:58:03', 0, 52, 5),
(64, 'anno                          ', '2018-03-26 09:12:25', 1, 52, 6),
(65, 'aaaa                           ', '2018-03-26 09:12:42', 0, 52, 5),
(66, 'i am staff gmail   ', '2018-03-26 11:49:16', 0, 52, 10),
(67, 'Hey                                ', '2018-03-26 11:53:01', 0, 52, 15),
(68, 'AA                ', '2018-03-26 12:43:02', 0, 51, 15),
(69, 'Test                        ', '2018-03-26 13:10:15', 0, 52, 15),
(70, 'Test                ', '2018-03-26 13:10:23', 1, 52, 15),
(71, 'Who Am I ?                                     ', '2018-03-26 14:15:47', 0, 47, 5),
(72, 'cntri', '2018-03-27 08:45:15', 0, 52, 5),
(73, 'Comment                      ', '2018-03-27 09:10:58', 0, 53, 5),
(74, 'STD                                    ', '2018-03-27 09:12:58', 0, 53, 6);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(20) NOT NULL,
  `department_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'BIT'),
(2, 'L5DC'),
(3, 'L4DC');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `doc_number` int(20) NOT NULL,
  `files` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `up_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ideas_number` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_number`, `files`, `up_time`, `ideas_number`) VALUES
(10, '', '2018-03-25 03:19:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_ideas`
--

CREATE TABLE `student_ideas` (
  `ideas_number` int(100) NOT NULL,
  `ideas_title` varchar(50) DEFAULT NULL,
  `ideas_description` varchar(500) DEFAULT NULL,
  `ideas_type` int(5) DEFAULT '0' COMMENT '0-public, 1-private',
  `posted_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(10) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_ideas`
--

INSERT INTO `student_ideas` (`ideas_number`, `ideas_title`, `ideas_description`, `ideas_type`, `posted_time`, `category_id`, `user_id`) VALUES
(46, 'Rubel s idea', 'Nisl quae inventore tempora lobortis habitant ducimus vitae! Feugiat officia dui unde maiores fermentum incididunt? \r\nAsperiores, justo dictum, , sint ', 0, '2018-03-18 00:51:23', 2, 6),
(47, 'It\'s test', 'wefrgtyuki', 0, '2018-03-25 00:48:00', 2, 15),
(49, 'ertyuj', 'ertryui', 0, '2018-03-24 16:11:28', 5, 16),
(50, 'Et eiusmod consectetur quisquam laborum Quis iste ', 'Explicabo Magnam ut nulla sit voluptatem amet nemo qui eum ex fugiat id corrupti doloremque', 0, '2018-03-25 03:22:40', 10, 6),
(51, 'test', 'test', 0, '2018-03-25 07:26:30', 1, 6),
(52, 'Deserunt quae fugiat excepteur laboris voluptatibu', 'Nam iusto accusamus delectus natus culpa in lorem ducimus mollitia est anim ea in tempore tenetur ab', 0, '2018-03-26 08:03:53', 4, 15),
(53, 'IDEA', 'IDEAIDEAIDEAIDEA', 0, '2018-03-27 09:06:50', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `thumbsupdown`
--

CREATE TABLE `thumbsupdown` (
  `thumbs_id` int(5) NOT NULL,
  `type` int(5) DEFAULT NULL COMMENT '0-like, 1-unlike',
  `user_id` int(100) DEFAULT NULL,
  `ideas_number` int(100) DEFAULT NULL,
  `thumbs_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_role` int(5) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_pass` varchar(10) DEFAULT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `department_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_role`, `user_email`, `user_pass`, `user_address`, `user_phone`, `department_id`) VALUES
(2, NULL, 4, 'admin', '123', 'dfgh', NULL, 3),
(3, NULL, 3, 'qac', '123', NULL, NULL, 1),
(5, 'Mr Staff', 1, 'staff', '123', NULL, NULL, 2),
(6, 'Mr Student', 0, 'student', '123', 'dhaka', '01912311291', 1),
(7, NULL, 2, 'qa@gmail.com', '123', NULL, NULL, 3),
(8, NULL, 3, 'qac@gmail.com', '123', NULL, NULL, 2),
(9, NULL, 4, 'admin@gmail.com', '123', NULL, NULL, 1),
(10, NULL, 1, 'staff@gmail.com', '123', NULL, NULL, 1),
(13, 'Rubel Mahmud', 0, 'rubel', '123', NULL, NULL, 1),
(15, 'Zahid', 0, 'zasoilu@gmail.com', '123', 'uyiguohijpok', '4567890', 1),
(16, 'samir', 0, 'samir@gmail.com', '123', 'q', 'wertyui', 1),
(17, 'naim', 0, 'naim@gmail.com', '123', 'sdfghyju', '234567', 1),
(18, 'rubel', 0, 'rubel@gmail.com', '123', 'qsdfbghjuik', '2345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role` int(5) NOT NULL,
  `user_role_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role`, `user_role_name`) VALUES
(0, 'Student'),
(1, 'Staff'),
(2, 'QA'),
(3, 'QAC'),
(4, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_10` (`ideas_number`),
  ADD KEY `fk_uid` (`user_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_number`),
  ADD KEY `fk_8` (`ideas_number`);

--
-- Indexes for table `student_ideas`
--
ALTER TABLE `student_ideas`
  ADD PRIMARY KEY (`ideas_number`),
  ADD UNIQUE KEY `ideas_number` (`ideas_number`),
  ADD KEY `fk16` (`category_id`),
  ADD KEY `fk_u` (`user_id`);

--
-- Indexes for table `thumbsupdown`
--
ALTER TABLE `thumbsupdown`
  ADD PRIMARY KEY (`thumbs_id`),
  ADD KEY `fk_9` (`ideas_number`),
  ADD KEY `fk_17` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_1` (`user_role`),
  ADD KEY `fk_2` (`department_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_number` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student_ideas`
--
ALTER TABLE `student_ideas`
  MODIFY `ideas_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `thumbsupdown`
--
ALTER TABLE `thumbsupdown`
  MODIFY `thumbs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_10` FOREIGN KEY (`ideas_number`) REFERENCES `student_ideas` (`ideas_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `fk_8` FOREIGN KEY (`ideas_number`) REFERENCES `student_ideas` (`ideas_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_ideas`
--
ALTER TABLE `student_ideas`
  ADD CONSTRAINT `fk16` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_u` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thumbsupdown`
--
ALTER TABLE `thumbsupdown`
  ADD CONSTRAINT `fk_17` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_9` FOREIGN KEY (`ideas_number`) REFERENCES `student_ideas` (`ideas_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`user_role`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;